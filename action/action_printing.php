<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Printing_Data"){
    		$PrintingName   = $_POST['PrintingName'];
    		$PrintingRate   = $_POST['PrintingRate'];
    	   	$sql = 'insert into printing(printing_name,printing_rate)values("'.$PrintingName.'","'.$PrintingRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Printing Created Successfully..";
    		}else{
    			echo "Printing Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Printing_Data"){

            $sql = 'SELECT * FROM `printing`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["printing_name"].'</td>
                        <td>'.$row["printing_rate"].'</td>
                        <td id="printing_Id" style="display:none;">'.$row["printing_Id"].'</td>
                        <td>
                            <i class="fa fa-trash clsDelete" aria-hidden="true" style="cursor:pointer;"></i> &nbsp;&nbsp;
                        </td>
                        </tr>
                        ';   
                        $SrNo = $SrNo+1;
                    }
                echo $html;
        	}
    	}
    	
    	if($_POST['action'] == "Delete_Printing_Data"){
    	    $sql = 'delete FROM `printing` where printing_Id="'.$_POST["printing_Id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Printing Deleted Successfully"; 
            }else{
                echo "Error In Printing Delete"; 
            }
                
    	}
    }	
?>