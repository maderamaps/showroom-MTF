/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/user/userTransaksiHistory.js ***!
  \***************************************************/
$(document).ready(function () {
  window.links = function (currentPage, total, url) {
    var content = "";
    var temp = currentPage - 2;

    if (currentPage == 2) {
      $("#lastLink").before('<li class="page-item .bg-success"><a class="page-link bg-primary text-white" href="TransaksiUserHistory?page=' + currentPage + '">' + currentPage + '</a></li>');
    } else if (currentPage > 2) {
      $("#lastLink").before('<li class="page-item"><a class="page-link" href="TransaksiUserHistory?page=' + temp + '">...</a></li>');
      $("#lastLink").before('<li class="page-item .bg-success"><a class="page-link bg-primary text-white" href="TransaksiUserHistory?page=' + currentPage + '">' + currentPage + '</a></li>');
    }

    totalBtn = Math.floor(total / 20) + 1; // totalBtn=20;

    for (i = currentPage; i < totalBtn; i++) {
      j = i + 1;

      if (i < currentPage + 1) {
        $("#lastLink").before('<li class="page-item"><a class="page-link" href="TransaksiUserHistory?page=' + j + '">' + j + '</a></li>');
      } else if (i < totalBtn - 1) {} else {
        $("#lastLink").before('<li class="page-item"><a class="page-link" href="TransaksiUserHistory?page=' + totalBtn + '">...</a></li>');
      }
    }

    console.log(totalBtn);
  };
});
/******/ })()
;