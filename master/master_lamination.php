
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
                                        <strong>Create</strong> Lamination 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateLamination" name="CreateLamination" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Lamination</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="LaminationName" name="LaminationName" autocomplete="off"  placeholder="Enter Lamination Name..." class="form-control clsStyle">
                                                    <span id="MSG_LaminationName" class="clsStyle"></span>                          
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Lamination Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="LaminationRate" name="LaminationRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_LaminationRate" class="clsStyle"></span>                         
                                                </div>
                                            </div>
                                            
                                                
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnLaminationSubmit">
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
                                        <tbody id="tbodyLaminationData">
                                          
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

Display_Lamination_Data();
function Display_Lamination_Data(){
    var url = '../action/action_lamination.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Lamination_Data'},
      success: function (data) {
            $('#tbodyLaminationData').html(data);
      }
    }); 
}
    
    $(document).on('keyup','#LaminationName',function(){
        let LaminationName = $('#LaminationName').val();
        if(LaminationName != ""){
          $('#MSG_LaminationName').empty();
        }else{
          $('#MSG_LaminationName').text("Lamination Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#LaminationRate',function(){
        let LaminationRate = $('#LaminationRate').val();
        if(LaminationRate != ""){
          $('#MSG_LaminationRate').empty();
        }else{
          $('#MSG_LaminationRate').text("Lamination Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnLaminationSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_lamination.php';
    if($('#LaminationName').val() != "" && $('#LaminationRate').val() != ""){
          var formData = {
            'LaminationName'    : $('#LaminationName').val(),
            'LaminationRate'    : $('#LaminationRate').val(),
            'action'            : "Insert_Lamination_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateLamination')[0].reset();
          }
        });
    }else{
        if($('#LaminationName').val() == ""){
          $('#MSG_LaminationName').text("Lamination Name Is Mandatory..").css("color", "red");
        }
        if($('#LaminationRate').val() == ""){
          $('#MSG_LaminationRate').text("Lamination Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_lamination.php?action=View";
});


$(document).on('click','.clsDelete',function(){
    var formData = {
          'lamination_id' : $(this).closest('tr').find('#lamination_id').text(),
          'action'   : "Delete_Lamination_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_lamination.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Lamination_Data();
      }
    });
    
});

</script>
   