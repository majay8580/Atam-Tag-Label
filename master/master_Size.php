
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
                                        <strong>Create</strong> Size 
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="CreateSize" name="CreateSize" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label class=" form-control-label clsStyle">Size</label>
                                                </div>
                                                <div class="col-12 col-md-10">
                                                <div class="row">

                                               <div class="col-6 col-md-6">
                                               <input type="number" id="SizeWidth" name="SizeWidth" autocomplete="off"  placeholder="Enter Width..." class="form-control clsStyle">
                                                <span id="MSG_SizeWidth" class="clsStyle"></span>
                                               </div>

                                               <div class="col-6 col-md-6">
                                               <input type="number" id="SizeHeight" name="SizeHeight" autocomplete="off"  placeholder="Enter Height..." class="form-control clsStyle">
                                               <span id="MSG_SizeHeight class="clsStyle"></span>
                                               </div>
</div>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnSizeSubmit">
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
                                                <th>Width</th>
                                                <th>Height</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodySizeData">
                                          
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
            
    var url = '../action/action_size.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Size_Data'},
      success: function (data) {
            $('#tbodySizeData').html(data);
      }
    });    
    
    $(document).on('keyup','#SizeWidth',function(){
        let SizeWidth = $('#SizeWidth').val();
        if(SizeWidth != ""){
          $('#MSG_SizeWidth').empty();
        }else{
          $('#MSG_SizeWidth').text("Width Is Mandatory....").css("color", "red");
        }
    });
    
    $(document).on('keyup','#SizeHeight',function(){
        let SizeHeight = $('#SizeHeight').val();
        if(SizeHeight != ""){
          $('#MSG_SizeHeight').empty();
        }else{
          $('#MSG_SizeHeight').text("Height Is Mandatory....").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnSizeSubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_size.php';
    if($('#SizeWidth').val() != "" && $('#SizeHeight').val() != ""){
          var formData = {
            'SizeWidth'     : $('#SizeWidth').val(),
            'SizeHeight'    : $('#SizeHeight').val(),
            'action'        : "Insert_Size_Data"
         };
        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateSize')[0].reset();
          }
        });
    }else{
        if($('#SizeWidth').val() == ""){
          $('#MSG_SizeWidth').text("Width Is Mandatory..").css("color", "red");
        }
        if($('#SizeHeight').val() == ""){
          $('#MSG_SizeHeight').text("Height Is Mandatory..").css("color", "red");
        }
        
    }
});

$('#BtnView').click(function(){
    window.location.href="master_Size.php?action=View";
});
</script>
   