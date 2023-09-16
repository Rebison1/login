<?php
$uname=$_POST['uname'];
$email=$_POST['email'];
$upswd1=$_POST['upswd1'];
$upswd2=$_POST['upswd2'];

if (!empty($uname) || empty($email) || empty($upswd1) || empty($upswd2));


$host="localhost";
$dbusername="root";
$dbpassword="root";
$dbname="db";


$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);
if 

(mysqli_connect_error()){die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
    $SELECT="SELECT email FROM register where email =? limit 1";
    $INSERT ="INSERT into register(uname,email,upswd,upswd2) values(?,?,?,?)";

    $stmt=$conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum=$stmt->num_rows;
    if ($rnum==0){
        $stmt->close();
        $stmt=$con->prepare($INSERT);
        $stmt->bind_param("ssss",$uname.$email,$upswd1,$upswd2);
        $stmt->execute();
        echo "new record inserded succes";
    } else{
        echo"someone already register using this email";
    }
    $stmt->close();
    $conn->close();
}
 ?>





















?>
