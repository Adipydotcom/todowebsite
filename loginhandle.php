<?php
$error = false;
if(isset($_POST['log']))
{
    include 'connection.php';
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql1 = "SELECT * FROM `login` WHERE username = '$uname' AND password = '$pass'";
    $result1 = mysqli_query($con,$sql1);
    $match_row = mysqli_num_rows($result1);
    if($match_row == 1)
    {
        // echo 'mil gya';
        $get = mysqli_fetch_assoc($result1);
        session_start();
        $_SESSION['loggedin'] = 'true';
        $_SESSION['sno'] = $get['sno'];
        $_SESSION['username'] = $uname;
        header("Location: index.php");
    }
    else{
        // echo "nhi mila";
        $error = true;
    }
}
else{
    echo "not permission";
}
?>