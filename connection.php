<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "task";


$con = mysqli_connect($server,$username,$password,$dbname);

if($con)
{
    // echo "Kaam ho gya bhaiya";
}
else
{
    echo "kuch problem aa rhi hai bhaiya";
}



?>