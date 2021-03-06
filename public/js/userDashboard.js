/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/user/userDashboard.js ***!
  \********************************************/
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  transaksiChart();
  recentTransaksi();
  recentReward();
  recentWithdraw();

  function transaksiChart() {
    $.ajax({
      url: "TransaksiUserChart",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        // var content = "";
        // for(i=0;i<dataResult.length;i++){
        //     content += "<tr class='clickable-row' data-href='url://'>"
        //     content += "<td>"+ dataResult[i].no_transaksi +"</td>"
        //     content += "<td>"+ dataResult[i].user['name'] +"</td>"
        //     content += "<td>"+ dataResult[i].created_at.substr(0,10) +"</td>"
        //     content += "<td><i class='fas fa-check' style='margin-right:20px; font-size:25px;' onclick='confirmData("+dataResult[i].id+");'></i><i class='fas fa-times' style=' font-size:25px;' onclick='deleteData("+dataResult[i].id+");'></i></td>"
        //     content += "</tr>"
        // }
        // $(".table-users tbody").html(content)
        var bar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        var month;

        for (i = 0; i < dataResult.length; i++) {
          month = dataResult[i].created_at.substr(5, 2);

          if (month == '01') {
            bar[1] += 1;
          } else if (month == '02') {
            bar[2] += 1;
          } else if (month == '03') {
            bar[3] += 1;
          } else if (month == '04') {
            bar[4] += 1;
          } else if (month == '05') {
            bar[5] += 1;
          } else if (month == '06') {
            bar[6] += 1;
          } else if (month == '07') {
            bar[7] += 1;
          } else if (month == '08') {
            bar[8] += 1;
          } else if (month == '09') {
            bar[9] += 1;
          } else if (month == '10') {
            bar[10] += 1;
          } else if (month == '11') {
            bar[11] += 1;
          } else if (month == '12') {
            bar[12] += 1;
          }
        }

        for (i = 1; i < bar.length; i++) {
          var persen = 100 / Math.max.apply(null, bar) * bar[i];
          $("#bar" + i).css({
            height: persen + "%",
            transition: '2s'
          });
          $("#bar" + i).html("<p>" + bar[i] + "</p>");
        }

        var temp = 100;

        for (i = 1; i <= 5; i++) {
          var persen = temp / 100 * Math.max.apply(null, bar);
          $("#ticks" + i).html("<p>" + parseFloat(persen).toFixed(0) + "</p>");
          temp = temp - 20;
        }
      }
    });
  }

  function recentTransaksi() {
    $.ajax({
      url: "TransaksiUserRecent",
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
          content += "<td>" + dataResult[i].no_transaksi + "</td>";
          content += "<td>" + dataResult[i].created_at.substr(0, 10) + "</td>";
          content += "<td>" + 'Rp.' + formatMoney(dataResult[i].nominal) + "</td>";

          if (dataResult[i].status == 'confirmed') {
            content += "<td style='color:#47AF45;font-weight:bold'>" + dataResult[i].status + "</td>";
          }

          content += "</tr>";
        }

        $(".table-recentTransaksi tbody").html(content);
      }
    });
  }

  function recentReward() {
    $.ajax({
      url: "RewardUserRecent",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        var content = "";
        var monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        for (i = 0; i < dataResult.length; i++) {
          content += "<tr>";
          content += "<td class='ellipsis'>" + dataResult[i].name + "</td>";
          content += "<td>" + dataResult[i].nominal + " Points</td>";
          content += "<td>" + dataResult[i].created_at.substr(8, 2) + "-" + monthNames[Number(dataResult[i].created_at.substr(5, 2))] + "</td>";
          content += "</tr>";
          console.log(Number(dataResult[i].created_at.substr(5, 2)));
        }

        $(".table-recentReward tbody").html(content);
      }
    });
  }

  function recentWithdraw() {
    $.ajax({
      url: "RewardUserRecentWithdraw",
      type: "get",
      dataType: "json",
      data: {
        _token: CSRF_TOKEN
      },
      success: function success(dataResult) {
        var content = "";
        var monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        for (i = 0; i < dataResult.length; i++) {
          content += "<tr>";
          content += "<td class='ellipsis'>" + dataResult[i].name + "</td>";
          content += "<td>" + dataResult[i].nominal + " Points</td>";
          content += "<td>" + dataResult[i].created_at.substr(8, 2) + "-" + monthNames[Number(dataResult[i].created_at.substr(5, 2))] + "</td>";
          content += "</tr>";
          console.log(Number(dataResult[i].created_at.substr(5, 2)));
        }

        $(".table-recentWithdraw tbody").html(content);
      }
    });
  }

  function formatMoney(amount) {
    var decimalCount = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2;
    var decimal = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : ".";
    var thousands = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : ",";

    try {
      decimalCount = Math.abs(decimalCount);
      decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
      var negativeSign = amount < 0 ? "-" : "";

      var _i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();

      var j = _i.length > 3 ? _i.length % 3 : 0;
      return negativeSign + (j ? _i.substr(0, j) + thousands : '') + _i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - _i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
      console.log(e);
    }
  }

  ;
});
/******/ })()
;