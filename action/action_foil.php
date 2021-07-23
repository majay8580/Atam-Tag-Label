<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Foil_Data"){
    		$FoilName   = $_POST['FoilName'];
    		$FoilRate   = $_POST['FoilRate'];
    	   	$sql = 'insert into foil(foil_name,foil_rate)values("'.$FoilName.'","'.$FoilRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Foil Created Successfully..";
    		}else{
    			echo "Foil Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Foil_Data"){

            $sql = 'SELECT * FROM `foil`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["foil_name"].'</td>
                        <td>'.$row["foil_rate"].'</td>
                        <td id="foil_id" style="display:none;">'.$row["foil_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Foil_Data"){
    	    $sql = 'delete FROM `foil` where foil_id="'.$_POST["foil_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Foil Deleted Successfully"; 
            }else{
                echo "Error In Foil Delete"; 
            }
                
    	}
    }	
?>