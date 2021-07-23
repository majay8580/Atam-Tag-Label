<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Dori_Data"){
    		$DoriName  = $_POST['DoriName'];
    		$DoriRate  = $_POST['DoriRate'];
    	   	$sql = 'insert into dori(dori_name,dori_rate)values("'.$DoriName.'","'.$DoriRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Dori Created Successfully..";
    		}else{
    			echo "Dori Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Dori_Data"){
            $sql = 'SELECT * FROM `dori`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["dori_name"].'</td>
                        <td>'.$row["dori_rate"].'</td>
                        <td id="dori_Id" style="display:none;">'.$row["dori_Id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Dori_Data"){
    	    $sql = 'delete FROM `dori` where dori_Id="'.$_POST["dori_Id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Dori Deleted Successfully"; 
            }else{
                echo "Error In Dori Delete"; 
            }
                
    	}
    	
    	
    	
    	
    	
    }	
?>