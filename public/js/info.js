/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/info.js ***!
  \******************************/
$(function () {
  $(".first-exercise").addClass('loading');
  getWeather();
  $(".btn-refresh").on('click', function () {
    $(".first-exercise").addClass('loading');
    setTimeout(function () {
      getWeather();
      getValute();
    }, 500);
  });
});
function getWeather() {
  axios.get('https://api.weatherapi.com/v1/current.json', {
    params: {
      key: '46260b70c89b42e194a20551230801',
      q: 'Moscow',
      lang: 'ru'
    }
  }).then(function (response) {
    $("#temperature").text(response.data.current.temp_c + '°');
    $("#feelslike").text(response.data.current.feelslike_c + '°');
    $("#condition").text(response.data.current.condition.text);
  })["catch"](function (err) {
    console.log(err);
  })["finally"](function () {
    $(".first-exercise").removeClass('loading');
  });
}
function getValute() {
  axios.get('/valuteinfo').then(function (response) {
    if (response && !response['error']) {
      $('#valute').empty();
      response['data'].forEach(function (item, index) {
        $('#valute').append("<li class=\"block currency\"><div id=\"cad\" class=\"currency_info\">1 ".concat(item['code'], " = ").concat(item['value'], " RUB </div><div class=\"currency_text\">").concat(item['name'], "</div></li>"));
      });
    } else {
      console.log(response['error']);
    }
  })["catch"](function (err) {
    console.log(err);
  })["finally"](function () {
    $(".first-exercise").removeClass('loading');
  });
}
/******/ })()
;