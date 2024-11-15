#include <ESP8266WiFi.h>
#include <PubSubClient.h>
// Librerías MPU - BMP
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BMP280.h>
#include <MPU6050.h>
// Librerías DS18b20
#include <OneWire.h>
#include <DallasTemperature.h>

// Configuración WiFi
#define ssid "----------"
#define password "---------"

// Configuración MQTT
#define mqtt_server "controlinvestigacion.live"
#define mqtt_port 1883
#define mqtt_user "UserName"
#define mqtt_pass "PasswordMQTT"

// Pin del sensor DS18B20
#define ONE_WIRE_BUS 16  // Pin GPIO16 en el ESP8266

// Clientes y objetos de sensores
WiFiClient espClient;
PubSubClient client(espClient);
MPU6050 mpu;
Adafruit_BMP280 bmp;
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

// Variables para valores iniciales de sensores y movimiento
int16_t baseAx, baseAy, baseAz, baseGx, baseGy, baseGz;
const int16_t accelThreshold = 5000;
const int16_t gyroThreshold = 1000;
String lastDirection = "1";

// Control de tiempo para publicaciones MQTT
long lastMsg = 0;
char msg[25];

// Declaración de funciones
void setup_wifi();
void callback(char* topic, byte* payload, unsigned int length);
void reconnect();
String detectDirection(int16_t ax, int16_t ay, int16_t az, int16_t gx, int16_t gy, int16_t gz);

void setup() {
  pinMode(BUILTIN_LED, OUTPUT);
  Serial.begin(115200);

  setup_wifi();
  client.setServer(mqtt_server, mqtt_port);
  client.setCallback(callback);

  Wire.begin(D2, D1);  // Configura SDA y SCL
  sensors.begin();     // Inicia el sensor de temperatura DS18B20

  // Inicialización del MPU6050 y configuración de orientación base
  mpu.initialize();
  if (!mpu.testConnection()) {
    Serial.println("Error: MPU6050 no conectado.");
    while (1)
      ;
  }
  delay(1000);
  mpu.getMotion6(&baseAx, &baseAy, &baseAz, &baseGx, &baseGy, &baseGz);

  // Inicialización del sensor BMP280 con configuración opcional
  if (!bmp.begin(0x76)) {
    Serial.println("Error: BMP280 no encontrado.");
    while (1)
      ;
  }
  bmp.setSampling(Adafruit_BMP280::MODE_NORMAL,
                  Adafruit_BMP280::SAMPLING_X2,
                  Adafruit_BMP280::SAMPLING_X16,
                  Adafruit_BMP280::FILTER_X16,
                  Adafruit_BMP280::STANDBY_MS_500);
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();

  // Publicar datos cada 1 segundo
  long now = millis();
  if (now - lastMsg > 1000) {
    lastMsg = now;

    // Lectura de datos de aceleración y giroscopio
    int16_t ax, ay, az, gx, gy, gz;
    mpu.getMotion6(&ax, &ay, &az, &gx, &gy, &gz);

    // Lectura de temperatura del sensor DS18B20
    sensors.requestTemperatures();
    float temperaturaC = sensors.getTempCByIndex(0);

    // Verificar si la temperatura es válida
    if (temperaturaC == DEVICE_DISCONNECTED_C || temperaturaC == 85.0 || temperaturaC == -127.0) {
      Serial.println("Error: Sensor DS18B20 no encontrado.");
      temperaturaC = NAN;  // Asignar NaN si no se detecta
    } else {
      Serial.print("Temperatura DS18B20: ");
      Serial.print(temperaturaC);
      Serial.println(" °C");
    }

    // Detectar dirección de movimiento
    String currentDirection = detectDirection(ax, ay, az, gx, gy, gz);
    if (currentDirection != lastDirection) {
      Serial.print("Cambio de dirección a: ");
      Serial.println(currentDirection);
      lastDirection = currentDirection;
    }

    // Lectura de temperatura del MPU6050
    float temperatureMPU = mpu.getTemperature() / 340.00 + 36.53;

    // Lectura de temperatura y presión del BMP280
    float temperatureBMP = bmp.readTemperature();
    float pressure = bmp.readPressure() / 1000.0F;

    // Concatenar datos para enviar al servidor MQTT
    String to_send = String(temperatureBMP) + "," + String(temperaturaC) + "," + String(pressure) + "," + currentDirection;
    to_send.toCharArray(msg, 25);
    Serial.print("Publicamos mensaje -> ");
    Serial.println(msg);
    client.publish("values", msg);
  }
}

String detectDirection(int16_t ax, int16_t ay, int16_t az, int16_t gx, int16_t gy, int16_t gz) {
  // Detecta cambios significativos en la orientación
  if (abs(ax - baseAx) > accelThreshold) {
    return ax > baseAx ? "10" : "10";
  } else if (abs(ay - baseAy) > accelThreshold) {
    return ay > baseAy ? "10" : "10";
  } else if (abs(az - baseAz) > accelThreshold) {
    return az > baseAz ? "1" : "20";
  }
  return "1";  // Retorna "1" si no hay cambios significativos
}

void setup_wifi() {
  // Conecta al WiFi
  Serial.print("Conectando a ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nConectado a WiFi. IP: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length) {
  // Manejo de mensajes MQTT
  String incoming = "";
  Serial.print("Mensaje recibido en -> ");
  Serial.println(topic);
  for (unsigned int i = 0; i < length; i++) {
    incoming += (char)payload[i];
  }
  incoming.trim();
  Serial.println("Mensaje -> " + incoming);

  // Control del LED basado en el mensaje
  digitalWrite(BUILTIN_LED, incoming == "on" ? HIGH : LOW);
}

void reconnect() {
  // Reconectar al servidor MQTT si es necesario
  while (!client.connected()) {
    Serial.print("Intentando conexión MQTT...");
    String clientId = "esp8266_" + String(random(0xffff), HEX);
    if (client.connect(clientId.c_str(), mqtt_user, mqtt_pass)) {
      Serial.println("Conectado a MQTT!");
      client.subscribe("led1");
      client.subscribe("led2");
    } else {
      Serial.print("Error -> ");
      Serial.print(client.state());
      Serial.println(" Reintentando en 5 segundos");
      delay(5000);
    }
  }
}
