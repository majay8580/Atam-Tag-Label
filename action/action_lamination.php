<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Lamination_Data"){
    		$LaminationName   = $_POST['LaminationName'];
    		$LaminationRate  = $_POST['LaminationRate'];
    	   	$sql = 'insert into lamination(lamination_name,lamination_rate)values("'.$LaminationName.'","'.$LaminationRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Lamination Created Successfully..";
    		}else{
    			echo "Lamination Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Lamination_Data"){

            $sql = 'SELECT * FROM `lamination`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["lamination_name"].'</td>
                        <td>'.$row["lamination_rate"].'</td>
                        <td id="lamination_id" style="display:none;">'.$row["lamination_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Lamination_Data"){
    	    $sql = 'delete FROM `lamination` where lamination_id="'.$_POST["lamination_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Lamination Deleted Successfully"; 
            }else{
                echo "Error In Lamination Delete"; 
            }
                
    	}
    }	
?>