<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Main CSS  -->
    <link rel="stylesheet" href="heads.css">
    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MyTask</title>
</head>

<body>
    <?php
    include 'signin_handle.php';
    if(isset($_GET['signinsuccessfully']) && $_GET['signinsuccessfully'] == 'true')
    {
        echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0px; margin-top:3.5rem;">
        <strong>Welcome </strong> Now go to login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

?>
    <!-- NAVBAR Section -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " style="color: #fff" ; aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #fff" ; href="#aboutsection">About Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #fff" ; href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Our Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php 
                            include 'connection.php';
                            $sql = "SELECT * FROM `category`";
                            $result = mysqli_query($con, $sql);
                            while($get = mysqli_fetch_assoc($result))
                            {
                                $service_title = $get['cat_title'];
                                $service_id = $get['cat_id'];
                                echo
                                '<li><a class="dropdown-item" href="task.php?catId='.$service_id.'">'.$service_title.'</a></li>';
                            }

                            ?>
                        </ul>
                    </li>
                </ul>
                <?php
                session_start();
                include 'connection.php';
                include 'loginhandle.php';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== 'true')
                {
                    echo
                  '<div class="wlcm"><h2> Welcome '.$_SESSION['username'].'</h2></div>  
                <div class="navbtn">
                <a href="signin.php">  <button src type="submit"  class="btn btn-danger">Signup</button>  </a>
                <a href="logout.php">  <button type="submit" class="btn btn-danger">Logout</button> </a>
                </div>';
                }
                else
                {
                    echo
                    '<div class="navbtn">   <a href="login.php">  <button type="submit" class="btn btn-danger">Login</button> </a>
                <a href="signin.php">  <button src type="submit"  class="btn btn-danger">Signup</button>  </a>
                </div>';
                }
                ?>
                </div>
            </div>
        </div>
    </nav>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>