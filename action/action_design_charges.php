<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Design_Data"){
    		$DesignName     = $_POST['DesignName'];
    		$DesignRate     = $_POST['DesignRate'];
    	   	$sql = 'insert into design_charges(design_name,design_rate)values("'.$DesignName.'","'.$DesignRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Design Created Successfully..";
    		}else{
    			echo "Design Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Design_Data"){
            $sql = 'SELECT * FROM `design_charges`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["design_name"].'</td>
                        <td>'.$row["design_rate"].'</td>
                        <td id="design_id" style="display:none;">'.$row["design_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Design_Data"){
    	    $sql = 'delete FROM `design_charges` where design_id="'.$_POST["design_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Design Charges Deleted Successfully"; 
            }else{
                echo "Error In Design Charges Delete"; 
            }
                
    	}
    }	
?>