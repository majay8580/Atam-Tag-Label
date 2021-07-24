
        <!-- HEADER DESKTOP-->
        <?php
            // include('../header/header.php');
            $output ='';
           // $action = '';
            //echo '<script> alert("Hello")</script>';
        
            $output = '<div class="container createform">';
            $output .= '<div class="table-responsive m-b-40">
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
                                </div>';


$output .= '</div>';



    //  include('../footer/footer.php');


    $output .= '       
    <script type="text/javascript">
    
        Display_Party_Data();
        function Display_Party_Data(){  
            var url = "../action/action_party.php";
            $.ajax({
              type: "POST",
              url: url,
              data:{action:"Display_Party_Data"},
              success: function (data) {
                    $("#tbodyPartyData").html(data);
              }
            });       
        }
                
                
        $(document).on("keyup","#PartyName",function(){
            let PartyName = $("#PartyName").val();
            if(PartyName != ""){
              $("#MSG_PartyName").empty();
            }else{
              $("#MSG_PartyName").text("Party Name Is Mandatory..").css("color", "red");
            }
        });
    
    // Save Contact Details In Database
    $("#BtnPartySubmit").click(function (e) {
        e.preventDefault();
        var url = "../action/action_party.php";
        // if($("#CompanyName").val() != "" && $("#State").val() != "" && $("#PinCode").val() != "" && $("#State").val() !="" && $("#City").val() != "" && $("#RefferedBy").val() != "" && $("#Group").val() != "" && $("#Industry").val() != ""){
          if($("#PartyName").val() != ""){
          var formData = {
              "PartyName"     : $("#PartyName").val(),
              "PartyMobileNo" : $("#PartyMobileNo").val(),
              "PartyEmailId"  : $("#PartyEmailId").val(),
              "PartyAddress"  : $("#PartyAddress").val(),
              "PartyState"    : $("#PartyState").val(),
              "PartyCity"     : $("#PartyCity").val(),
              "action"        : "Insert_Party_Data"
          };
          $.ajax({
              type: "POST",
              url: url,
              data: formData,
              success: function (data) {
                alert(data);
                $("#CreateParty")[0].reset();
                // $(".modal").modal("hide");
              }
          });
        }else{
            if($("#PartyName").val() == ""){
              $("#MSG_PartyName").text("Party Name Is Mandatory..").css("color", "red");
            }
    
            // // if($("#Email").val() == ""){
            // //   $("#MSG_Email").text("Email Is Mandatory..").css("color", "red");
            // // }
    
            // if($("#PinCode").val() == ""){
            //   $("#MSG_PinCode").text("PinCode Is Mandatory..").css("color", "red");
            // }
    
            // // if($("#GSTNumber").val() == ""){
            // //   $("#MSG_GSTNumber").text("GST Number Is Mandatory..").css("color", "red");
            // // }  
            
            // if($("#State").val() == ""){
            //     $("#MSG_State").text("State Is Mandatory..").css("color", "red");
            // }
            // if($("#City").val() == ""){
            //     $("#MSG_City").text("City Name Is Mandatory..").css("color", "red");
            // } 
            // if($("#RefferedBy").val() == ""){
            //     $("#MSG_RefferedBy").text("RefferedBy Is Mandatory..").css("color", "red");
            // }
            
            // if($("#Group").val() == ""){
            //     $("#MSG_Group").text("Group Is Mandatory..").css("color", "red");
            // }
            
            // if($("#Industry").val() == ""){
            //     $("#MSG_Industry").text("Industry Is Mandatory..").css("color", "red");
            // }
            
        }
    });
    
    
    
    $("#BtnView").click(function(){
        window.location.href="master_party.php?action=View";
    });
    
    
    $(document).on("click",".clsDelete",function(){
        var formData = {
              "accountInsertId" : $(this).closest("tr").find("#accountInsertId").text(),
              "action"          : "Delete_Party_Data"
          };
        $.ajax({
          type: "POST",
          url:"../action/action_party.php",
          data: formData,
          success: function (data) {
            alert(data);
            Display_Party_Data();
          }
        });
        
    });
    </script>';
    
    echo $output;
?>
            
   