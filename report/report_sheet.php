
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
                                                <th style="width:50%;">Name</th>
                                                <th>Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodySheetData">

                                          
                                        </tbody>
                                    </table>
                                </div>';


$output .= '</div>';



                //  include('../footer/footer.php');
          
            
$output .= '     
<script type="text/javascript">

Display_Sheet_Data();
function Display_Sheet_Data(){     
    var url = "../action/action_sheet.php";
    $.ajax({
      type: "POST",
      url: url,
      data:{action:"Display_Sheet_Data"},
      success: function (data) {
            $("#tbodySheetData").html(data);
      }
    }); 
}
            
            
    $(document).on("keyup","#SheetName",function(){
        let SheetName = $("#SheetName").val();
        if(SheetName != ""){
          $("#MSG_SheetName").empty();
        }else{
          $("#MSG_SheetName").text("Sheet Name Is Mandatory..").css("color", "red");
        }
    });
    
    $(document).on("keyup","#SheetRate",function(){
        let SheetRate = $("#SheetRate").val();
        if(SheetRate != ""){
          $("#MSG_SheetRate").empty();
        }else{
          $("#MSG_SheetRate").text("Sheet Rate Is Mandatory..").css("color", "red");
        }
    });

// Save Contact Details In Database
$("#BtnSheetSubmit").click(function (e) {
    e.preventDefault();
    var url = "../action/action_sheet.php";
      if($("#SheetName").val() != "" && $("#SheetRate").val() != ""){
      var formData = {
          "SheetName"     : $("#SheetName").val(),
          "SheetRate"     : $("#SheetRate").val(),
          "action"        : "Insert_Sheet_Data"
      };
      $.ajax({
          type: "POST",
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            $("#CreateSheet")[0].reset();
            // $(".modal").modal("hide");
          }
      });
    }else{
        if($("#SheetName").val() == ""){
          $("#MSG_SheetName").text("Sheet Name Is Mandatory..").css("color", "red");
        }

        if($("#SheetRate").val() == ""){
          $("#MSG_SheetRate").text("Sheet Rate Is Mandatory..").css("color", "red");
        }
        
    }
});



$("#BtnView").click(function(e){
    e.preventDefault();
    window.location.href="master_Sheet.php?action=View";
});

$(document).on("click",".clsDeleteSheet",function(){
    var formData = {
          "sheet_id" : $(this).closest("tr").find("#sheet_id").text(),
          "action"   : "Delete_Sheet_Data"
      };
    $.ajax({
      type: "POST",
      url:"../action/action_sheet.php",
      data: formData,
      success: function (data) {
        alert(data);
        Display_Sheet_Data();
      }
    });
    
});
</script>';

echo $output;
?>
            
   