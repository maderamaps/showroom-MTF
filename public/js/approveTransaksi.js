/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/js/admin/approveTransaksi.js ***!
  \************************************************/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  getData();

  function getData() {
    $.ajax({
      url: "ApproveTransaksiGetDataAll",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        var content = "";

        for (i = 0; i < dataResult.length; i++) {
          content += "<tr class='clickable-row' data-href='url://'>";
          content += "<td>" + dataResult[i].no_transaksi + "</td>";
          content += "<td>" + dataResult[i].user['name'] + "</td>";
          content += "<td>" + dataResult[i].nominal + "</td>";
          content += "<td>" + dataResult[i].created_at.substr(0, 10) + "</td>";
          content += "<td><i class='fas fa-check' style='margin-right:20px; font-size:25px;' onclick='confirmData(" + dataResult[i].id + ");'></i><i class='fas fa-times' style=' font-size:25px;' onclick='deleteData(" + dataResult[i].id + ");'></i></td>";
          content += "</tr>";
        }

        $(".table-users tbody").html(content);
      }
    });
  }

  window.confirmData = function (id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: "ApproveTransaksiConfirm",
      type: "post",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN,
        id: id
      },
      success: function success(dataResult) {
        getData();
      }
    });
  };

  window.deleteData = function (id) {
    if (confirm("Yakin ingin menghapus ini ?")) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: "ApproveTransaksiDelete",
        type: "post",
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          id: id
        },
        success: function success(dataResult) {
          getData();
        }
      });
    }
  };

  window.search = function (name) {
    $.ajax({
      url: "ApproveTransaksiSearch",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN,
        name: name
      },
      success: function success(dataResult) {
        var content = "";

        for (i = 0; i < dataResult.length; i++) {
          content += "<tr class='clickable-row' data-href='url://'>";
          content += "<td>" + dataResult[i].no_transaksi + "</td>";
          content += "<td>" + dataResult[i].user['name'] + "</td>";
          content += "<td>" + dataResult[i].created_at.substr(0, 10) + "</td>";
          content += "<td><i class='fas fa-arrow-alt-circle-right' onclick='getDetail(" + dataResult[i].id + ");'></i></td>";
          content += "</tr>";
        }

        $(".table-users tbody").html(content);
      }
    });
  };
});
$(document).on('keypress', function (e) {
  if (e.which == 13 && $("#search").val() !== "") {
    search($("#search").val());
  }
});
/******/ })()
;