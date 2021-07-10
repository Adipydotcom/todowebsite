<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS  -->
    <link rel="stylesheet" href="task.css">
    <title>MyTask/task</title>
</head>

<body>
    <?php  include 'head.php'; ?>
    <!-- UPDATE WORK HERE -->
    <?php
    $alert = false;
    include 'connection.php';
    if (isset($_POST['editsubmit'])) {
        $edit_id = $_POST['sno'];
        $editdes = $_POST['edit_text'];
        $editsql = "UPDATE `add_task` SET `task_des` = '$editdes' WHERE `add_task`.`task_id` = '$edit_id'";
        $editresult = mysqli_query($con, $editsql);
        if ($editresult) {
            echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Done</strong> Updated... 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        } 
        else {
            echo 'sb bekaar hai';
        }
    }

    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="form-floating">
                            <input type="hidden" name="sno" id="sno">
                            <textarea class="form-control" placeholder="Leave a comment here" id="edit_text_area"
                                name="edit_text"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="editsubmit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- UPDATE WOKR DONE  -->

    <!-- DELETE WORK HERE  -->

    <!-- DELETE WORK DONE -->
    <div class="main">
        <!-- Heading  -->
        <?php
        include 'connection.php';
        $id = $_GET['catId'];
        $sql = "SELECT * FROM `category` WHERE cat_id = '$id'";
        $result = mysqli_query($con, $sql);
        while ($get_record = mysqli_fetch_assoc($result)) {
            $head = $get_record['cat_title'];
        }
        ?>

        <div class="head my-3 text-center">
            <h1>
                <?php echo $head ?>
            </h1>
        </div>

        <!-- textarea  -->


        <!-- Insert Data into database  -->
        <?php
        include 'connection.php';

        $id = $_GET['catId'];
        if (isset($_POST['submit'])) {
            $task_des = $_POST['taskdes'];
            $sql1 = "INSERT INTO `add_task` ( `task_des`,`place_id`,`ref_id`) VALUES ('$task_des','$id','$id')";
            $result1 = mysqli_query($con, $sql1);
            if ($result1) {
                // echo 'Kaam ho gya hai';
            } else {
                echo 'kaam nhi hua yrr kuchh kro ise thik kro';
            }
        }
        ?>
        <div class="text container">
            <form action="#" method="POST">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Write about your task" id="floatingTextarea2"
                        style="height: 100px" name="taskdes"> </textarea>
                </div>
                <div class="textbtn my-3"> <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </div>
            </form>
        </div>
        <!-- Insert Data into database completed -->
    </div>

    <!-- Task Cards  -->
    <div class="task_card container-fluid">
        <h2> Task List</h2>
        <div class="tcard_flex">

            <?php
            $check_robo = true;
            $c = 0;
            $id = $_GET['catId'];
            $sql = "SELECT * FROM `add_task` WHERE place_id = '$id'";
            $result = mysqli_query($con, $sql);
            while ($get_data = mysqli_fetch_assoc($result)) {
                $check_robo = false;
                $c += 1;
                $ref_del = $get_data['ref_id'];
                $sno = $get_data['task_id'];
                $taskdes = $get_data['task_des'];
                echo
                '<div class="tcard" id="card_id">
                <div class="title">
                    <h3> Task ' . $c . '</h3>
                </div>
                <div class="tcontent">
                    <p>' . $taskdes . '</p>
                </div>
                    <div class="tcard_btn">
                    <a href="delete.php?deletenote='.$sno.'"> <button type="button" class="btn btn-danger delbtn" id="'. $ref_del.'" name="deletebtn">Delete</button> </a> 
                        <button type="button" class="btn btn-primary btnedit" id="' . $sno . '" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button> 
                </div>
            </div>';
            }
            if ($check_robo) {
                echo
                '<div class="not_found container-fluid style="border:2px solid red;">
                    <h1> NO TASK FOUND</h1>
                    <p> Make a Task and improve yourself</p>
                </div>';
            }
            ?>
        </div>
    </div>

    <script type="text/javascript">
    function fun() {
        let delnote = document.getElementById('card_id');
        delnote.remove();
    }

    let edit = document.getElementsByClassName('btnedit');
    Array.from(edit).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("btnedit", e.target.parentNode.parentNode);
            div = e.target.parentNode.parentNode;
            title = div.getElementsByTagName("div")[0].innerText;
            des = div.getElementsByTagName("div")[1].innerText;
            console.log(title, des);
            edit_text_area.value = des;
            sno.value = e.target.id;
            console.log(sno.value);
            // editModal.toggle()
        })
    });
    </script>

    </script>
</body>

</html>