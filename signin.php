<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="signin.css">
    <title>Mytask/signin</title>

   
    </script>
</head>

<body>
    
<?php
    include 'head.php';
    include 'signin_handle.php';
    if ($showAlret){
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Sorry!</strong> User already exists Please create another 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    if ($error){
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Sorry!</strong> You make mistake...Please Enter valid Crendentisal 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
   ?>
    <div class="container">
        <form class="mx-auto " action="#" method="POST" style="width: 50%; margin-top:80px;" onsubmit="return val()">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="user" aria-describedby="emailHelp" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Create Password</label>
                <input type="password" name="password" class="form-control" id="pass"  autocomplete="off">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
    console.log("Aditya");
    function val() {
        // Username condition
        var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;
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
</body>

</html>