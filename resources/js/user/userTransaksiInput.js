var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    $( "#submit" ).click(function() {
        inputTransaksi();
      });
    function inputTransaksi(){
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
                email:email,
                alamatCustomer:alamatCustomer,
            },
            cache: false,
            success: function(dataResult){
                $( "#alert" ).addClass( "alert alert-success" );
                var content = "";
                content += "<strong>Success!</strong> Input transaksi berhasil dan akan diproses.";
                $("#alert").html(content)
            },
            error: function (request, error) {
                $( "#alert" ).addClass( "alert alert-danger" );
                var content = "";
                content += "<strong>Danger!</strong> "+error;
                $("#alert").html(content)
                console.log(arguments);
            }
            
        });
    }

});