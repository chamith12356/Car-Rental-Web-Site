
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_variable = $_POST['name'];
    $email_variable = $_POST['email'];
    $PhoneNum_variable = $_POST['phonenum'];
    $nic_variable = $_POST['nic'];
    $address_variable = $_POST['address'];
    $password_variable = $_POST['pass'];
    $c_password_variable = $_POST['cpass'];

    $con = mysqli_connect("localhost", "root", "", "backend");

    if (!$con) {
        echo "connection error";
        die($con);
    }

    $res = mysqli_query($con,"INSERT INTO user_cred VALUES ('$name_variable','$email_variable','$PhoneNum_variable','$nic_variable','$address_variable','$password_variable','$c_password_variable')");

    if ($res) {
        echo "<script>alert('Registration successful!'); window.location='index.php';</script>";
        exit; // Ensure the script stops executing after the redirection
    } else {
        echo "Registration failed!";
    }
}
?>
