<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_LabourCharges_Data"){
    		$LabourChargesName  = $_POST['LabourChargesName'];
    		$LabourChargesRate  = $_POST['LabourChargesRate'];
    	   	$sql = 'insert into labour_charges(labour_charges_name,labour_charges_rate)values("'.$LabourChargesName.'","'.$LabourChargesRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Labour Charges Created Successfully..";
    		}else{
    			echo "Labour Charges Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_LabourCharges_Data"){

            $sql = 'SELECT * FROM `labour_charges`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["labour_charges_name"].'</td>
                        <td>'.$row["labour_charges_rate"].'</td>
                        <td id="labour_charges_Id" style="display:none;">'.$row["labour_charges_Id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_LabourCharges_Data"){
    	    $sql = 'delete FROM `labour_charges` where labour_charges_Id="'.$_POST["labour_charges_Id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Labour Charges Deleted Successfully"; 
            }else{
                echo "Error In Labour Charges Delete"; 
            }
                
    	}
    }	
?>