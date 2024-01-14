<?php

$nic_variable = $_POST['nic'];
$password_variable = $_POST['pass'];

$con=mysqli_connect("localhost","root","","backend");
if(!$con){

    echo "connection error";
    die($con);
}

$res = mysqli_query($con, "SELECT * FROM user_cred WHERE nic='$nic_variable' AND password='$password_variable'");

$b=false;
while ($row=mysqli_fetch_array($res)) {


    $b=true;

}

if($b) {
    header("location:index.php");
} 

else{

    echo "<script>";
    echo "alert('wrong user');";
   echo  "window.location='login.html';";

    echo "</script>";
    
}
?>