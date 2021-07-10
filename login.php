<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="login.css">
    <title>Mytask/login</title>
</head>

<body>
    <?php
    include 'head.php'; 
     include 'loginhandle.php';
    if($error)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="margin-bottom:0px; margin-top:3.5rem;">
        <strong>Sorry!</strong> You Enter Wronge Details! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="main">
        <form class="mx-auto " action="" method="POST" style="width: 50%; margin-top:80px;" onsubmit="return val()">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="pass">
            </div>
            <button type="submit" name="log" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript">
        function val() {
            var user = document.getElementById('username').value;
            // var pass = document.getElementById('password').value;

            // Username condition
            if ((user == "") && (user.length == 0)) {
                alert("Please Fill the username");
                return false;
            }
            if ((user.length <= 4) || (user.length >= 15)) {
                alert("Username can,t less than 4 character and grater than 15 character");
                return false;
            }
            // Password Condition
            if ((pass == "") && (pass.length == 0)) {
                alert("Please Fill password");
                return false;
            }
            if ((pass.length <= 5) && (pass.length >= 15)) {
                alert("Password should be munimum 5 and maximum 15");
                return false;
            }
        }
    </script>