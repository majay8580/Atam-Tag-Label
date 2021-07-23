
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
                                        <strong>Create</strong> Printing 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreatePrinting" name="CreatePrinting" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Printing</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="text" name="IdPrinting" id="IdPrinting" class="form-control clsStyle" placeholder="Enter Printing Name">
                                                   <span id="MSG_IdPrinting" class="clsStyle"></span>  
                                                </div>
                                            </div>   
                                                
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Printing Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="IdPrintingRate" name="PrintingRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                                    <span id="MSG_IdPrintingRate" class="clsStyle"></span> 
                                                </div>
                                            </div> 
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnPrintingSubmit">
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
                                        <tbody id="tbodyPrintingData">
                                          
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

Display_Printing_Data();
function Display_Printing_Data(){            
    var url = '../action/action_printing.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Printing_Data'},
      success: function (data) {
            $('#tbodyPrintingData').html(data);
      }
    }); 
}
    
    $(document).on('keyup','#IdPrinting',function(){
        let Printing = $('#IdPrinting').val();
        if(Printing != ""){
          $('#MSG_IdPrinting').empty();
        }else{
          $('#MSG_IdPrinting').text("Printing Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#IdPrintingRate',function(){
        let PrintingRate = $('#IdPrintingRate').val();
        if(IdPrintingRate != ""){
          $('#MSG_IdPrintingRate').empty();
        }else{
          $('#MSG_IdPrintingRate').text("Height Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnPrintingSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_printing.php';
    if($('#IdPrinting').val() != "" && $('#IdPrintingRate').val() != ""){
          var formData = {
            'PrintingName'   : $('#IdPrinting').val(),
            'PrintingRate'   : $('#IdPrintingRate').val(),
            'action'         : "Insert_Printing_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreatePrinting')[0].reset();
          }
        });
    }else{
        if($('#IdPrinting').val() == ""){
          $('#MSG_IdPrinting').text("Printing Is Mandatory..").css("color", "red");
        }
        if($('#IdPrintingRate').val() == ""){
          $('#MSG_IdPrintingRate').text("Printing Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_printing.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'printing_Id' : $(this).closest('tr').find('#printing_Id').text(),
          'action'      : "Delete_Printing_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_printing.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Printing_Data();
      }
    });
    
});
</script>
   