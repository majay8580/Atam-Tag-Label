
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
                                        <strong>Create</strong> Embosing 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateEmbosing" name="CreateEmbosing" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Embosing</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="EmbosingName" name="EmbosingName" autocomplete="off"  placeholder="Enter Embosing Name..." class="form-control clsStyle">
                                                    <span id="MSG_EmbosingName" class="clsStyle"></span>   
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Embosing Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="EmbosingRate" name="EmbosingRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_EmbosingRate" class="clsStyle"></span>   
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnEmbosingSubmit">
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
                                        <tbody id="tbodyEmbosingData">
                                          
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

Display_Embosing_Data();

function Display_Embosing_Data(){
    var url = '../action/action_embosing.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Embosing_Data'},
      success: function (data) {
            $('#tbodyEmbosingData').html(data);
      }
    });    
}
    
    $(document).on('keyup','#EmbosingName',function(){
        let EmbosingName = $('#EmbosingName').val();
        if(EmbosingName != ""){
          $('#MSG_EmbosingName').empty();
        }else{
          $('#MSG_EmbosingName').text("Embosing Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#EmbosingRate',function(){
        let EmbosingRate = $('#EmbosingRate').val();
        if(EmbosingRate != ""){
          $('#MSG_EmbosingRate').empty();
        }else{
          $('#MSG_EmbosingRate').text("Embosing Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnEmbosingSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_embosing.php';
    if($('#EmbosingName').val() != "" && $('#EmbosingRate').val() != ""){
          var formData = {
            'EmbosingName'  : $('#EmbosingName').val(),
            'EmbosingRate'  : $('#EmbosingRate').val(),
            'action'        : "Insert_Embosing_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateEmbosing')[0].reset();
          }
        });
    }else{
        if($('#EmbosingName').val() == ""){
          $('#MSG_EmbosingName').text("Embosing Name Is Mandatory..").css("color", "red");
        }
        if($('#EmbosingRate').val() == ""){
          $('#MSG_EmbosingRate').text("Embosing Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_embosing.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'embosing_id' : $(this).closest('tr').find('#embosing_id').text(),
          'action'      : "Delete_Embosing_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_embosing.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Embosing_Data();
      }
    });
    
});

</script>
   