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
  $("#btnSubmit").click(function () {
    document.getElementById("fromRegistrasi").submit();
  });
  $(".input1").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".label1").addClass("selected").html(fileName);
  });
  $(".input2").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".label2").addClass("selected").html(fileName);
  });
});
/******/ })()
;