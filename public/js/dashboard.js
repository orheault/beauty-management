/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),

/***/ 7:
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

(function ($) {
  'use strict';

  $(function () {
    Chart.defaults.global.legend.labels.usePointStyle = true;

    if ($("#serviceSaleProgress").length) {
      var bar = new ProgressBar.Circle(serviceSaleProgress, {
        color: 'url(#gradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.65); // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      var linearGradient = '<defs><linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="20%" stop-color="#da8cff"/><stop offset="50%" stop-color="#9a55ff"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
    }
    if ($("#productSaleProgress").length) {
      var bar = new ProgressBar.Circle(productSaleProgress, {
        color: 'url(#productGradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.6); // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      var _linearGradient = '<defs><linearGradient id="productGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="40%" stop-color="#36d7e8"/><stop offset="70%" stop-color="#b194fa"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', _linearGradient);
    }
    if ($("#points-chart").length) {
      var _ref, _ref2;

      var ctx = document.getElementById('points-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          datasets: [(_ref = {
            label: "North Zone",
            borderColor: gradientStrokeViolet,
            backgroundColor: gradientStrokeViolet,
            hoverBackgroundColor: gradientStrokeViolet,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref, 'fill', 'origin'), _defineProperty(_ref, 'data', [20, 40, 15, 35, 25, 50, 30, 20]), _ref), (_ref2 = {
            label: "South Zone",
            borderColor: '#e9eaee',
            backgroundColor: '#e9eaee',
            hoverBackgroundColor: '#e9eaee',
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref2, 'fill', 'origin'), _defineProperty(_ref2, 'data', [40, 30, 20, 10, 50, 15, 35, 20]), _ref2)]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 10
              },
              gridLines: {
                drawBorder: false,
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: '#eeeeee'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true
              },
              barPercentage: 0.7
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      });
    }
    if ($("#events-chart").length) {
      var _ref3, _ref4;

      var ctx = document.getElementById('events-chart').getContext("2d");

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [1, 2, 3, 4, 5, 6, 7, 8],
          datasets: [(_ref3 = {
            label: "Domestic",
            borderColor: gradientStrokeBlue,
            backgroundColor: gradientStrokeBlue,
            hoverBackgroundColor: gradientStrokeBlue,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref3, 'fill', 'origin'), _defineProperty(_ref3, 'data', [20, 40, 15, 35, 25, 50, 30, 20]), _ref3), (_ref4 = {
            label: "International",
            borderColor: '#e9eaee',
            backgroundColor: '#e9eaee',
            hoverBackgroundColor: '#e9eaee',
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref4, 'fill', 'origin'), _defineProperty(_ref4, 'data', [40, 30, 20, 10, 50, 15, 35, 20]), _ref4)]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 10
              },
              gridLines: {
                drawBorder: false,
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: '#eeeeee'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true
              },
              barPercentage: 0.7
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      });
    }
    if ($("#visit-sale-chart").length) {
      var _ref5, _ref6, _ref7;

      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('visit-sale-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
          datasets: [(_ref5 = {
            label: "CHN",
            borderColor: gradientStrokeViolet,
            backgroundColor: gradientStrokeViolet,
            hoverBackgroundColor: gradientStrokeViolet,
            legendColor: gradientLegendViolet,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref5, 'fill', 'origin'), _defineProperty(_ref5, 'data', [20, 40, 15, 35, 25, 50, 30, 20]), _ref5), (_ref6 = {
            label: "USA",
            borderColor: gradientStrokeRed,
            backgroundColor: gradientStrokeRed,
            hoverBackgroundColor: gradientStrokeRed,
            legendColor: gradientLegendRed,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref6, 'fill', 'origin'), _defineProperty(_ref6, 'data', [40, 30, 20, 10, 50, 15, 35, 40]), _ref6), (_ref7 = {
            label: "UK",
            borderColor: gradientStrokeBlue,
            backgroundColor: gradientStrokeBlue,
            hoverBackgroundColor: gradientStrokeBlue,
            legendColor: gradientLegendBlue,
            pointRadius: 0,
            fill: false,
            borderWidth: 1
          }, _defineProperty(_ref7, 'fill', 'origin'), _defineProperty(_ref7, 'data', [70, 10, 30, 40, 25, 50, 15, 30]), _ref7)]
        },
        options: {
          responsive: true,
          legend: false,
          legendCallback: function legendCallback(chart) {
            var text = [];
            text.push('<ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {
              text.push('<li><span class="legend-dots" style="background:' + chart.data.datasets[i].legendColor + '"></span>');
              if (chart.data.datasets[i].label) {
                text.push(chart.data.datasets[i].label);
              }
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join('');
          },
          scales: {
            yAxes: [{
              ticks: {
                display: false,
                min: 0,
                stepSize: 20,
                max: 80
              },
              gridLines: {
                drawBorder: false,
                color: 'rgba(235,237,242,1)',
                zeroLineColor: 'rgba(235,237,242,1)'
              }
            }],
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'rgba(0,0,0,1)',
                zeroLineColor: 'rgba(235,237,242,1)'
              },
              ticks: {
                padding: 20,
                fontColor: "#9c9fa6",
                autoSkip: true
              },
              categoryPercentage: 0.5,
              barPercentage: 0.5
            }]
          }
        },
        elements: {
          point: {
            radius: 0
          }
        }
      });
      $("#visit-sale-chart-legend").html(myChart.generateLegend());
    }
    if ($("#traffic-chart").length) {
      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';

      var trafficChartData = {
        datasets: [{
          data: [30, 30, 40],
          backgroundColor: [gradientStrokeBlue, gradientStrokeGreen, gradientStrokeRed],
          hoverBackgroundColor: [gradientStrokeBlue, gradientStrokeGreen, gradientStrokeRed],
          borderColor: [gradientStrokeBlue, gradientStrokeGreen, gradientStrokeRed],
          legendColor: [gradientLegendBlue, gradientLegendGreen, gradientLegendRed]
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: ['Search Engines', 'Direct Click', 'Bookmarks Click']
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function legendCallback(chart) {
          var text = [];
          text.push('<ul>');
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
            text.push('<li><span class="legend-dots" style="background:' + trafficChartData.datasets[0].legendColor[i] + '"></span>');
            if (trafficChartData.labels[i]) {
              text.push(trafficChartData.labels[i]);
            }
            text.push('<span class="float-right">' + trafficChartData.datasets[0].data[i] + "%" + '</span>');
            text.push('</li>');
          }
          text.push('</ul>');
          return text.join('');
        }
      };
      var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#traffic-chart-legend").html(trafficChart.generateLegend());
    }
    if ($("#inline-datepicker").length) {
      $('#inline-datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true
      });
    }
  });
})(jQuery);

/***/ })

/******/ });