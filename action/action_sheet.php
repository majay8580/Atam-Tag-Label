<?php
session_start();

include '../dbConfig/database.php';
    $SrNo = 1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Sheet_Data"){
    		$SheetName  = $_POST['SheetName'];
    		$SheetRate  = $_POST['SheetRate'];
    	   	$sql = 'insert into sheet(sheet_name,sheet_rate)values("'.$SheetName.'","'.$SheetRate.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Sheet Created Successfully..";
    		}else{
    			echo "Sheet Is Already Created..";
    		}
    	}
    	
    	
    	if($_POST['action'] == "Display_Sheet_Data"){

            $sql = 'SELECT * FROM `sheet`';
            if($result = mysqli_query($conn,$sql)){
                    //create an array
                   // $CompanyArray = array();
                    while($row =mysqli_fetch_assoc($result))
                    {  
                        
                        
                        $html .='
                        <tr>
                        <td>'.$SrNo.'</td>
                        <td style="width:20%;">'.$row["sheet_name"].'</td>
                        <td>'.$row["sheet_rate"].'</td>
                        <td>Edit/Delete</td>
                        </tr>
                        ';   
                        $SrNo = $SrNo+1;
                    }
                echo $html;
        	}
    	}
    }	
?>