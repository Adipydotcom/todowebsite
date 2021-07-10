<?php
    $alert = false;
    include 'connection.php';
        $del_id = $_GET['deletenote'];
        $delsql = "DELETE FROM `add_task` WHERE `add_task`.`task_id` = '$del_id'";
        $delresult = mysqli_query($con,$delsql);
        if($delresult)
        {
        
            header("location: index.php");
        }
        else{
            echo "Fuck what the hell is this";
        }
    ?>