
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
                                        <strong>Create</strong> Pasting 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreatePasting" name="CreatePasting" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Pasting Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="PastingName" id="PastingName" class="form-control clsStyle" placeholder="Enter Pasting Name">
                                                   <span id="MSG_PastingName" class="clsStyle"></span>
                                               </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Pasting Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="number" id="PastingRate" name="PastingRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                   <span id="MSG_PastingRate" class="clsStyle"></span>
                                               </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnPastingSubmit">
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
                                        <tbody id="tbodyPastingData">
                                          
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

Display_Pasting_Data();
function Display_Pasting_Data(){
    var url = '../action/action_pasting.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Pasting_Data'},
      success: function (data) {
            $('#tbodyPastingData').html(data);
      }
    }); 
}
    
    $(document).on('keyup','#PastingName',function(){
        let PastingName = $('#PastingName').val();
        if(PastingName != ""){
          $('#MSG_PastingName').empty();
        }else{
          $('#MSG_PastingName').text("Pasting Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#PastingRate',function(){
        let PastingRate = $('#PastingRate').val();
        if(PastingRate != ""){
          $('#MSG_PastingRate').empty();
        }else{
          $('#MSG_PastingRate').text("Pasting Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnPastingSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_pasting.php';
    if($('#PastingName').val() != "" && $('#PastingRate').val() != ""){
          var formData = {
            'PastingName'   : $('#PastingName').val(),
            'PastingRate'   : $('#PastingRate').val(),
            'action'        : "Insert_Pasting_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreatePasting')[0].reset();
          }
        });
    }else{
        if($('#PastingName').val() == ""){
          $('#MSG_PastingName').text("Pasting Name Is Mandatory..").css("color", "red");
        }
        if($('#PastingRate').val() == ""){
          $('#MSG_PastingRate').text("Pasting Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_pasting.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'pasting_id' : $(this).closest('tr').find('#pasting_id').text(),
          'action'     : "Delete_Pasting_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_pasting.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Pasting_Data();
      }
    });
    
});

</script>
   