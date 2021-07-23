
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
                                        <strong>Create</strong> Coca 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateCoca" name="CreateCoca" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Coca Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="CocaName" name="CocaName" autocomplete="off"  placeholder="Enter Coca Name..." class="form-control clsStyle">
                                                    <span id="MSG_CocaName" class="clsStyle"></span>
                                               </div>  
                                            </div>   
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Coca Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="number" id="CocaRate" name="CocaRate" autocomplete="off"  placeholder="Enter Rate..." class="form-control clsStyle">
                                               <span id="MSG_CocaRate" class="clsStyle"></span>
                                               </div>  
                                            </div>  
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnCocaSubmit">
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
                                        <tbody id="tbodyCocaData">
                                          
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

    Display_Coca_Data();
    function Display_Coca_Data(){
        var url = '../action/action_coca.php';
        $.ajax({
          type: 'POST',
          url: url,
          data:{action:'Display_Coca_Data'},
          success: function (data) {
                $('#tbodyCocaData').html(data);
          }
        });  
    }
    
    $(document).on('keyup','#CocaName',function(){
        let CocaName = $('#CocaName').val();
        if(CocaName != ""){
          $('#MSG_CocaName').empty();
        }else{
          $('#MSG_CocaName').text("Coca Name Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#CocaRate',function(){
        let CocaRate = $('#CocaRate').val();
        if(CocaRate != ""){
          $('#MSG_CocaRate').empty();
        }else{
          $('#MSG_CocaRate').text("Coca Rate Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnCocaSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_coca.php';
    if($('#CocaName').val() != "" && $('#CocaRate').val() != ""){
          var formData = {
            'CocaName'     : $('#CocaName').val(),
            'CocaRate'    : $('#CocaRate').val(),
            'action'        : "Insert_Coca_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateCoca')[0].reset();
          }
        });
    }else{
        if($('#SizeWidth').val() == ""){
          $('#MSG_CocaName').text("Coca Name Is Mandatory..").css("color", "red");
        }
        if($('#CocaRate').val() == ""){
          $('#MSG_CocaRate').text("Coca Rate Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_coca.php?action=View";
});

$(document).on('click','.clsDelete',function(){
    var formData = {
          'coca_id' : $(this).closest('tr').find('#coca_id').text(),
          'action'  : "Delete_Coca_Data"
      };
    $.ajax({
      type: 'POST',
      url:'../action/action_coca.php',
      data: formData,
      success: function (data) {
        alert(data);
        Display_Coca_Data();
      }
    });
    
});


</script>
   