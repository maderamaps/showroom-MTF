/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/user/notification.js ***!
  \*******************************************/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  notificationTransaksi();

  function notificationTransaksi() {
    $.ajax({
      url: "userNotification",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        content = "";

        if (dataResult.length != 0) {
          for (i = 0; i < dataResult.length; i++) {
            if (dataResult[i].type == 'transaksi') {
              content += '<a class="dropdown-item">transaksi (' + dataResult[i].nomer + ') disetujui </a>';
            } else {
              content += '<a class="dropdown-item">withdraw (' + dataResult[i].nomer + ') disetujui </a>';
            }
          }

          $('#notification').html(content);
          $('#badge').show();
        }
      }
    });
  }
});
/******/ })()
;