<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>IoT</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
  <link rel="stylsheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
  <link rel="stylsheet"  href="https://fonts.googleapis.com/css?family=Montserrat"/>
  <link rel="stylsheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylsheet" href="new/assets/styles.css" />
</head>
<body>
<div class="app" id="app">
 <div id="aside" class="app-aside modal nav-dropdown">
      <!-- fluid app aside -->
      <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
          <!-- brand -->
          <a class="navbar-brand">
            <div ui-include="'assets/images/logo.svg'"></div>
            <img src="assets/images/logo.png" alt="." class="hide">
            <span class="hidden-folded inline">IoT</span>
          </a>
        </div>
        <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Main</small>
              </li>
              <li>
                <a href="dashboard.php" >
                  <span class="nav-icon">
                    <i class="fa fa-building-o"></i>
                  </span>
                  <span class="nav-text">Principal</span>
                </a>
              </li>
              <li>
                <a href="devices.php" >
                  <span class="nav-icon">
                    <i class="fa fa-cogs"></i>
                  </span>
                  <span class="nav-text">Dispositivos</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="b-t">
          <div class="nav-fold">
            <a href="profile.html">
              <span class="pull-left">
                <img src="assets/images/a0.jpg" alt="..." class="w-40 img-circle">
              </span>
              <span class="clear hidden-folded p-x">
                <span class="block _500">Luis Enrique Adrian Alejandro</span>
                <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="content" class="app-content box-shadow-z0" role="main">
      <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
        sssss    
        <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
            <i class="material-icons">&#xe5d2;</i>
          </a>
          <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        </div>
      </div>
      <!-- PIE DE PAGINA -->
      <div class="app-footer">
        <div class="p-2 text-xs">
          <div class="pull-right text-muted py-1">
            &copy; Copyright <strong>IoT</strong> <span class="hidden-xs-down">TP546</span>
            <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
          </div>
          <div class="nav">
            <a class="nav-link" href="">About</a>
          </div>
        </div>
      </div>
      <div ui-view class="app-body" id="view">
        <div class="padding">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="box p-a">
                <div class="pull-left m-r">
                  <span class="w-48 rounded  accent">
                    <i class="fa fa-sun-o"></i>
                  </span>
                </div>
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><b id="display_temp11">-- </b><span class="text-sm"> C</span></h4>
                  <small class="text-muted">Temperatura Ambiente en °C</small>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4">
              <div class="box p-a">
                <div class="pull-left m-r">
                  <span class="w-48 rounded primary">
                    <i class="fa fa-desktop"></i>
                  </span>
                </div>
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><b id="display_temp22">-- </b><span class="text-sm"> C</span></h4>
                  <small class="text-muted">Temperatura Interna en °C</small>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4">
              <div class="box p-a">
                <div class="pull-left m-r">
                  <span class="w-48 rounded warn">
                    <i class="fa fa-plug"></i>
                  </span>
                </div>
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><b id="display_volt11">-- </b><span class="text-sm"> KPa</span></h4>
                  <small class="text-muted">Presión Barométrica Kpa</small>
                </div>
              </div>
            </div>
          </div>
<!-- HTML: Caja para el Estado de la Caja de Transporte -->
            <div class="col-xs-6 col-sm-4">
              <div id="estadoCaja" class="box p-a normal">
                <div class="pull-left m-r">
                  <span class="w-48 rounded alert">
                    <i class="fa fa-cube"></i>
                  </span>
                </div>
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><b id="estado_text">Caja en buen estado</b></h4>
                  <small class="text-muted">Estado de la Caja de Transporte</small>
                </div>
              </div>
            </div>
              <div class="row">
                <!-- SWItCH1 -->
                <div class="col-xs-12 col-sm-6">
                  <div class="box p-a">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">LED1</label>
                      <div class="col-sm-10">
                        <label class="ui-switch ui-switch-md info m-t-xs">
                          <input id="input_led1" onchange="process_led1()"  type="checkbox" >
                          <i></i>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="box p-a">
                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label">LED2</label>
                        <div class="col-sm-10">
                          <label class="ui-switch ui-switch-md info m-t-xs">
                            <input id="input_led2" onchange="process_led2()" type="checkbox"  >
                            <i></i>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          <div>  
            <div id="wrapper">
              <div class="content-area">
                <div class="container-fluid">
                  <div class="text-right mt-3 mb-3 d-fixed">
                  </div>
                  <div class="main">
                  <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="box mt-4">
                          <div id="temperaturechart"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box mt-4">
                          <div id="voltagechart"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
window.Apex = {
  chart: {
    foreColor: '#fff',
    toolbar: {
      show: false
    },
  },
  colors: ['#17ead9', '#f02fc2', '#6094ea'],
  stroke: {
    width: 3
  },
  dataLabels: {
    enabled: false
  },
  grid: {
    borderColor: "#40475D",
  },
  xaxis: {
    axisTicks: {
      color: '#333'
    },
    axisBorder: {
      color: "#333"
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      gradientToColors: ['#F55555', '#6078ea', '#6094ea']
    },
  },
  tooltip: {
    theme: 'dark',
    x: {
      formatter: function (val) {
        return moment(new Date(val)).format("HH:mm:ss")
      }
    }
  },
  yaxis: {
    decimalsInFloat: 2,
    opposite: true,
    labels: {
      offsetX: -10
    }
  }
};
// Configuración para el gráfico de temperaturas
const optionsTemperature = {
  chart: {
    height: 350,
    type: 'line',
    animations: {
      enabled: true,
      easing: 'linear',
      dynamicAnimation: {
        speed: 1000
      }
    },
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    },
    width: '100%'
  },
  stroke: {
    curve: 'smooth',
    width: 3
  },
  colors: ['#17ead9', '#f02fc2'],
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: 'Temperatura 1',
      data: []
    },
    {
      name: 'Temperatura 2',
      data: []
    }
  ],
  title: {
    text: 'Monitoreo de Temperaturas',
    align: 'left',
    style: {
      fontSize: '16px',
      color: '#666'
    }
  },
  xaxis: {
    type: 'datetime',
    range: 20000,
    labels: {
      formatter: function(val) {
        return new Date(val).toLocaleTimeString();
      }
    }
  },
  yaxis: {
    title: {
      text: 'Temperatura (°C)'
    },
    decimalsInFloat: 1,
    forceNiceScale: true,
    tickAmount: 10
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
};
const optionsVoltage = {  // Configuración para el gráfico de voltaje
  chart: {
    height: 350,
    type: 'line',
    animations: {
      enabled: true,
      easing: 'linear',
      dynamicAnimation: {
        speed: 1000
      }
    },
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    },
    width: '100%'
  },
  stroke: {
    curve: 'smooth',
    width: 3
  },
  colors: ['#6094ea'],
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: 'Voltaje',
      data: []
    }
  ],
  title: {
    text: 'Monitoreo de Pressão',
    align: 'left',
    style: {
      fontSize: '16px',
      color: '#666'
    }
  },
  xaxis: {
    type: 'datetime',
    range: 20000,
    labels: {
      formatter: function(val) {
        return new Date(val).toLocaleTimeString();
      },
      rotate: 0,
      style: {
        fontSize: '12px'
      }
    }
  },
  yaxis: {
    title: {
      text: 'Voltaje (V)'
    },
    decimalsInFloat: 1,
    forceNiceScale: true,
    tickAmount: 10
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
};
const MAX_DATA_POINTS = 30;
const chartTemperature = new ApexCharts(document.querySelector("#temperaturechart"), optionsTemperature);
const chartVoltage = new ApexCharts(document.querySelector("#voltagechart"), optionsVoltage);
chartTemperature.render();
chartVoltage.render();
</script>
<!-- CSS: Estilos y Animaciones -->
 <style>
.normal {
background-color: #dff0d8;
color: #3c763d;
animation: none;
}
/* Clase para alerta */
.alerta {
background-color: #f2dede;
color: #a94442;
animation: alertaAnim 1s infinite;
}
/* Animación para alerta */
@keyframes alertaAnim {
0%, 100% { transform: scale(1); }
50% { transform: scale(1.05); }
}
</style>
</div>
        </div>
      </div>
    </div>    <div id="switcher">
      <div class="switcher box-color dark-white text-color" id="sw-theme">
        <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
          <i class="fa fa-gear"></i>
        </a>
        <div class="box-header">
          <h2>Theme Switcher</h2>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p>Themes:</p>
          <div data-target="bg" class="row no-gutter text-u-c text-center _600 clearfix">
        
            <label class="p-a col-sm-6 grey pointer m-0">
              <input type="radio" name="theme" value="grey" hidden>
              Grey
            </label>
            <label class="p-a col-sm-6 dark pointer m-0">
              <input type="radio" name="theme" value="dark" hidden>
              Dark
            </label>
          </div>
        </div>
      </div>
<div
class="p-a col-sm-6 lter">
<span class="text">...</span>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- jQuery -->
<script src="libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
<script src="libs/jquery/underscore/underscore-min.js"></script>
<script src="libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="libs/jquery/PACE/pace.min.js"></script>
<script src="html/scripts/config.lazyload.js"></script>
<script src="html/scripts/palette.js"></script>
<script src="html/scripts/ui-load.js"></script>
<script src="html/scripts/ui-jp.js"></script>
<script src="html/scripts/ui-include.js"></script>
<script src="html/scripts/ui-device.js"></script>
<script src="html/scripts/ui-form.js"></script>
<script src="html/scripts/ui-nav.js"></script>
<script src="html/scripts/ui-screenfull.js"></script>
<script src="html/scripts/ui-scroll-to.js"></script>
<script src="html/scripts/ui-toggle-class.js"></script>
<script src="html/scripts/app.js"></script>
<script src="libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="html/scripts/ajax.js"></script>
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

<script type="text/javascript">

function update_values(temp1, temp2, volts, constReg){
  updateEstadoCaja(constReg);
}

function updateEstadoCaja(constReg) {

    if (constReg === 10 || constReg === 20) {
    } else if (constReg === 1) {
    }
  }


function process_msg(topic, message) {
  if (topic === "values") {
    try {
      const values = message.toString().split(",").map(Number);
    } catch (error) {
      console.error("Error procesando mensaje MQTT:", error);
    }
  }
}
function update_chart(temp1, temp2, volts) {
  const timestamp = new Date().getTime();
  chartTemperature.appendData([
    {
      data: [[timestamp, parseFloat(temp1)]]
    },
    {
      data: [[timestamp, parseFloat(temp2)]]
    }
  ]);
  chartVoltage.appendData([
    {
      data: [[timestamp, parseFloat(volts)]]
    }
  ]);
  const series1 = chartTemperature.w.config.series[0].data;
  const series2 = chartTemperature.w.config.series[1].data;
  const seriesV = chartVoltage.w.config.series[0].data;
  if (series1.length > MAX_DATA_POINTS) {
    chartTemperature.updateSeries([
      {
        data: series1.slice(-MAX_DATA_POINTS)
      },
      {
        data: series2.slice(-MAX_DATA_POINTS)
      }
    ]);
  }
  if (seriesV.length > MAX_DATA_POINTS) {
    chartVoltage.updateSeries([
      {
        data: seriesV.slice(-MAX_DATA_POINTS)
      }
    ]);
  }
}
function process_led1(){
  if ($('#input_led1').is(":checked")){
    console.log("Encendido");

    client.publish('led1', 'on', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }else{
    console.log("Apagado");
    client.publish('led1', 'off', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }
}
function process_led2(){
  if ($('#input_led2').is(":checked")){
    console.log("Encendido");

    client.publish('led2', 'on', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }else{
    console.log("Apagado");
    client.publish('led2', 'off', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
  }
}
const options = {
      connectTimeout: 14000,
      clientId: 'iotmc',
      username: 'web_client',
      password: '123456',
      keepalive: 600,
      clean: true,
}
var connected = false;
const WebSocket_URL = 'wss://controlinvestigacion.live:8094/mqtt' //wss es cunado es seguro
const client = mqtt.connect(WebSocket_URL, options)
client.on('connect', () => {
    console.log('Mqtt conectado por WS! Exito!')
    client.subscribe('values', { qos: 0 }, (error) => {
      if (!error) {
        console.log('Suscripción exitosa!')
      }else{
        console.log('Suscripción fallida!')
      }
    })
    client.publish('fabrica', 'esto es un verdadero éxito', (error) => {
      console.log(error || 'Mensaje enviado!!!')
    })
})
client.on('message', (topic, message) => {
  console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString())
  process_msg(topic, message);
})
client.on('reconnect', (error) => {
    console.log('Error al reconectar', error)
})
client.on('error', (error) => {
    console.log('Error de conexión:', error)
})
</script>
</body>
</html>
