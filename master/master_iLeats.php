
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
                                        <strong>Create</strong> ILeats 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateiLeats" name="CreateiLeats" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">ILeats Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="iLeatsName" name="iLeatsName" autocomplete="off"  placeholder="Enter ILeats Name" class="form-control clsStyle">
                                                    <span id="MSG_iLeatsName" class="clsStyle"></span> 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">ILeats Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="number" id="iLeatsRate" name="iLeatsRate" autocomplete="off"  placeholder="Enter Rate" class="form-control clsStyle">
                                                   <span id="MSG_iLeatsRate" class="clsStyle"></span> 
                                                </div>
                                            </div>    
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtniLeatsSubmit">
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
                                        <tbody id="tbodyiLeatsData">
                                          
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

Display_ILeats_Data();
function Display_ILeats_Data(){
    var url = '../action/action_iLeats.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_iLeats_Data'},
      success: function (data) {
            $('#tbodyiLeatsData').html(data);
      }
    });    
}
    
    $(document).on('keyup','#iLeatsName',function(){
        let iLeatsName = $('#iLeatsName').val();
        if(iLeatsName != ""){
          $('#MSG_iLeatsName').empty();
        }else{
          $('#MSG_iLeatsName').text("iLeats Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#iLeatsRate',function(){
        let iLeatsRate = $('#iLeatsRate').val();
        if(iLeatsRate != ""){
          $('#MSG_iLeatsRate').empty();
        }else{
          $('#MSG_iLeatsRate').text("iLeats Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtniLeatsSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_iLeats.php';
    if($('#iLeatsName').val() != "" && $('#iLeatsRate').val() != ""){
          var formData = {
            'iLeatsName'    : $('#iLeatsName').val(),
            'iLeatsRate'    : $('#iLeatsRate').val(),
            'action'        : "Insert_iLeats_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateiLeats')[0].reset();
          }
        });
    }else{
        if($('#iLeatsName').val() == ""){
          $('#MSG_iLeatsName').text("iLeats Name Is Mandatory..").css("color", "red");
        }
        if($('#iLeatsRate').val() == ""){
          $('#MSG_iLeatsRate').text("iLeats Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_iLeats.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'ileats_Id' : $(this).closest('tr').find('#ileats_Id').text(),
          'action'    : "Delete_ileats_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_iLeats.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_ILeats_Data();
      }
    });
    
});
</script>
   