
<?php
session_start();

include 'dbConfig/database.php';
//Login Credential Check Here
//if($_POST['action'] == "Login"){
if(isset($_POST["login"])){
  $user     = $_POST['Username'];
  $password  = $_POST['Password'];
   $sql = 'select * from user where  username ="'.$user.'" AND password="'.$password.'"';
  if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
     //echo "Login Details Is Correct";
     $_SESSION['username'] = $data['username'];
   //   $_SESSION['email']    = $data['email'];
   //   $_SESSION['phone_no'] = $data['phone_no'];
     $_SESSION['id']       = $data['id'];
     header("Location: dashboard.php"); 
  }else{
     echo "Check Username & Password";
  }
}
//Login Credential End Here
   include('login.php');
?>