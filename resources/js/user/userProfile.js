var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    
    
    getDataProfile();
    function getDataProfile(){
        $.ajax({
            url:"ProfileUserGet",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                $("#name").val(dataResult[0].name);
                $("#phone").val(dataResult[0].phone);
                $("#email").val(dataResult[0].email);
                $("#address").val(dataResult[0].address);

                $("#ownerName").val(dataResult[0].owner_name);
                $("#ownerKtp").val(dataResult[0].ktp_number);
                $("#ownerPhone").val(dataResult[0].owner_phone);
                $("#ownerEmail").val(dataResult[0].owner_email);
                $("#ownerAddress").val(dataResult[0].owner_address);
                if(dataResult[0].avatar==""){
                    $("#avatar").attr("src","/image/default-avatar.png");
                }else{
                    $("#avatar").attr("src","data:image/jpeg;base64,"+dataResult[0].avatar);
                }
                
            }
        })
    }

    function updateDataProfile(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"ProfileUserUpdate",
            type: "post",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                name: $("#name").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                address: $("#address").val(),
                ownerName: $("#ownerName").val(),
                ownerPhone: $("#ownerPhone").val(),
                ownerEmail: $("#ownerEmail").val(),
                ownerAddress: $("#ownerAddress").val()
            },
            cache: false,
            success: function(dataResult){
                $( "#alert" ).removeClass( "alert alert-danger alert alert-success" )
                $( "#alert" ).addClass( "alert alert-success" );
                var content = "";
                content += "<strong>Success!</strong> Data profil berhasil diupdate";
                $("#alert").html(content)
                getDataProfile();    
            },
            error: function (request, error) {
                $( "#alert" ).removeClass( "alert alert-danger alert alert-success" )
                $( "#alert" ).addClass( "alert alert-danger" );
                var content = "";
                content += "<strong>Error!</strong> "+request.responseJSON.message;
                $("#alert").html(content)
                console.log(arguments);
                
            }
        })
    }

    $( "#submit" ).click(function() {
        updateDataProfile();     
    });

    $( "#btnInputAvatar" ).click(function() {
        $('#inputAvatar').trigger('click');     
    });
    $( "#inputAvatar" ).change(function() {
        $("#btnInputAvatar").html("Change Photo : "+$("#inputAvatar").val());
        document.getElementById("formAvatar").submit()
    });
});