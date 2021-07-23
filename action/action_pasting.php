<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Pasting_Data"){
    		$PastingName    = $_POST['PastingName'];
    		$PastingRate    = $_POST['PastingRate'];
    	   	$sql = 'insert into pasting(pasting_name,pasting_rate)values("'.$PastingName.'","'.$PastingRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Pasting  Created Successfully..";
    		}else{
    			echo "Pasting Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Pasting_Data"){

            $sql = 'SELECT * FROM `pasting`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["pasting_name"].'</td>
                        <td>'.$row["pasting_rate"].'</td>
                        <td id="pasting_id" style="display:none;">'.$row["pasting_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Pasting_Data"){
    	    $sql = 'delete FROM `pasting` where pasting_id="'.$_POST["pasting_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Pasting Deleted Successfully"; 
            }else{
                echo "Error In Pasting Delete"; 
            }
    	}
    }	
?>