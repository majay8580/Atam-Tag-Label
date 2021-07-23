
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
                                        <strong>Create</strong> Design Charges 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateDesign" name="CreateDesign" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Design</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="DesignName" name="DesignName" autocomplete="off"  placeholder="Enter Design Name..." class="form-control clsStyle">
                                                    <span id="MSG_DesignName" class="clsStyle"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="number" id="DesignRate" name="DesignRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                     <span id="MSG_SizeHeight class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnDesignSubmit">
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
                                        <tbody id="tbodyDesignData">
                                          
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

Display_Design_Data();
function Display_Design_Data(){
    var url = '../action/action_design_charges.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Design_Data'},
      success: function (data) {
            $('#tbodyDesignData').html(data);
      }
    });  
}
    
    $(document).on('keyup','#DesignName',function(){
        let DesignName = $('#DesignName').val();
        if(DesignName != ""){
          $('#MSG_DesignName').empty();
        }else{
          $('#MSG_DesignName').text("Design Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#DesignRate',function(){
        let DesignRate = $('#DesignRate').val();
        if(DesignRate != ""){
          $('#MSG_DesignRate').empty();
        }else{
          $('#MSG_DesignRate').text("Design Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnDesignSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_design_charges.php';
    if($('#DesignName').val() != "" && $('#DesignRate').val() != ""){
          var formData = {
            'DesignName'    : $('#DesignName').val(),
            'DesignRate'    : $('#DesignRate').val(),
            'action'        : "Insert_Design_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateDesign')[0].reset();
          }
        });
    }else{
        if($('#DesignName').val() == ""){
          $('#MSG_DesignName').text("Design Name Is Mandatory..").css("color", "red");
        }
        if($('#DesignRate').val() == ""){
          $('#MSG_DesignRate').text("Design Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_design_charges.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'design_id' : $(this).closest('tr').find('#design_id').text(),
          'action'   : "Delete_Design_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_design_charges.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Design_Data();
      }
    });
});


</script>
   