<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_UV_Data"){
    		$UVName   = $_POST['UVName'];
    		$UVRate  = $_POST['UVRate'];
    	   	$sql = 'insert into uv_coding(uv_coding_name,uv_coding_rate)values("'.$UVName.'","'.$UVRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "UV Created Successfully..";
    		}else{
    			echo "UV Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_UV_Data"){

            $sql = 'SELECT * FROM `uv_coding`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["uv_coding_name"].'</td>
                        <td>'.$row["uv_coding_rate"].'</td>
                        <td id="uv_coding_id" style="display:none;">'.$row["uv_coding_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_UV_Data"){
    	    $sql = 'delete FROM `uv_coding` where uv_coding_id="'.$_POST["uv_coding_id"].'"';
            if(mysqli_query($conn,$sql)){
               echo "UV Deleted Successfully"; 
            }else{
                echo "Error In UV Delete"; 
            }
                
    	}
    }	
?>