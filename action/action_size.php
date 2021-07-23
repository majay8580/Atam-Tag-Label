<?php
session_start();

include '../dbConfig/database.php';
$SrNo =1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Size_Data"){
    		$Width   = $_POST['SizeWidth'];
    		$Height  = $_POST['SizeHeight'];
    	   	$sql = 'insert into size(size_height,size_width)values("'.$Height.'","'.$Width.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Size Created Successfully..";
    		}else{
    			echo "Size Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Size_Data"){

            $sql = 'SELECT * FROM `size`';
            if($result = mysqli_query($conn,$sql)){
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["size_height"].'</td>
                        <td>'.$row["size_width"].'</td>
                        <td id="size_id" style="display:none;">'.$row["size_id"].'</td>
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
    	
    	if($_POST['action'] == "Delete_SheetSize_Data"){
    	    $sql = 'delete FROM `size` where size_id="'.$_POST["size_id"].'";';
            if(mysqli_query($conn,$sql)){
               echo "Size Deleted Successfully"; 
            }else{
                echo "Error In Size Delete"; 
            }
                
    	}
    }	
?>