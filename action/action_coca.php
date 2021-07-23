<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Coca_Data"){
    		$CocaName   = $_POST['CocaName'];
    		$CocaRate   = $_POST['CocaRate'];
    	   	$sql = 'insert into coca(coca_name,coca_rate)values("'.$CocaName.'","'.$CocaRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Coca Created Successfully..";
    		}else{
    			echo "Coca Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Coca_Data"){

            $sql = 'SELECT * FROM `coca`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["coca_name"].'</td>
                        <td>'.$row["coca_rate"].'</td>
                        <td id="coca_id" style="display:none;">'.$row["coca_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_Coca_Data"){
    	    $sql = 'delete FROM `coca` where coca_id="'.$_POST["coca_id"].'";';
            if(mysqli_query($conn,$sql)){
               echo "Coca Deleted Successfully"; 
            }else{
                echo "Error In Coca Delete"; 
            }
                
    	}
    }	
?>