<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Main CSS  -->
    <link rel="stylesheet" href="index.css">
    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MyTask</title>
</head>

<body>
    <!-- NAVBAR Section -->
    <?php include 'head.php'; ?>

    <!-- first section  -->
    <div class="head">
        <div class="headimg">
            <img src="https://source.unsplash.com/1600x900/?study,routien" alt="image">
        </div>
        <div class="headpara">
            <h1 class="text-uppercase">
                plan your day
            </h1>
        </div>
    </div>

    <div class="col1">
        <button type="button" class="btn btn-info startbtn"> Let's Start </button><i class="fa fa-long-arrow-right"
            aria-hidden="true"></i>
        <div class="cardarea">
            <!-- Fetch data  -->
            <?php
                include 'connection.php';

                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($con, $sql);
                while ($get_record = mysqli_fetch_assoc($result))
                {
                    $card_title = $get_record['cat_title'];
                    $card_des = $get_record['cat_des'];
                    $catid = $get_record['cat_id'];
                   
                    echo '
                                <div class="card">
                                    <img src="https://source.unsplash.com/1600x900/?'.$card_title.','.$card_title.'" class="card-img-top" alt="error_image_loading">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$card_title.'</h5>
                                            <p class="card-text">'.$card_des.' </p>';
                                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true')
                                            {
                                            echo
                                            '<a href="task.php?catId='.$catid.'" class="btn btn-primary cardbtn" type="submit">Go</a>';
                                            }
                                            else
                                            {
                                                echo
                                                '<a href="login.php" class="btn btn-primary cardbtn" type="submit">Please Login</a>';
                                            }
                    echo   '</div>
                        </div>';               
                }
            ?>
        </div>
    </div>
    <!-- Thired Section  -->
    <div class="container-fluid about" id="aboutsection">
        <h1>About Us</h1>
        <div class="aboutcontent">
            <div class="aboutimg">
                <img src="image/mimi-thian-slWBjTGhREQ-unsplash.jpg" alt="img_error">
            </div>
            <div class="aboutitem">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati consequuntur assumenda libero ad
                    error delectus! Itaque placeat ipsam ex dolorem, perspiciatis harum, aliquid enim quasi ut
                    aspernatur praesentium veniam accusamus facere.
                    Deleniti sapiente dolores ipsum?</p>
            </div>
        </div>
    </div>

    <?php
        // Insert Data
        $alert = false; 
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile_number = $_POST['mubnum'];
            $password = $_POST['pswd'];
            $text_area = $_POST['textarea'];

            $data = "INSERT INTO `contect` (`uname`, `mail`, `mobnum`, `password`, `text_area`) VALUES ('$name', '$email', '$mobile_number', '$password', '$text_area')";

            $result = mysqli_query($con, $data);
            if($result)
            {
                $alert = false; 
            }
            else{
                echo 'Bhaiya kuch to problem jho gya hai kuch kriye';
            }
        }

    ?>


    <div class="contectus">
        <div class="contect">
            <h2> Contect Us</h2>
            <form class="form" action="#" onsubmit="return valfun()" method="POST">
                <!-- Name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" aria-describedby="namelHelp"
                        autocomplete="off">
                    <span id="namespan" style="color: red;"></span>
                </div>
                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emails" name="email" aria-describedby="emailHelp"
                        autocomplete="off">
                    <span id="emailids" style="color: red;"></span>
                </div>
                <!-- Mobile no  -->
                <div class="mb-3">
                    <label for="mobnum" class="form-label">Mobile Number</label>
                    <input type="number" id="mobileNumber" class="form-control" name="mubnum"
                        aria-describedby="moblHelp" autocomplete="off">
                    <span id="mobileno" style="color: red;"></span>
                </div>
                <!-- password  -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="pass" class="form-control" id="password" name="pswd" autocomplete="off">
                </div>
                <span id="passwords" style="color: red;"></span>
                <!-- Check  -->
                <div class="mb-3 form-check">
                    <input type="checkbox" id="chk" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    <span id="check" style="color: red;"></span>
                </div>
                <!-- Textarea-->
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="textarea" id="textarea"
                        style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>

                <div class="fbtn"> <button type="submit" name="submit" value="submit"
                        class="btn btn-primary formbtn">Submit</button> </div>
            </form>
        </div>
    </div>

    <footer>
        <p>2020 Copyright: MyTask.com All Right Reserved<br>
            <a href="askhere.site">mytask.com</a>
        </p>
    </footer>


    <script type="text/javascript">
    console.log('Aditya is here');

    function valfun() {
        // Name Area 
        let username = document.getElementById('name').value;
        console.log(username);

        if ((username == "") || (username.length == 0)) {
            document.getElementById('namespan').innerHTML = "Please Enter Your Name!";
            return false;
        }
        if ((username.length <= 3) || (username.length >= 14)) {
            document.getElementById('namespan').innerHTML =
                "Name should be less than 15 character and grater than 3 character!";
            return false;
        }

        // Email Area 
        let emails = document.getElementById('emails').value;
        if (emails == "") {
            document.getElementById('emailids').innerHTML = "Please fill Email ID!";
            return false;
        }
        if (emails.indexOf('@') <= 0) {
            document.getElementById('emailids').innerHTML = " @ Invalid Position";
            return false;
        }
        if ((emails.charAt(emails.length - 4) != '.') && (emails.charAt(emails.length - 3) != '.')) {
            document.getElementById('emailids').innerHTML = " ** (.) Invalid Position";
            return false;
        }

        // Mobile Number Area 
        let mobileNumber = document.getElementById('mobileNumber').value;
        if (mobileNumber == "") {
            document.getElementById('mobileno').innerHTML = "Please fill the Mobile Number";
            return false;
        }
        if (isNaN(mobileNumber)) {
            document.getElementById('mobileno').innerHTML = "Mobile Number must be Number!";
            return false;
        }
        if (mobileNumber.length != 10) {
            document.getElementById('mobileno').innerHTML = "Mobile Number must be 10 digits only!";
            return false;
        }
        // Password Area 
        let pass = document.getElementById('pass').value;
        if (pass == "") {
            document.getElementById('passwords').innerHTML = "Please fill the Password";
            return false;
        }
        if ((pass.length <= 5) || (pass.length > 20)) {
            document.getElementById('passwords').innerHTML = "Passwords lenght must be between 5 and 20";
            return false;
        }
        // Cheacked or not 

        let chkd = document.getElementById('chk');
        if (chkd.checked == false) {
            document.getElementById('check').innerHTML == "Please check";
            return false;
        }



    }
    </script>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>