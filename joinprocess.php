<?php
require "connection.php";

if (isset($_GET["id"])) {

    $less = $_GET["id"];

    $lessp_rs = Database::search("SELECT * FROM `lesson` INNER JOIN `users_has_lesson` ON `users_has_lesson`.id =`lesson`.id INNER JOIN `teacher` ON `teacher`.email = `lesson`.teacher_email INNER JOIN `day` ON `day`.id = `lesson`.day_id INNER JOIN `less_type` ON `less_type`.id = `lesson`.less_type_id WHERE `lesson`.id = '" . $less . "' ");

    $lessp_num = $lessp_rs->num_rows;

    if ($lessp_num == 1) {

        $lessp_data = $lessp_rs->fetch_assoc();

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title><?php echo $lessp_data["lesson_name"]; ?> | Sandeeu edu</title>
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="semantic.css">
            <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

            <link rel="icon" href="image/2.png" />
        </head>

        <body>
            <?php

            include "header.php";
            if (isset($_SESSION["u"])) {
            ?>
                <div class="container-fluid">
                    <div class="row">
                    <nav class="nav text-bg-dark text-white">
                    <a class="nav-link text-white" href="home.php">Home /</a> 
                    <a class="nav-link active text-white" aria-current="page" href="#">Join Classes</a>
                </nav>
                        <div class="col-12 border-end border-dark mt-3 mb-3">
                            <div class="row">
                                <div class="col-2 col-lg-2 d-lg-block border border-end">
                                    <div class="row text-center">
                                        <h3 class="mt-2">Class Details</h3>
                                        <hr class="col-10">
                                       
                                        <div class="col-12 fw-bold ">
                                            <div class="row text-start">
                                                <?php
                                                $sub_rs = Database::search("SELECT * FROM `lesson` INNER JOIN subject ON lesson.subject_id = subject.id WHERE `lesson`.id = '" . $less . "'  ");
                                                $sub_data = $sub_rs->fetch_assoc();
                                                ?>
                                                <span class="fs-5">subject : <span class="fs-5 text-primary"><?php echo $sub_data["name"]; ?></span>
                                                    <br>
                                                    <br>

                                                    <span class="fs-5 mb-3"> lesson : <span class="fs-5 text-primary"><?php echo $lessp_data["lesson_name"]; ?></span>
                                                        <br>
                                            </div>
                                        </div>
                                        <hr class="col-10">
                                        <!-- box -->

                                        <div class=" ui vertical  menu mb-3 mt-2 ms-3">

                                            <div class="item">
                                                <a href="home.php" class="text-decoration-none text-black fs-5">Home</a>
                                                <br>
                                                <br>
                                                <a href="home.php" class="text-decoration-none text-black fs-5">Cart</a>
                                                <br>
                                                <br>
                                                <a href="home.php" class="text-decoration-none text-black fs-5">My Classes</a>


                                            </div>


                                        </div>
                                        <!-- box -->
                                    </div>
                                </div>

                                <!-- 2nd -->
                                <div class="col-3 col-lg-3 border border-end ">
                                    <div class="row">
                                        <div class="image offset-lg-1 mt-4">
                                            <img src="resource/f/a.jpg" style="width:290px ; height: 250px;">
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd -->
                                <!-- 3nd -->
                                <div class="col-7 col-lg-7">

                                    <div class="row border-bottom border-dark text-center">
                                        <div class="col-12 my-2">
                                            <span class="fs-4 text-success fw-bold">Lesson Details</span>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Subject : <span class="fs-5 text-primary"><?php echo $sub_data["name"]; ?></span></span>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Lesson : <span class="fs-5 text-primary"><?php echo $lessp_data["lesson_name"]; ?></span>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Lesson Description : <span class="fs-5 text-primary"><?php echo $lessp_data["lesson_description"]; ?></span>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Time : <span class="fs-5 text-danger"><?php echo $lessp_data["time"]; ?></span>
                                                <br>

                                                <span class=" offset-1 fs-5 text-black fw-bold">Lesson Type : <span class="fs-5 text-primary"><?php echo $lessp_data["name"]; ?></span>
                                                    <br>
                                                    <span class=" offset-1 fs-5 text-black fw-bold">Date : <span class="fs-5 text-success"><?php echo $lessp_data["day_name"]; ?></span>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Teacher : <span class="fs-5 text-primary"><?php echo $lessp_data["fname"] . " " . $lessp_data["lname"]; ?></span>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border text-start ">
                                        <div class="col-12 my-2">
                                            <span class=" offset-1 fs-5 text-black fw-bold">Price : <span class="fs-5 text-danger"><?php echo $lessp_data["price"]; ?></span>
                                        </div>
                                    </div>

                                </div>
                                <!-- 3nd -->

                            </div>

                        </div>

                        <div class="col-10 offset-lg-1 mb-3">
                            <div class="row ">
                                <div class="ui ordered steps">
                                    <div class="completed step">
                                        <div class="content">
                                            <div class="title">Lesson</div>
                                            <div class="description">Choose your lesson options</div>
                                        </div>
                                    </div>
                                    <div class="completed step">
                                        <div class="content">
                                            <div class="title">Payment</div>
                                            <div class="description">Enter Payment information</div>
                                        </div>
                                    </div>
                                    <div class="active step">
                                        <div class="content">
                                            <div class="title">Confirm</div>
                                            <div class="description">Verify details</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12offset-lg-2 mb-3 ">
                            <div class="row ">
                                <div class=" row justify-content-end mt-3">
                                    <button class="col-3 btn btn-success" type="submit" id="payhere-payment" onclick="payNow(<?php echo $lessp_data['id']; ?>);">Buy Now</button>
                                </div>
                                
                                <div class="row justify-content-end mt-3">
                                    <button class="col-3 btn btn-warning" onclick="il();">Add Cart</button>
                                </div>

                            </div>
                        </div>

                        <hr class="col-12 border-1 border-dark">

                        <div class="col-10 offset-1">
                            <div class="row text-center  ">
                                <span class="fs-3 fw-bold">feedbacks</span>
                            </div>
                            <div class="row border border-1 border-dark rounded me-0 overflow-scroll" style="height: 300px;">

                                <div class="col-12 mt-1 mb-1 mx-1">
                                    <div class="row border border-1 border-dark rounded me-0">
                                        <div class="col-12 text-center">
                                            <span class="text-center"><i class="bi bi-binoculars" style="font-size: 140px;"></i></span>
                                        </div>
                                        <div class="col-12 mb-3 ms-0 text-center">
                                            <span class="text-black-50 fs-1">No feedbacks yet..</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="row">
                                
                                <div class="col-12 mt-3 offset-lg-1 ">
                                    <h5 class="fw-bold fs-3">Recent Classes</h5>
                                    <hr>
                                    <div class="col-12">
                            <div class="row justify-content-center gap-3 offset-1 mb-3">
                                <div class="ui link cards">
                                    <?php
                                    $less_rs = Database::search("SELECT * FROM `lesson` INNER JOIN `teacher` ON `teacher`.email = `lesson`.teacher_email INNER JOIN `day` ON `day`.id = `lesson`.day_id INNER JOIN `grade` ON `lesson`.grade_id =`grade`.id INNER JOIN `subject` ON `subject`.id =`lesson`.subject_id ORDER BY `start_date` DESC LIMIT 3 OFFSET 0 ");
                                    $less_num = $less_rs->num_rows;
                                    for ($y = 0; $y < $less_num; $y++) {
                                        $less_data = $less_rs->fetch_assoc();
                                    ?>
                                        <div class="card border border-dark">


                                            <div class="text-center mt-1">
                                                <span class="text-warning fw-bold fs-4"><?php echo $less_data["name"] ?></span>
                                            </div>
                                            <div class="ms-3 fw-bold fs-5">
                                                <span class="fs-5">Lesson : <span class="text-black fs-5 fw-bold"><?php echo $less_data["lesson_name"] ?></span></span>
                                                <br>
                                                <span class="fs-5">Time :<span class="text-black fs-5"> <?php echo $less_data["time"] ?><span class="badge bg-success ms-1 "><?php echo $less_data["day_name"] ?></span></span></span>
                                                <br>
                                                <span class="fs-5">Price :<span class="text-danger  fs-5"> Rs.<?php echo $less_data["price"] ?>.00</span></span>
                                                <br>
                                                <span class="fs-5">Teacher:<span class="text-black fs-5"> <?php echo $less_data["fname"] . " " . $less_data["lname"] ?></span></span>
                                            </div>
                                            <hr>

                                            <div class="col-12">
                                                <div class="row align-content-center gap-2 offset-1 mb-2 ms-5">
                                                    <a href='<?php echo "joinprocess.php?id=".$less_data["id"]; ?>' class="col-10 btn btn-outline-danger">JOIN </i></a>
                                                    <button class="col-10 btn btn-outline-primary  ">Add Cart</i></button>
                                                </div>
                                            </div>

                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <?php include "footer.php"; ?>
                <?php
            } else {
                header("location:signup.php");
            }
                ?>
                
                <script src="bootstrap.bundle.js"></script>
                <script src="script.js"></script>
                
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>
<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>