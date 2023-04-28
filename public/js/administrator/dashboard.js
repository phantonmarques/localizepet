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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/administrator/dashboard.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/administrator/dashboard.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var flotDashSales1Data = [{
    data: [["Jan", 140], ["Feb", 240], ["Mar", 190], ["Apr", 140], ["May", 180], ["Jun", 320], ["Jul", 270], ["Aug", 180]],
    color: "#0088cc"
  }];
  var flotDashSales2Data = [{
    data: [["Jan", 240], ["Feb", 240], ["Mar", 290], ["Apr", 540], ["May", 480], ["Jun", 220], ["Jul", 170], ["Aug", 190]],
    color: "#2baab1"
  }];
  var flotDashSales3Data = [{
    data: [["Jan", 840], ["Feb", 740], ["Mar", 690], ["Apr", 940], ["May", 1180], ["Jun", 820], ["Jul", 570], ["Aug", 780]],
    color: "#734ba9"
  }];
  var sparklineBarDashData = [5, 6, 7, 2, 0, 4, 2, 4, 2, 0, 4, 2, 4, 2, 0, 4];
  var sparklineLineDashData = [15, 16, 17, 19, 10, 15, 13, 12, 12, 14, 16, 17];
  /*
      Sales Selector
  */

  $('#salesSelector').themePluginMultiSelect().on('change', function () {
    var rel = $(this).val();
    $('#salesSelectorItems .chart').removeClass('chart-active').addClass('chart-hidden');
    $('#salesSelectorItems .chart[data-sales-rel="' + rel + '"]').addClass('chart-active').removeClass('chart-hidden');
  });
  $('#salesSelector').trigger('change');
  $('#salesSelectorWrapper').addClass('ready');
  /*
      Flot: Sales 1
  */

  if ($('#flotDashSales1').get(0)) {
    var flotDashSales1 = $.plot('#flotDashSales1', flotDashSales1Data, {
      series: {
        lines: {
          show: true,
          lineWidth: 2
        },
        points: {
          show: true
        },
        shadowSize: 0
      },
      grid: {
        hoverable: true,
        clickable: true,
        borderColor: 'rgba(0,0,0,0.1)',
        borderWidth: 1,
        labelMargin: 15,
        backgroundColor: 'transparent'
      },
      yaxis: {
        min: 0,
        color: 'rgba(0,0,0,0.1)'
      },
      xaxis: {
        mode: 'categories',
        color: 'rgba(0,0,0,0)'
      },
      legend: {
        show: false
      },
      tooltip: true,
      tooltipOpts: {
        content: '%x: %y',
        shifts: {
          x: -30,
          y: 25
        },
        defaultTheme: false
      }
    });
  }
  /*
      Flot: Sales 2
  */


  if ($('#flotDashSales2').get(0)) {
    var flotDashSales2 = $.plot('#flotDashSales2', flotDashSales2Data, {
      series: {
        lines: {
          show: true,
          lineWidth: 2
        },
        points: {
          show: true
        },
        shadowSize: 0
      },
      grid: {
        hoverable: true,
        clickable: true,
        borderColor: 'rgba(0,0,0,0.1)',
        borderWidth: 1,
        labelMargin: 15,
        backgroundColor: 'transparent'
      },
      yaxis: {
        min: 0,
        color: 'rgba(0,0,0,0.1)'
      },
      xaxis: {
        mode: 'categories',
        color: 'rgba(0,0,0,0)'
      },
      legend: {
        show: false
      },
      tooltip: true,
      tooltipOpts: {
        content: '%x: %y',
        shifts: {
          x: -30,
          y: 25
        },
        defaultTheme: false
      }
    });
  }
  /*
      Flot: Sales 3
  */


  if ($('#flotDashSales3').get(0)) {
    var flotDashSales3 = $.plot('#flotDashSales3', flotDashSales3Data, {
      series: {
        lines: {
          show: true,
          lineWidth: 2
        },
        points: {
          show: true
        },
        shadowSize: 0
      },
      grid: {
        hoverable: true,
        clickable: true,
        borderColor: 'rgba(0,0,0,0.1)',
        borderWidth: 1,
        labelMargin: 15,
        backgroundColor: 'transparent'
      },
      yaxis: {
        min: 0,
        color: 'rgba(0,0,0,0.1)'
      },
      xaxis: {
        mode: 'categories',
        color: 'rgba(0,0,0,0)'
      },
      legend: {
        show: false
      },
      tooltip: true,
      tooltipOpts: {
        content: '%x: %y',
        shifts: {
          x: -30,
          y: 25
        },
        defaultTheme: false
      }
    });
  }
  /*
      Sparkline: Bar
  */


  if ($('#sparklineBarDash').get(0)) {
    var sparklineBarDashOptions = {
      type: 'bar',
      width: '80',
      height: '55',
      barColor: '#0088cc',
      negBarColor: '#B20000'
    };
    $("#sparklineBarDash").sparkline(sparklineBarDashData, sparklineBarDashOptions);
  }
  /*
      Sparkline: Line
  */


  if ($('#sparklineLineDash').get(0)) {
    var sparklineLineDashOptions = {
      type: 'line',
      width: '80',
      height: '55',
      lineColor: '#0088cc'
    };
    $("#sparklineLineDash").sparkline(sparklineLineDashData, sparklineLineDashOptions);
  }
});

/***/ }),

/***/ 3:
/*!**************************************************************!*\
  !*** multi ./resources/assets/js/administrator/dashboard.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\dnlfl\Projects\Localizepet\resources\assets\js\administrator\dashboard.js */"./resources/assets/js/administrator/dashboard.js");


/***/ })

/******/ });