var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    getData();
    function getData(){
        $.ajax({
            url:"ListShowroomGetDataAll",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                var content = "";
                for(i=0;i<dataResult.length;i++){
                    content += "<tr class='clickable-row' data-href='url://'>"
                    content += "<td>"+ dataResult[i].name +"</td>"
                    content += "<td>"+ dataResult[i].email +"</td>"
                    content += "<td><i class='fas fa-arrow-alt-circle-right' onclick='getDetail("+dataResult[i].id+");'></i></td>"
                    content += "</tr>"
                }
                $(".table-users tbody").html(content)
            }
        })
    }

    window.getDetail = function(id){
        popUp()
        $.ajax({
            url:"RegistrasiGetData",
            type: "get",
            dataType: "json",
            data: {
                id : id,
                _token: CSRF_TOKEN
            },
            success: function(dataResult){
                var content = dataResult.name
                $("#name").html(content)

                content= dataResult.email
                $("#email").html(content)

                content= dataResult.email
                $("#telp").html(content)

                content= dataResult.email
                $("#alamat").html(content)

                content= dataResult.updated_at.substr(0,10)
                $("#tanggal").html(content)

                content= "<img id='imgCv' src='data:image/jpeg;base64,"+dataResult.cv+"' onclick=openImageCv()>"
                $("#cv").html(content)

                content= "<img id='imgKtp' src='data:image/jpeg;base64,"+dataResult.ktp+"' onclick=openImageKtp()>"
                $("#ktp").html(content)
                
                content= 'Rp.0 <button class="btn btn-primary" style="width: 20%;" onclick="">History</button>'
                $("#reward").html(content)

                var btn = '<button class="btn btn-danger" style="width: 20%" onclick="deleteRegister('+dataResult.id+')">Delete</button>';
                $("#delete").html(btn)

                btn = '<button class="w3-button w3-right w3-white" onclick="popUpClose();" style="font-size: 20px;"><i class="far fa-times-circle fa-1x"></i></button>';
                $("#close").html(btn)
            }
        })
    }

    window.openImageCv = function() {
        var image = new Image();
        image.style= '-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;'
        image.src = $('#imgCv').attr('src');
        image.width=600;

        var w = window.open("");
        w.document.write(image.outerHTML);
    }

    window.openImageKtp = function() {
        var image = new Image();
        image.style= '-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;'
        image.src = $('#imgKtp').attr('src');
        image.width=600;

        var w = window.open("");
        w.document.write(image.outerHTML);
    }

    window.popUp = function(id){
        document.getElementById('id01').style.display='block';
    }

    window.popUpClose = function(id){
        document.getElementById('id01').style.display='none';
    }

    window.search = function(name){
        $.ajax({
            url:"ListShowroomSearch",
            type: "get",
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                name: name
            },
            success: function(dataResult){
                var content = "";
                for(i=0;i<dataResult.length;i++){
                    content += "<tr class='clickable-row' data-href='url://'>"
                    content += "<td>"+ dataResult[i].name +"</td>"
                    content += "<td>"+ dataResult[i].email +"</td>"
                    content += "<td><i class='fas fa-arrow-alt-circle-right' onclick='getDetail("+dataResult[i].id+");'></i></td>"
                    content += "</tr>"
                }
                $(".table-users tbody").html(content)
            }
        })
    }
});

$(document).on('keypress',function(e) {
    if(e.which == 13 && $("#search").val() !== "") {
        search($("#search").val());
    }
});