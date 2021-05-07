var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


jQuery(document).ready(function($) {
    $('.datepicker').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    var d = new Date();
    var n = d.getFullYear();
    $('.datepicker').val(n);
});
$(document).ready(function() {
    transaksiChart();

    function transaksiChart(){
        $.ajax({
            url:"TransaksiUserChart",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
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
                var bar= [0,0,0,0,0,0,0,0,0,0,0,0,0];
                var month;
                for(i=0;i<dataResult.length;i++){
                    month=dataResult[i].created_at.substr(5,2);
                    if(month=='01'){
                        bar[1]+=1;
                    }else if(month=='02'){
                        bar[2]+=1;
                    }else if(month=='03'){
                        bar[3]+=1;
                    }else if(month=='04'){
                        bar[4]+=1;
                    }else if(month=='05'){
                        bar[5]+=1;
                    }else if(month=='06'){
                        bar[6]+=1;
                    }else if(month=='07'){
                        bar[7]+=1;
                    }else if(month=='08'){
                        bar[8]+=1;
                    }else if(month=='09'){
                        bar[9]+=1;
                    }else if(month=='10'){
                        bar[10]+=1;
                    }else if(month=='11'){
                        bar[11]+=1;
                    }else if(month=='12'){
                        bar[12]+=1;
                    }
                }
                for(i=1;i<bar.length;i++){
                    var persen = 100/Math.max.apply(null,bar)*bar[i];
                    $("#bar"+i).css({
                        height: persen+"%",
                        transition: '2s'
                    });
                    $("#bar"+i).html("<p>"+bar[i]+"</p>")
                }
                var temp = 100;
                for(i=1;i<=5;i++){
                    var persen = temp/100*Math.max.apply(null,bar);
                    $("#ticks"+i).html("<p>"+parseFloat(persen).toFixed(0)+"</p>");
                    temp = temp-20;
                }
            }
        })
    }

    function RewardGetAll(){
        $.ajax({
            url:"RewardUserRecent",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                var content = "";
                const monthNames = ["","Jan", "Feb", "Mar", "Apr", "May", "Jun",
                                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                                    ];
                for(i=0;i<dataResult.length;i++){
                    content += "<tr>"
                    content += "<td class='ellipsis'>"+ dataResult[i].name +"</td>"
                    content += "<td>"+ dataResult[i].nominal +" Points</td>"
                    content += "<td>"+ dataResult[i].created_at.substr(8,2)+"-"+monthNames[Number(dataResult[i].created_at.substr(5,2))] +"</td>" 
                    content += "</tr>"
                    console.log(Number(dataResult[i].created_at.substr(5,2)))
                }
                $(".table-recentReward tbody").html(content)
            }
        })
    }

    updateNotification();
    function updateNotification(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "userNotificationRewardUpdate",
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
            },
            cache: false,
            success: function(dataResult){
                
            }
        });
    }

    window.links = function(currentPage,total,url){ 
        var content="";
        var temp=currentPage-2;
        if(currentPage==2){
            $( "#lastLink" ).before( '<li class="page-item .bg-success"><a class="page-link bg-primary text-white" href="'+url+'?page='+currentPage+'">'+currentPage+'</a></li>' );      
        }else if(currentPage>2){
            $( "#lastLink" ).before( '<li class="page-item"><a class="page-link" href="'+url+'?page='+temp+'">...</a></li>' );      
            $( "#lastLink" ).before( '<li class="page-item .bg-success"><a class="page-link bg-primary text-white" href='+url+'"?page='+currentPage+'">'+currentPage+'</a></li>' );      
        }

        if(total % 10 == 0){ //mendapatkan jumlah page
            totalBtn=Math.floor(total/10);
        }else{
            totalBtn=Math.floor(total/10)+1;

        }
       
        for(i=currentPage;i<totalBtn;i++){
            j=i+1;
            if(i<currentPage+1){
                $( "#lastLink" ).before( '<li class="page-item"><a class="page-link" href="'+url+'?page='+j+'">'+j+'</a></li>' );      
            }else if(i<totalBtn-1){
                    
            }else{
                $( "#lastLink" ).before( '<li class="page-item"><a class="page-link" href="'+url+'?page='+totalBtn+'">...</a></li>' );  
            }
        }
        console.log(totalBtn);
    }

    window.popUp = function(){
        document.getElementById('id01').style.display='block';
    }

    window.popUpClose = function(){
        document.getElementById('id01').style.display='none';
    }

    $( "#submit" ).click(function() {
        if(parseFloat($( "#point" ).text()) < parseFloat($( "#inputWithdraw" ).val())){
            alert("Point Tidak Cukup");
        }else if(parseFloat($( "#point" ).text()) >= parseFloat($( "#inputWithdraw" ).val()) && $( "#inputWithdraw" ).val()!==null){
            document.getElementById("formWithdraw").submit()
        }
              
    });
});