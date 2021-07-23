
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
                                        <strong>Create</strong> Plates 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreatePlates" name="CreatePlates" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Plates</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="PlatesName" name="PlatesName" autocomplete="off"  placeholder="Enter Plate Name..." class="form-control clsStyle">
                                                    <span id="MSG_PlatesName" class="clsStyle"></span>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="PlatesRate" name="PlatesRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_PlatesRate" class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnPlatesSubmit">
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
                                        <tbody id="tbodyPlatesData">
                                          
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
Display_Plates_Data();    
function Display_Plates_Data(){
    var url = '../action/action_plates.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Plates_Data'},
      success: function (data) {
            $('#tbodyPlatesData').html(data);
      }
    }); 
}
    
    $(document).on('keyup','#PlatesName',function(){
        let PlatesName = $('#PlatesName').val();
        if(PlatesName != ""){
          $('#MSG_PlatesName').empty();
        }else{
          $('#MSG_PlatesName').text("Plate Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#PlatesRate',function(){
        let PlatesRate = $('#PlatesRate').val();
        if(PlatesRate != ""){
          $('#MSG_PlatesRate').empty();
        }else{
          $('#MSG_PlatesRate').text("Plate Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnPlatesSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_plates.php';
    if($('#PlatesName').val() != "" && $('#PlatesRate').val() != ""){
          var formData = {
            'PlatesName'    : $('#PlatesName').val(),
            'PlatesRate'    : $('#PlatesRate').val(),
            'action'        : "Insert_Plates_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreatePlates')[0].reset();
          }
        });
    }else{
        if($('#PlatesName').val() == ""){
          $('#MSG_PlatesName').text("Plate Name Is Mandatory..").css("color", "red");
        }
        if($('#PlatesRate').val() == ""){
          $('#MSG_PlatesRate').text("Plate Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_plates.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'plate_id' : $(this).closest('tr').find('#plate_id').text(),
          'action'   : "Delete_Plates_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_plates.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Plates_Data();
      }
    });
});

</script>
   