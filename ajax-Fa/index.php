<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <title>اطلاعات کاربران</title>
        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container box">
            <div class="table-responsive">
                <div style="align:left">
                    <button type="button" id="add_btn" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary btn-lg">افزودن کاربر</button>
                    <br><br>
                </div>
                <table id="user_tbl" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th id="center">تصویر</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th id="center">سن</th>
                            <th id="center">ویرایش</th>
                            <th id="center">حذف</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>

<!--......................................................input.modal..................................................-->

<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">اضافه کردن کاربر</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>
                        <label for="first_name">نام</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                    </p>
                    <p>
                        <label for="last_name">نام خانوادگی</label>
                        <input type="text" name="last_name" id="last_name" class="form-control">
                    </p>
                    <p>            
                        <label for="email">ایمیل</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </p>
                    <p>
                        <label for="age">سن</label>
                        <input type="text" name="age" id="age" class="form-control">
                    </p>
                    <p>
                        <label for="user_image">تصویر</label>
                        <input type="file" name="user_image" id="user_image">
                        <span id="user_upload_image"></span>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="operation" id="operation">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-default btn-secondary">بستن</button>
                    <input type="reset" class="btn btn-danger" value="بازنشانی">
                    <input type="submit" class="btn btn-success" name="action" id="action" value="Add">
                </div>
            </div>
        </form>
    </div>
</div>

<!--.......................................................delete.modal................................................-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">تاییدیه حذف</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                آیا از حذف کاربر اطمینان دارید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary" id="done" data-bs-toggle="modal" data-bs-target=".infoModal">تایید</button>
            </div>
        </div>
    </div>
</div>

<!--.......................................................info.modal..................................................-->

<div class="modal fade infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="infoModalLabel">اطلاعیه</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body" id="data">
            
        </div>
    </div>
</div>
</div>

<!--.......................................................DataTable,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->

<script type="text/javascript" language="javascript">
    $(document).ready(function(){                                                       //if all page is load :
        var table = $('#user_tbl').DataTable({                                          //show data as database in table whit user_tbl ID
            "processing": true,
            "serverSide": true,
            "order": [], 
            "ordering": false, 
            "ajax":{                                                                
                url: "fetch.php",                                                       //data get from fetch.php file
                type: "POST"                                                            //get data whit post method
            },
            "language": {
                "search": "جستجو : ",
                "lengthMenu": "نمایش _MENU_ رکورد در هر صفحه",
                "zeroRecords": "هیچ موردی یافت نشد",
                "info": "نمایش صفحه _PAGE_ از _PAGES_",
                "infoEmpty": "رکوردی موجود نیست",
                "infoFiltered": "(فیلتر شده از مجموع _MAX_ رکورد)",
                "paginate": {
                    "first": "ابتدا",
                    "last": "انتها",
                    "next": "بعدی",
                    "previous": "قبلی"
                }
            }

        });
       
//.........................................................open.modal.....................................................

        $('#add_btn').click(function(){                                                 //if click button whit add_btn ID execute this code :
            $('#user_form')[0].reset();                                                 //clear form list in modal page  
            $('.modal-title').text('اضافه کردن کاربر');                                //div tsg whit modat-title class in modal page -> chenge text to 'Add New User'
            $('#action').val('ثبت');                                                    //chenge input(submit) value  whit action ID to 'Add'
            $('#operation').val('Add');                                                 //chenge input(hidden) value  whit operation ID to 'Add'
            $('#user_upload_image').html('');                                           //clear span tag (this tag show user image)
        })

//.........................................................Add.Data.......................................................

        $(document).on('submit', '#user_form', function(event){
            event.preventDefault();                                                     //clear all information in form
            var FirstName = $('#first_name').val();
            var LastName = $('#last_name').val();
            var Email = $('#email').val();
            var Age = $('#age').val();
            var Ext = $('#user_image').val().split('.').pop().toLowerCase();            //get extension image file 
            if(Ext !=''){
                if(jQuery.inArray(Ext,['jpg','png','tif','jpeg']) == -1)                //if image extension not ('jpg','png','tif','jpeg') -> show warning
                {
                    alert("Invalid Image Selected");
                    $('#user_image').val('');
                    return false;
                }
            }

            if(FirstName != '', LastName != '', Email != '', Age != ''){
                $.ajax({
                    url: 'insert.php',                                                  //send data to insert.php file                                          
                    type: 'POST',                                                       //sent whit post method
                    data: new FormData(this),                                           //all data in selected form send to php file
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data){                                            //if success send data :
                        $('#data').text(data),
                        $('.infoModal').modal('show'),
                        $('#user_form')[0].reset();                                     //clear form list in modal page  
                        $('#addModal').modal('hide');                                   //close modal page
                        table.ajax.reload(null, false);                                 //reload table
                    }
                });
            } else {
                alert("لطفا همه مقادیر را کامل وارد کنید.");
            }
        })

//.........................................................Edit.Data......................................................

        $(document).on('click', '.update', function(){                                  //if click on update button
            var UserID = $(this).attr("id");                                            //save row(client) ID
            $.ajax({     
                url: 'SingleFetch.php',                                                 
                method: 'POST',
                data: {user_id:UserID},                                                 //this data(client ID) send to defined url 
                dataType: 'json',                                                       //define sended data 
                success: function(data){                                                //if secess conection to url : 
                    $('#addModal').modal('show'),                                       //open modal page
                    $('#first_name').val(data.FirstName);                               //initatlize first name input in modal page whit resived data at url
                    $('#last_name').val(data.LastName);                                 // ...
                    $('#email').val(data.Email);                                        // ...
                    $('#age').val(data.Age);                                            // ...
                    $('#user_upload_image').html(data.user_image);                      // ...
                    $('.modal-title').text('صفحه ویرایش');                                //chenge modal title to edit user
                    $('#user_id').val(UserID);                                          //
                    $('#action').val('ویرایش');                                           //chenge submit button value to edit 
                    $('#operation').val('Edit');                                        //chenge operation to edit (this variable in insert.php definition execute add or edit user)
                }
            })
        });

//.........................................................Delete.Data....................................................

        $(document).on('click', '.delete', function(){
            var UserID = $(this).attr("id");                                            //save row(client) ID
            $(document).on('click', '#done', function(){
                $('#data').text('کاربر با موفقیت حذف شد.'),
                $.ajax({
                    url: 'delete.php',
                    method: 'POST',
                    data: {user_id: UserID},
                    success: function(data){
                        $('#deleteModal').modal('hide');                                //close modal page
                        table.ajax.reload(null, false);
                    }
                })
            })
        });

//.........................................................close.modal....................................................

        $('.infoModal').on('shown.bs.modal', function () {                              //close automatic info modal     
            setTimeout(function () {
                $('.infoModal').modal('hide');
            }, 1000); 
        });
    })  
</script>