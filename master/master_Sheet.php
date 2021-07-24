
        <!-- HEADER DESKTOP-->
        <?php
            // include('../header/header.php');
            $output ='';
           // $action = '';
            //echo '<script> alert("Hello")</script>';
            if(!empty($_POST['action'])){
                 $action = $_POST['action'];
            }
            else{
                 	$action = "Create"; 
            } 
        
            $output = '<div class="container createform">';
        
        if($action == "Create"){
        
                   
                   
          $output .= '<div class="row">
                       <div class="col-lg-2">
                    </div>
               <div class="col-lg-8">
               <div class="card">
                                    <div class="card-header">
                                        <strong>Create</strong> Sheet 
                                    </div>
                                    <div class="card-body card-block">
                                        <form  id="CreateSheet" name="CreateSheet" method="post" class="form-horizontal" autocomplete="off">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label clsStyle">Sheet Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="SheetName" name="SheetName" autocomplete="off"  placeholder="Enter Sheet Name..." class="form-control clsStyle">
                                                    <span id="MSG_SheetName" class="clsStyle"></span>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label clsStyle">Sheet Rate</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="SheetRate" name="SheetRate" placeholder="Enter Sheet Rate..." class="form-control clsStyle">
                                                    <span id="MSG_SheetRate" class="clsStyle"></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div align="right" class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" id="BtnSheetSubmit">
                                          Save
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" id="view_master_sheet">
                                             View
                                        </button>
                                         
                                    </div>
                                      </form>

                                </div>
                                <div class="col-lg-2">
</div>
</div>
</div>';

}
if($action == "View"){
    


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

}


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

$(document).on("click",".clsDelete",function(){
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
            
   