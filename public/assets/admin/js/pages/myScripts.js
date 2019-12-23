function getMessage() {
    $.ajax({
       type:'POST',
       url:'/getmsg',
       data:'_token = <?php echo csrf_token() ?>',
       success:function(data) {
          $("#staticEmail2").html(data.msg);          
       }
    });
 }


$('#btnTim').click(function(event){   
	event.preventDefault(); 
	alert("Hello! I am an alert box!!");              
    $l_makb = $('#input_makb').val().length;
    if($l_makb == '10'){                  
        var makb = $('#input_makb').val();
        var token = $('meta[name="csrf-token"]').attr('content'); //$("input[name='_token']").val();// 
        var url = $("input[name='url']").val();
        $.ajax({
            type:'POST',             
            url: url, 
            dataType:"text",
            data : { // Danh sách các thuộc tính sẽ gửi đi
                makb : makb,
                _token : token,
        	},
            success:function(data) {
                var khambenh = $.parseJSON(data);
                $('#responsive-datatable tbody tr').remove();
                var DTable = "";
                for (i = 0; i < 100; i++){                                                           
                    if (i % 2 === 0){ 
                        $('#responsive-datatable tbody').append('<tr role="row" class="odd"><td>'+ khambenh[i].holot + " "+ khambenh[i].ten +'</td><td>'+ khambenh[i].makb +'</td><td>'+ khambenh[i].macls +'</td><td>' + khambenh[i].id +'</td><td>'+ khambenh[i].ngaygiobd +'</td><td>'+ khambenh[i].ngaygiokt +'</td><td><button name ="btnEdit" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-id="'+ khambenh[i].id +'" data-post="data-php"><span class="fa fa-edit"></span>  Edit</button></td></tr>');
                    } else {            
                        $('#responsive-datatable tbody').append('<tr role="row" class="even"><td>'+ khambenh[i].holot + " "+ khambenh[i].ten +'</td><td>'+ khambenh[i].makb +'</td><td>'+ khambenh[i].macls +'</td><td>' + khambenh[i].id +'</td><td>'+ khambenh[i].ngaygiobd +'</td><td>'+ khambenh[i].ngaygiokt +'</td><td><button name ="btnEdit" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-id="'+ khambenh[i].id +'" data-post="data-php"><span class="fa fa-edit"></span>  Edit</button></td></tr>');
                    }                             
                }                                                        
            }
        });  
    }   
});             
