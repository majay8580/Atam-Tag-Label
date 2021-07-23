
        <!-- HEADER DESKTOP-->
               <?php
             include('../header/header.php');
             if(!empty($_GET['action'])){
            	  $action = $_GET['action'];
             }else{
                	$action = "Create"; 
             } 
        ?>
               <!-- PAGE CONTENT-->
               <div class="container createform">
                     <?php
        
        
        if($action == "Create"){
        
        ?>
                   <div class="row">
                       <div class="col-lg-2">
</div>
               <div class="col-lg-8">
               <div class="card">
                                    <div class="card-header">
                                        <strong>Create</strong> UV  
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateUV" name="CreateUV" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">UV</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input type="text" id="UVName" name="UVName" autocomplete="off"  placeholder="Enter UV Name..." class="form-control clsStyle">
                                                  <span id="MSG_UVName" class="clsStyle"></span>
                                               </div>  
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">UV Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="UVRate" name="UVRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_UVRate" class="clsStyle"></span>
                                               </div>  
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnUVSubmit">
                                             Save
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm" id="BtnView">
                                            View
                                        </button>
                                    </div>
                                 </form>
                                </div>
                                <div class="col-lg-2">
</div>
</div>
</div
<?php
}
if($action == "View"){
    
?>

                 
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyUVData">
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->


<?php
}
?>

</div>
            <!-- END STATISTIC-->

            
          
<!-- COPYRIGHT-->
<?php
      include('../footer/footer.php');
?>
<script type="text/javascript">

Display_UV_Data();
function Display_UV_Data(){
    var url = '../action/action_uvcoding.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_UV_Data'},
      success: function (data) {
            $('#tbodyUVData').html(data);
      }
    }); 
}
    
    $(document).on('keyup','#UVName',function(){
        let UVName = $('#UVName').val();
        if(SizeWidth != ""){
          $('#MSG_UVName').empty();
        }else{
          $('#MSG_UVName').text("UV Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#UVRate',function(){
        let UVRate = $('#UVRate').val();
        if(UVRate != ""){
          $('#MSG_UVRate').empty();
        }else{
          $('#MSG_UVRate').text("UV Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnUVSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_uvcoding.php';
    if($('#UVName').val() != "" && $('#UVRate').val() != ""){
          var formData = {
            'UVName'     : $('#UVName').val(),
            'UVRate'     : $('#UVRate').val(),
            'action'     : "Insert_UV_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateUV')[0].reset();
          }
        });
    }else{
        if($('#UVName').val() == ""){
          $('#MSG_UVName').text("UV Name Is Mandatory..").css("color", "red");
        }
        if($('#UVRate').val() == ""){
          $('#MSG_UVRate').text("UV Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_uvcoding.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'uv_coding_id' : $(this).closest('tr').find('#uv_coding_id').text(),
          'action'          : "Delete_UV_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_uvcoding.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_UV_Data();
      }
    });
    
});

</script>
   