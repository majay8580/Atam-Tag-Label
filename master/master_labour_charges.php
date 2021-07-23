
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
                                        <strong>Create</strong> Labour Charges 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateLabourCharges" name="CreateLabourCharges" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Labour</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="LabourChargesName" name="LabourChargesName" autocomplete="off"  placeholder="Enter Name..." class="form-control clsStyle">
                                                    <span id="MSG_LabourChargesName" class="clsStyle"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="LabourChargesRate" name="LabourChargesRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_LabourChargesRate" class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnLabourChargesSubmit">
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
                                        <tbody id="tbodyLabourChargesData">
                                          
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
Display_labour_Data();
function Display_labour_Data(){
    var url = '../action/action_labour_charges.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_LabourCharges_Data'},
      success: function (data) {
            $('#tbodyLabourChargesData').html(data);
      }
    });    
}
    
    $(document).on('keyup','#LabourChargesName',function(){
        let LabourChargesName = $('#LabourChargesName').val();
        if(LabourChargesName != ""){
          $('#MSG_LabourChargesName').empty();
        }else{
          $('#MSG_LabourChargesName').text("Labour Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#LabourChargesRate',function(){
        let LabourChargesRate = $('#LabourChargesRate').val();
        if(LabourChargesRate != ""){
          $('#MSG_LabourChargesRate').empty();
        }else{
          $('#MSG_LabourChargesRate').text("Labour Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnLabourChargesSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_labour_charges.php';
    if($('#LabourChargesName').val() != "" && $('#LabourChargesRate').val() != ""){
          var formData = {
            'LabourChargesName'    : $('#LabourChargesName').val(),
            'LabourChargesRate'    : $('#LabourChargesRate').val(),
            'action'               : "Insert_LabourCharges_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateLabourCharges')[0].reset();
          }
        });
    }else{
        if($('#LabourChargesName').val() == ""){
          $('#MSG_LabourChargesName').text("Labour Name Is Mandatory..").css("color", "red");
        }
        if($('#LabourChargesRate').val() == ""){
          $('#MSG_LabourChargesRate').text("Labour Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_labour_charges.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'labour_charges_Id' : $(this).closest('tr').find('#labour_charges_Id').text(),
          'action'   : "Delete_LabourCharges_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_labour_charges.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_labour_Data();
      }
    });
});
</script>
   