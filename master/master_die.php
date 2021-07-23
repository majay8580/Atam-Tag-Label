
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
                                        <strong>Create</strong> Die 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateDie" name="CreateDie" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Die</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" id="DieName" name="DieName" autocomplete="off"  placeholder="Enter Die Name..." class="form-control clsStyle">
                                                    <span id="MSG_DieName" class="clsStyle"></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="number" id="DieRate" name="DieRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                      <span id="MSG_DieRate" class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnDieSubmit">
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
                                        <tbody id="tbodyDieData">
                                          
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
Display_Die_Data();
function Display_Die_Data(){
    var url = '../action/action_die.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Die_Data'},
      success: function (data) {
            $('#tbodyDieData').html(data);
      }
    });  
}
    
    $(document).on('keyup','#DieName',function(){
        let DieName = $('#DieName').val();
        if(DieName != ""){
          $('#MSG_DieName').empty();
        }else{
          $('#MSG_DieName').text("Die Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#DieRate',function(){
        let DieRate = $('#DieRate').val();
        if(DieRate != ""){
          $('#MSG_DieRate').empty();
        }else{
          $('#MSG_DieRate').text("Die Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnDieSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_die.php';
    if($('#DieName').val() != "" && $('#DieRate').val() != ""){
          var formData = {
            'DieName'     : $('#DieName').val(),
            'DieRate'    : $('#DieRate').val(),
            'action'        : "Insert_Die_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateDie')[0].reset();
          }
        });
    }else{
        if($('#DieName').val() == ""){
          $('#MSG_DieName').text("Die Name Is Mandatory..").css("color", "red");
        }
        if($('#DieRate').val() == ""){
          $('#MSG_DieRate').text("Die Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_die.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'die_id'   : $(this).closest('tr').find('#die_id').text(),
          'action'   : "Delete_Die_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_die.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Die_Data();
      }
    });
    
});

</script>
   