
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
                                        <strong>Create</strong> Die Cutting 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateDieCutting" name="CreateDieCutting" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Die Cutting</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="DieCuttingName" name="DieCuttingName" autocomplete="off"  placeholder="Enter Die Cutting Name..." class="form-control clsStyle">
                                                     <span id="MSG_DieCuttingName" class="clsStyle"></span>                                                 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="DieCuttingRate" name="DieCuttingRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                     <span id="MSG_DieCuttingRate" class="clsStyle"></span>                                                
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnDieCuttingSubmit">
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
                                        <tbody id="tbodyDieCuttingData">
                                          
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

Display_DieCutting_Data();

function Display_DieCutting_Data(){
    var url = '../action/action_die_cutting.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_DieCutting_Data'},
      success: function (data) {
            $('#tbodyDieCuttingData').html(data);
      }
    });    
}
    
    $(document).on('keyup','#DieCuttingName',function(){
        let DieCuttingName = $('#DieCuttingName').val();
        if(DieCuttingName != ""){
          $('#MSG_DieCuttingName').empty();
        }else{
          $('#MSG_DieCuttingName').text("Die Cutting Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#DieCuttingRate',function(){
        let DieCuttingRate = $('#DieCuttingRate').val();
        if(DieCuttingRate != ""){
          $('#MSG_DieCuttingRate').empty();
        }else{
          $('#MSG_DieCuttingRate').text("Die Cutting Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnDieCuttingSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_die_cutting.php';
    if($('#SizeWidth').val() != "" && $('#SizeHeight').val() != ""){
          var formData = {
            'DieCuttingName'    : $('#DieCuttingName').val(),
            'DieCuttingRate'    : $('#DieCuttingRate').val(),
            'action'            : "Insert_DieCutting_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateDieCutting')[0].reset();
          }
        });
    }else{
        if($('#DieCuttingName').val() == ""){
          $('#MSG_DieCuttingName').text("Die Cutting Name Is Mandatory..").css("color", "red");
        }
        if($('#DieCuttingRate').val() == ""){
          $('#MSG_DieCuttingRate').text("Die Cutting Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_die_cutting.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'die_cutting_Id' : $(this).closest('tr').find('#die_cutting_Id').text(),
          'action'         : "Delete_DieCutting_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_die_cutting.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_DieCutting_Data();
      }
    });
    
});

</script>
   