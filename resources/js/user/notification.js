var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    notificationTransaksi();
    function notificationTransaksi(){
        $.ajax({
            url:"userNotification",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                content="";
                if(dataResult.length!=0){
                    for(i=0;i<dataResult.length;i++){
                        if(dataResult[i].type=='transaksi'){
                            content+='<a class="dropdown-item">transaksi ('+dataResult[i].nomer+') disetujui </a>';
                        }else  if(dataResult[i].type=='withdraw'){
                            content+='<a class="dropdown-item">withdraw ('+dataResult[i].nomer+') disetujui </a>';
                        }else if(dataResult[i].type=='reward'){
                            content+='<a class="dropdown-item">berhasil mendapatkan ('+dataResult[i].nomer+') point</a>';
                        }
                    }
                    $('#notification').html(content);
                    $('#badge').show();
                }
               
            }
        })
    }
});