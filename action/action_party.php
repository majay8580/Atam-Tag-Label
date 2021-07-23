<?php
session_start();

include '../dbConfig/database.php';
$SrNo = 1;
    if(isset($_POST['action'])){
    	//Insert Company Data In Sql Start 
    	if($_POST['action'] == "Insert_Party_Data"){
    	    
    		$PartyName      = $_POST['PartyName'];
    		$PartyMobileNo  = $_POST['PartyMobileNo'];
    		$PartyEmailId   = $_POST['PartyEmailId'];
    		$PartyAddress   = $_POST['PartyAddress'];
    		$PartyState     = $_POST['PartyState'];
    		$PartyCity      = $_POST['PartyCity'];
    
    	   	$sql = 'insert into accounts(account_name,emailId,phone_no,state,city,address)values("'.$PartyName.'","'.$PartyEmailId.'","'.$PartyMobileNo .'","'.$PartyState .'","'.$PartyCity .'","'.$PartyAddress.'")';
    		if(mysqli_query($conn,$sql)){
    			echo "Party Created Successfully..";
    		}else{
    			echo "Party Is Already Created..";
    		}
    	}
    	
    	if($_POST['action'] == "Display_Party_Data"){

            $sql = 'SELECT * FROM `accounts`';
            if($result = mysqli_query($conn,$sql)){
                    //create an array
                   // $CompanyArray = array();
                    while($row =mysqli_fetch_assoc($result))
                    {    
                        $html .='
                        <tr id="row_'.$row["accountInsertId"].'">
                        <td id="IDCountry">'.$SrNo.'</td>
                        <td id="IDAddress" style="width:20%;">'.$row["account_name"].'</td>
                        <td id="IDCountry">'.$row["phone_no"].'</td>
                        <td id="IDCountry">'.$row["emailId"].'</td>
                        <td id="IDCountry">'.$row["state"].'</td>
                        <td id="IDCountry">'.$row["city"].'</td>
                        <td id="IDCountry">'.$row["address"].'</td>
                        <td id="accountInsertId" style="display:none;">'.$row["accountInsertId"].'</td>
                        <td id="IDCountry">
                            <i class="fa fa-trash clsDelete" aria-hidden="true" style="cursor:pointer;"></i> &nbsp;&nbsp;
                           
                        </td>
                        </tr>
                        ';   
                        $SrNo = $SrNo+1;
                         //<i class="fa fa-edit clsEdit" aria-hidden="true" style="cursor:pointer;"></i>
                    }
                echo $html;
        	}
    	}
    	
    	if($_POST['action'] == "Delete_Party_Data"){
    	    $sql = 'delete FROM `accounts` where accountInsertId="'.$_POST["accountInsertId"].'"';
            if(mysqli_query($conn,$sql)){
               echo "Party Deleted Successfully"; 
            }else{
                echo "Error In Party Delete"; 
            }
                
    	}
    	
    }	
?>