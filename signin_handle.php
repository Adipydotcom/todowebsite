<?php
    $showAlret = false;
        $show_success_alert = false;
        $error = false;
        error_reporting(0);
    if(isset($_POST['submit']))
    {
        include 'connection.php';
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $getsql = "SELECT username FROM `login` WHERE username = '$username'";
        $getdata = mysqli_query($con, $getsql);
        $exitsuser = mysqli_num_rows($getdata);
        if ($exitsuser > 0) {
            $showAlret = true;
            // echo "user alread exsits";
        }
        else{
            if(($username != "") && ($password != ""))
            {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `login` (`name`, `username`, `password`) VALUES ('$name', '$username', '$password')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $show_success_alert = true;
                header("Location: index.php?signinsuccessfully=true");
                // echo "Work Done";
                exit();
            }
            }
            else
            {
                $error = true;
            }
        }
    }
   ?>