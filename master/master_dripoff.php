
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
                                        <strong>Create</strong> Drip Off 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateDripOff" name="CreateDripOff" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Drip Off</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="DripOffName" name="DripOffName" autocomplete="off"  placeholder="Enter Drip Off Name..." class="form-control clsStyle">
                                                    <span id="MSG_DripOffName" class="clsStyle"></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="DripOffRate" name="DripOffRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_DripOffRate" class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnDripOffSubmit">
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
                                        <tbody id="tbodyDripOffData">
                                          
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
Display_Dripoff_Data();
function Display_Dripoff_Data(){
    var url = '../action/action_dripoff.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_DripOff_Data'},
      success: function (data) {
            $('#tbodyDripOffData').html(data);
      }
    });    
}
    
    $(document).on('keyup','#DripOffName',function(){
        let DripOffName = $('#DripOffName').val();
        if(DripOffName != ""){
          $('#MSG_DripOffName').empty();
        }else{
          $('#MSG_DripOffName').text("Drip Off Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#DripOffRate',function(){
        let DripOffRate = $('#DripOffRate').val();
        if(DripOffRate != ""){
          $('#MSG_DripOffRate').empty();
        }else{
          $('#MSG_DripOffRate').text("Drip Off Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnDripOffSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_dripoff.php';
    if($('#DripOffName').val() != "" && $('#DripOffRate').val() != ""){
          var formData = {
            'DripOffName'    : $('#DripOffName').val(),
            'DripOffRate'    : $('#DripOffRate').val(),
            'action'         : "Insert_DripOff_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateDripOff')[0].reset();
          }
        });
    }else{
        if($('#DripOffName').val() == ""){
          $('#MSG_DripOffName').text("Drip Off Name Is Mandatory..").css("color", "red");
        }
        if($('#DripOffRate').val() == ""){
          $('#MSG_DripOffRate').text("Drip Off Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_dripoff.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'drip_off_id' : $(this).closest('tr').find('#drip_off_id').text(),
          'action'      : "Delete_DripOff_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_dripoff.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Dripoff_Data();
      }
    });
});
</script>
   