<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Embosing_Data"){
    		$EmbosingName   = $_POST['EmbosingName'];
    		$EmbosingRate  = $_POST['EmbosingRate'];
    	   	$sql = 'insert into embosing(embosing_name,embosing_rate)values("'.$EmbosingName.'","'.$EmbosingRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Embosing Created Successfully..";
    		}else{
    			echo "Embosing Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Embosing_Data"){

            $sql = 'SELECT * FROM `embosing`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["embosing_name"].'</td>
                        <td>'.$row["embosing_rate"].'</td>
                        <td id="embosing_id" style="display:none;">'.$row["embosing_id"].'</td>
                        <td id="IDCountry">
                            <i class="fa fa-trash clsDelete" aria-hidden="true" style="cursor:pointer;"></i> &nbsp;&nbsp;
                           
                        </td>
                        </tr>
                        ';   
                        $SrNo = $SrNo+1;
                    }
                echo $html;
        	}
    	}
    	
    	if($_POST['action'] == "Delete_Embosing_Data"){
    	    $sql = 'delete FROM `embosing` where embosing_id="'.$_POST["embosing_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Embosing Deleted Successfully"; 
            }else{
                echo "Error In Embosing Delete"; 
            }
                
    	}
    }	
?>