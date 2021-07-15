
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
                                        <strong>Create</strong> Party
                                    </div>
                                    <div class="card-body card-block">
                                        <form  id="CreateParty" name="CreateParty" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Party Name<span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="PartyName" name="PartyName" autocomplete="off"  placeholder="Enter Party Name..." class="form-control clsStyle">
                                                     <span class="help-block" id="MSG_PartyName" style="font-size:12px;font-family:arial;"></span> 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label clsStyle">Mobile No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="PartyMobileNo" name="PartyMobileNo" placeholder="Enter Mobile No..." class="form-control clsStyle">
                                                    <!-- <span class="help-block">Please enter your password</span> -->
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Email Id</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  type="email" id="PartyEmailId" name="PartyEmailId" placeholder="Enter Email Id..." class="form-control clsStyle">
                                                    <!-- <span class="help-block">Please enter your password</span> -->
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control clsStyle" id="PartyAddress" name="PartyAddress" rows="3"></textarea>
                                                    <!-- <span class="help-block">Please enter your password</span> -->
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label class="clsStyle">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="PartyState" id="PartyState" class="form-control clsStyle">
                                            <!--<select class="form-control" id="PartyState">-->
                                            <!--<option>Select</option>-->
                                            <!--<option>2</option>-->
                                            <!--<option>3</option>-->
                                            <!--<option>4</option>-->
                                            <!--<option>5</option>-->
                                            <!--</select>-->
                                            </div>
                                            </div>

                                            <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label class="clsStyle">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="PartyCity" id="PartyCity" class="form-control clsStyle">
                                            <!--<select class="form-control" id="PartyCity">-->
                                            <!--<option>Select</option>-->
                                            <!--<option>2</option>-->
                                            <!--<option>3</option>-->
                                            <!--<option>4</option>-->
                                            <!--<option>5</option>-->
                                            <!--</select>-->
                                            </div>
                                            </div>

                                        
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="BtnPartySubmit">
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
</div>
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
                                                <th>Party Name</th>
                                                <th>Mobile No</th>
                                                <th>Email id</th>
                                                <th>Address</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyPartyData">

                                          
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
            
    var url = '../action/action_party.php';
    $.ajax({
      type: 'POST',
      url: url,
      data:{action:'Display_Party_Data'},
      success: function (data) {
            $('#tbodyPartyData').html(data);
      }
    });       
            
            
    $(document).on('keyup','#PartyName',function(){
        let PartyName = $('#PartyName').val();
        if(PartyName != ""){
          $('#MSG_PartyName').empty();
        }else{
          $('#MSG_PartyName').text("Party Name Is Mandatory..").css("color", "red");
        }
    });

// Save Contact Details In Database
$('#BtnPartySubmit').click(function (e) {
    e.preventDefault();
    var url = '../action/action_party.php';
   // if($('#CompanyName').val() != "" && $('#State').val() != "" && $('#PinCode').val() != "" && $('#State').val() !="" && $('#City').val() != "" && $('#RefferedBy').val() != "" && $('#Group').val() != "" && $('#Industry').val() != ""){
      if($('#PartyName').val() != ""){
      var formData = {
          'PartyName'     : $('#PartyName').val(),
          'PartyMobileNo' : $('#PartyMobileNo').val(),
          'PartyEmailId'  : $('#PartyEmailId').val(),
          'PartyAddress'  : $('#PartyAddress').val(),
          'PartyState'    : $('#PartyState').val(),
          'PartyCity'     : $('#PartyCity').val(),
          'action'        : "Insert_Party_Data"
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateParty')[0].reset();
            // $(".modal").modal('hide');
          }
      });
    }else{
        if($('#PartyName').val() == ""){
          $('#MSG_PartyName').text("Party Name Is Mandatory..").css("color", "red");
        }

        // // if($('#Email').val() == ""){
        // //   $('#MSG_Email').text("Email Is Mandatory..").css("color", "red");
        // // }

        // if($('#PinCode').val() == ""){
        //   $('#MSG_PinCode').text("PinCode Is Mandatory..").css("color", "red");
        // }

        // // if($('#GSTNumber').val() == ""){
        // //   $('#MSG_GSTNumber').text("GST Number Is Mandatory..").css("color", "red");
        // // }  
        
        // if($('#State').val() == ""){
        //     $('#MSG_State').text("State Is Mandatory..").css("color", "red");
        // }
        // if($('#City').val() == ""){
        //     $('#MSG_City').text("City Name Is Mandatory..").css("color", "red");
        // } 
        // if($('#RefferedBy').val() == ""){
        //     $('#MSG_RefferedBy').text("RefferedBy Is Mandatory..").css("color", "red");
        // }
        
        // if($('#Group').val() == ""){
        //     $('#MSG_Group').text("Group Is Mandatory..").css("color", "red");
        // }
        
        // if($('#Industry').val() == ""){
        //     $('#MSG_Industry').text("Industry Is Mandatory..").css("color", "red");
        // }
        
    }
});



$('#BtnView').click(function(){
    window.location.href="master_party.php?action=View";
});
</script>
            
   