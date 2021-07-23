<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_iLeats_Data"){
    		$iLeatsName  = $_POST['iLeatsName'];
    		$iLeatsRate  = $_POST['iLeatsRate'];
    	   	$sql = 'insert into ileats(ileats_name,ileats_rate)values("'.$iLeatsName.'","'.$iLeatsRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "iLeats Created Successfully..";
    		}else{
    			echo "iLeats Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_iLeats_Data"){

            $sql = 'SELECT * FROM `ileats`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["ileats_name"].'</td>
                        <td>'.$row["ileats_rate"].'</td>
                        <td id="ileats_Id" style="display:none;">'.$row["ileats_Id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_ileats_Data"){
    	    $sql = 'delete FROM `ileats` where ileats_Id="'.$_POST["ileats_Id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "iLeats Deleted Successfully"; 
            }else{
                echo "Error In iLeats Delete"; 
            }
                
    	}
    }	
?>