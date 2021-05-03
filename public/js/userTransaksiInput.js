/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************!*\
  !*** ./resources/js/user/userTransaksiInput.js ***!
  \*************************************************/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  $("#submit").click(function () {
    inputTransaksi();
  });

  function inputTransaksi() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var noTransaksi = $('input[id=noTransaksi]').val();
    var nominal = $('input[id=nominal]').val();
    var namaCustomer = $('input[id=namaCustomer]').val();
    var noTelp = $('input[id=noTelp]').val();
    var email = $('input[id=email]').val();
    var alamatCustomer = $('#alamatCustomer').val();
    $.ajax({
      url: "TransaksiUserInputSubmit",
      type: "POST",
      data: {
        _token: CSRF_TOKEN,
        noTransaksi: noTransaksi,
        nominal: nominal,
        namaCustomer: namaCustomer,
        noTelp: noTelp,
        email: email,
        alamatCustomer: alamatCustomer
      },
      cache: false,
      success: function success(dataResult) {
        $("#alert").removeClass("alert alert-danger alert alert-success");
        $("#alert").addClass("alert alert-success");
        var content = "";
        content += "<strong>Success!</strong> Input transaksi berhasil dan akan diproses.";
        $("#alert").html(content);
        $('input[id=noTransaksi]').val("");
        $('input[id=nominal]').val("");
        $('input[id=namaCustomer]').val("");
        $('input[id=noTelp]').val("");
        $('input[id=email]').val("");
        $('#alamatCustomer').val("");
      },
      error: function error(request, _error) {
        $("#alert").removeClass("alert alert-danger alert alert-success");
        $("#alert").addClass("alert alert-danger");
        var content = "";
        content += "<strong>Error!</strong> " + request.responseJSON.message;
        $("#alert").html(content);
        console.log(arguments);
      }
    });
  }
});
/******/ })()
;