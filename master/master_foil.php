
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
                                        <strong>Create</strong> Foil 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateFoil" name="CreateFoil" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Foil Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="FoilName" name="FoilName" autocomplete="off"  placeholder="Enter Foil Name..." class="form-control clsStyle">
                                                    <span id="MSG_FoilName" class="clsStyle"></span>  
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Foil Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="FoilRate" name="FoilRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_FoilRate" class="clsStyle"></span>  
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnFoilSubmit">
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
                                        <tbody id="tbodyFoilData">
                                          
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

Display_Foil_Data();
function Display_Foil_Data(){
    var url = '../action/action_foil.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Foil_Data'},
      success: function (data) {
            $('#tbodyFoilData').html(data);
      }
    });  
}
    
    $(document).on('keyup','#FoilName',function(){
        let FoilName = $('#FoilName').val();
        if(FoilName != ""){
          $('#MSG_FoilName').empty();
        }else{
          $('#MSG_FoilName').text("Foil Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#FoilRate',function(){
        let FoilRate = $('#FoilRate').val();
        if(FoilRate != ""){
          $('#MSG_FoilRate').empty();
        }else{
          $('#MSG_FoilRate').text("Foil Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnFoilSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_foil.php';
    if($('#FoilName').val() != "" && $('#FoilRate').val() != ""){
          var formData = {
            'FoilName'    : $('#FoilName').val(),
            'FoilRate'    : $('#FoilRate').val(),
            'action'      : "Insert_Foil_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateFoil')[0].reset();
          }
        });
    }else{
        if($('#FoilName').val() == ""){
          $('#MSG_FoilName').text("Foil Name Is Mandatory..").css("color", "red");
        }
        if($('#FoilRate').val() == ""){
          $('#MSG_FoilRate').text("Foil Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_foil.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'foil_id' : $(this).closest('tr').find('#foil_id').text(),
          'action'  : "Delete_Foil_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_foil.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Foil_Data();
      }
    });
    
});
</script>
   