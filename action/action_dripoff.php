<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_DripOff_Data"){
    		$DripOffName   = $_POST['DripOffName'];
    		$DripOffRate  = $_POST['DripOffRate'];
    	   	$sql = 'insert into drip_off(drip_off_name,drip_off_rate)values("'.$DripOffName.'","'.$DripOffRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Drip Off Created Successfully..";
    		}else{
    			echo "Drip Off Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_DripOff_Data"){

            $sql = 'SELECT * FROM `drip_off`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["drip_off_name"].'</td>
                        <td>'.$row["drip_off_rate"].'</td>
                        <td id="drip_off_id" style="display:none;">'.$row["drip_off_id"].'</td>
                        <td>
                            <i class="fa fa-trash clsDelete" aria-hidden="true" style="cursor:pointer;"></i> &nbsp;&nbsp;
                            <i class="fa fa-edit clsEdit" aria-hidden="true" style="cursor:pointer;"></i>
                        </td>
                        </tr>
                        ';   
                        $SrNo = $SrNo+1;
                    }
                echo $html;
        	}
    	}
    	    	
    	if($_POST['action'] == "Delete_DripOff_Data"){
    	    $sql = 'delete FROM `drip_off` where drip_off_id="'.$_POST["drip_off_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Drip Off Deleted Successfully"; 
            }else{
                echo "Error In Drip Off Delete"; 
            }
                
    	}
    }	
?>