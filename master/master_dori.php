
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
                                        <strong>Create</strong> Dori 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateDori" name="CreateDori" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Dori Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="DoriName" name="DoriName" autocomplete="off"  placeholder="Enter Dori Name" class="form-control clsStyle">
                                                    <span id="MSG_DoriName" class="clsStyle"></span>   
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Dori Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="DoriRate" name="DoriRate" autocomplete="off"  placeholder="Enter Rate" class="form-control clsStyle">
                                                    <span id="MSG_DoriRate" class="clsStyle"></span>   
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnDoriSubmit">
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
                                        <tbody id="tbodyDoriData">
                                          
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

Display_Dori_Data();
function Display_Dori_Data(){
    var url = '../action/action_dori.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Dori_Data'},
      success: function (data) {
            $('#tbodyDoriData').html(data);
      }
    });
}
    
    $(document).on('keyup','#DoriName',function(){
        let DoriName = $('#DoriName').val();
        if(DoriName != ""){
          $('#MSG_DoriName').empty();
        }else{
          $('#MSG_DoriName').text("Dori Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#DoriRate',function(){
        let DoriRate = $('#DoriRate').val();
        if(DoriRate != ""){
          $('#MSG_DoriRate').empty();
        }else{
          $('#MSG_DoriRate').text("Dori Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnDoriSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_dori.php';
    if($('#DoriName').val() != "" && $('#DoriRate').val() != ""){
          var formData = {
            'DoriName'     : $('#DoriName').val(),
            'DoriRate'     : $('#DoriRate').val(),
            'action'       : "Insert_Dori_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateDori')[0].reset();
          }
        });
    }else{
        if($('#DoriName').val() == ""){
          $('#MSG_DoriName').text("Dori Name Is Mandatory..").css("color", "red");
        }
        if($('#DoriRate').val() == ""){
          $('#MSG_DoriRate').text("Dori Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_dori.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'dori_Id'     : $(this).closest('tr').find('#dori_Id').text(),
          'action'      : "Delete_Dori_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_dori.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Dori_Data();
      }
    });
});

</script>
   