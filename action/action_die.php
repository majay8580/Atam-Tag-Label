<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Die_Data"){
    		$DieName  = $_POST['DieName'];
    		$DieRate  = $_POST['DieRate'];
    	   	$sql = 'insert into die(die_name,die_rate)values("'.$DieName.'","'.$DieRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Die Created Successfully..";
    		}else{
    			echo "Die Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Die_Data"){

            $sql = 'SELECT * FROM `die`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["die_name"].'</td>
                        <td>'.$row["die_rate"].'</td>
                        <td id="die_id" style="display:none;">'.$row["die_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Die_Data"){
    	    $sql = 'delete FROM `die` where die_id="'.$_POST["die_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Die Deleted Successfully"; 
            }else{
                echo "Error In Die Delete"; 
            }
                
    	}
    }	
?>