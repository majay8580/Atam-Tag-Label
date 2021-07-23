<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_DieCutting_Data"){
    		$DieCuttingName   = $_POST['DieCuttingName'];
    		$DieCuttingRate  = $_POST['DieCuttingRate'];
    	   	$sql = 'insert into die_cutting(die_cutting_name,die_cutting_rate)values("'.$DieCuttingName.'","'.$DieCuttingRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Die Cutting Created Successfully..";
    		}else{
    			echo "Die Cutting Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_DieCutting_Data"){

            $sql = 'SELECT * FROM `die_cutting`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["die_cutting_name"].'</td>
                        <td>'.$row["die_cutting_rate"].'</td>
                        <td id="die_cutting_Id" style="display:none;">'.$row["die_cutting_Id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_DieCutting_Data"){
    	    $sql = 'delete FROM `die_cutting` where die_cutting_Id="'.$_POST["die_cutting_Id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Die Cutting Deleted Successfully"; 
            }else{
                echo "Error In Die Cutting Delete"; 
            }
                
    	}
    }	
?>