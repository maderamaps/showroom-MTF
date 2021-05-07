 var pusher = new Pusher('74fa22daacdba854af99', {
cluster: 'ap1'
});

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('transaksi-channel');

// Bind a function to a Event (the full Laravel class)
channel.bind('transaksi-event', function(data) {
    var i =  Number($("#transaksiBadge").html()) + 1;
  document.getElementById("transaksiBadge").innerHTML = i;
});

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    notificationTransaksi();
    function notificationTransaksi(){
        $.ajax({
            url:"notificationTransaksi",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                document.getElementById("transaksiBadge").innerHTML = dataResult;
            }
        })
    }
    function notificationWithdraw(){
        $.ajax({
            url:"notificationTransaksi",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                document.getElementById("transaksiBadge").innerHTML = dataResult;
            }
        })
    }
});