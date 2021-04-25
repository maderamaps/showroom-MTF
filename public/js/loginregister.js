/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/loginRegister.js ***!
  \***************************************/
$(document).ready(function () {
  $("#next").click(function () {
    $(".page1").hide("slow");
    $(".page2").show("slow");
  });
  $("#previous").click(function () {
    $(".page1").show("slow");
    $(".page2").hide("slow");
  });
});
/******/ })()
;