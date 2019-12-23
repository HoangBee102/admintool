    @extends('admin.layouts.layout-basic')

    @section('scripts')
        <script src="/assets/admin/js/pages/datatables.js"></script>       
        
        <script type="text/javascript">
            $(document).ready(function () {
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
                                    $('#responsive-datatable tbody').append('<tr><td>' + khambenh[i].mabn +'</td><td>' + khambenh[i].makb +'</td><td>'+ khambenh[i].holot + " "+ khambenh[i].ten +'</td><td>'+ khambenh[i].ngaykcb +'</td><td>' + khambenh[i].dakham +'</td><td><button name ="btnEdit" type="button" class="btn btn-success" data-id="'+ khambenh[i].makb +'" data-post="data-php"><i class="fa fa-edit"> Fix</button></td></tr>');
                                }                                                       
                            }
                        });  
                    }   
                });
            });
        </script> 
    @stop

    @section('content')
        <div class="main-content">
            <div class="page-header">
                <h3 class="page-title">Công cụ hỗ trợ Tin Học</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Tool Fix</a></li>
                    <li class="breadcrumb-item active">Fix lỗi in phiếu TNT</li>
                </ol>
                <div class="page-actions">                    
                                       
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h6>Sửa lỗi trong quá trình in phiếu 01 TNT</h6></div> 
                        <div class="card-body">
                            <form class="form-inline">
                                <input type="hidden" name="url" value="{{ asset('admin/toolfix/findkhambenh') }}">
                                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                <div class="form-group">
                                    <label for="input_makb">Mã khám bệnh:</label>
                                    <input type="number" class="form-control" id="input_makb">
                                </div>                                                                    
                                <button type="submit" class="btn btn-success" id="btnTim" name="btnTim">Tìm</button>
                            </form>
                            <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Mã BN</th>
                                    <th>Mã KB</th>
                                    <th>Họ tên BN</th>
                                    <th>Ngày KCB</th>
                                    <th>TT "dakham"</th>
                                    <th>Hành động</th>                                
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Mã BN</th>
                                    <th>Mã KB</th>
                                    <th>Họ tên BN</th>
                                    <th>Ngày KCB</th>
                                    <th>TT "dakham"</th>
                                    <th>Hành động</th> 
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td colspan="6">Chưa tìm thấy dữ liệu!!</td>                                
                                </tr>                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    @stop
