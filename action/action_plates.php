<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Plates_Data"){
    		$PlatesName     = $_POST['PlatesName'];
    		$PlatesRate     = $_POST['PlatesRate'];
    	   	$sql = 'insert into plates(plate_name,plate_rate)values("'.$PlatesName.'","'.$PlatesRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Plate Created Successfully..";
    		}else{
    			echo "Plate Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Plates_Data"){

            $sql = 'SELECT * FROM `plates`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["plate_name"].'</td>
                        <td>'.$row["plate_rate"].'</td>
                        <td id="plate_id" style="display:none;">'.$row["plate_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Plates_Data"){
    	    $sql = 'delete FROM `plates` where plate_id="'.$_POST["plate_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Plate Deleted Successfully"; 
            }else{
                echo "Error In Plate Delete"; 
            }
                
    	}
    }	
?>