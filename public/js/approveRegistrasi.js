/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************!*\
  !*** ./resources/js/admin/approveRegistrasi.js ***!
  \*************************************************/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  getData();

  function getData() {
    $.ajax({
      url: "RegistrasiGetDataAll",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        var content = "";

        for (i = 0; i < dataResult.length; i++) {
          content += "<tr class='clickable-row' data-href='url://'>";
          content += "<td>" + dataResult[i].name + "</td>";
          content += "<td>" + dataResult[i].email + "</td>";
          content += "<td>" + dataResult[i].created_at.substr(0, 10) + "</td>";
          content += "<td><i class='fas fa-arrow-alt-circle-right' onclick='getDetail(" + dataResult[i].id + ");'></i></td>";
          content += "</tr>";
        }

        $(".table-users tbody").html(content);
      }
    });
  }

  window.getDetail = function (id) {
    popUp();
    $.ajax({
      url: "RegistrasiGetData",
      type: "get",
      dataType: "json",
      data: {
        id: id,
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        var content = dataResult.name;
        $("#name").html(content);
        content = dataResult.email;
        $("#email").html(content);
        content = dataResult.email;
        $("#telp").html(content);
        content = dataResult.created_at.substr(0, 10);
        $("#tanggal").html(content);
        content = "<img id='imgCv' src='data:image/jpeg;base64," + dataResult.cv + "' onclick=openImageCv()>";
        $("#cv").html(content);
        content = "<img id='imgKtp' src='data:image/jpeg;base64," + dataResult.ktp + "' onclick=openImageKtp()>";
        $("#ktp").html(content);
        var btn = '<button class="btn btn-success" style="width: 20%;" onclick="confirmRegister(' + dataResult.id + ')">Confirmasi</button>';
        $("#confirm").html(btn);
        btn = '<button class="btn btn-danger" style="width: 20%" onclick="deleteRegister(' + dataResult.id + ')">Delete</button>';
        $("#delete").html(btn);
        btn = '<button class="w3-button w3-right w3-white" onclick="popUpClose();" style="font-size: 20px;"><i class="far fa-times-circle fa-1x"></i></button>';
        $("#close").html(btn);
      }
    });
  };

  window.popUp = function (id) {
    document.getElementById('id01').style.display = 'block';
  };

  window.popUpClose = function (id) {
    document.getElementById('id01').style.display = 'none';
  };

  window.confirmRegister = function (id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: "RegistrasiConfirm",
      type: "post",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN,
        id: id
      },
      success: function success(dataResult) {
        popUpClose();
        getData();
      }
    });
  };

  window.deleteRegister = function (id) {
    if (confirm("Yakin ingin menghapus ini ?")) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: "RegistrasiDelete",
        type: "post",
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          id: id
        },
        success: function success(dataResult) {
          popUpClose();
          getData();
        }
      });
    }
  };
});
/******/ })()
;