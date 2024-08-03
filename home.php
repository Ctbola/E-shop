<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Home | Sandeeu edu</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="image/2.png" />
</head>
<!-- style="background-color: red;" -->

<body>
    <?php
    require "connection.php";
    include "header.php";
    if(isset($_SESSION["u"])){
        ?>
        
       

    <div class="col-12">
        <hr>
    </div>


    <div class="col-12 justify-content-center">
        <div class="row mb-3">
            <div class="offset-4 offset-lg-1 col-4 col-lg-2 logo " style="height: 60px;"></div>

            <div class="col-12 col-lg-6 mt-3 ms-3">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary fw-bold col-3 text-center" type="button"><span class="d-inline-block ms-2 " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Logout"><i class="bi bi-search fw-bold"></i></span></button>
                    <?php
                    $grade_rs = Database::search("SELECT * FROM `users` INNER JOIN `grade` ON `users`.grade_id = `grade`.id WHERE email ='" . $u["email"] . "'");
                    $grade_data = $grade_rs->fetch_assoc();
                    ?>
                    <span class="ms-5 mt-2 fs-4 fw-bold">GRADE : <span class="mt-2 fs-4 fw-bold text-danger"><?php echo $grade_data["id"]; ?></span> STUDENT</span>
                </div>
            </div>

            <div class=" offset-1 col-10">
                <hr>
            </div>


            <div class="col-12">
                <div class="row">
                    <!-- recent -->
                    <div class=" offset-1 offset-lg-0 col-12 col-lg-2 border-end border-dark  m-3">
                        <span class="ms-2 fw-bold fs-5">Classes</span>
                        <div class="col-12 mt-2">
                            <div class="row">


                                <div class="ui cards ">
                                    <?php
                                    $class_rs = Database::search("SELECT * FROM `users_has_lesson` INNER JOIN `lesson` ON `users_has_lesson`.lesson_id =`lesson`.id INNER JOIN `users` ON `users`.email =`users_has_lesson`.users_email WHERE `users_email`='" . $u["email"] . "'");
                                    $class_num = $class_rs->num_rows;
                                    for ($f = 0; $f < $class_num; $f++) {
                                        $class_data = $class_rs->fetch_assoc()
                                    ?>
                                        <div class="card border">
                                            <div class="content">

                                                <div class="header">
                                                    <?php echo $class_data["lesson_name"] ?>
                                                </div>
                                                <div class="meta">
                                                    <?php echo $class_data["time"] ?>
                                                </div>
                                                <div class="description">
                                                    <?php echo $class_data["lesson_description"] ?>
                                                </div>
                                            </div>
                                            <div class="extra content">
                                                <a href="myclasses.php" class="btn btn-outline-warning">WATCH NOW</a> 
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- recent -->

                    <!-- pro -->
                    <!-- sub -->
                    <div class=" offset-1 col-12 col-lg-8">


                        <div class="row">
                            <?php

                            $sub_rs = Database::search("SELECT * FROM `subject` INNER JOIN  `users_has_subject` ON `subject`.id = `users_has_subject`.subject_id WHERE `less_type_id` ='1' AND `users_email` = '" . $u["email"] . "'  ");
                            $sub_num = $sub_rs->num_rows;
                            for ($x = 0; $x < $sub_num; $x++) { 
                                $sub_data = $sub_rs->fetch_assoc();
                            ?>
                                <div class="col-12 mt-3 mb-3 ms-3 border-bottom border-dark">
                                    <a href="#" class="text-decoration-none link-dark fs-3 fw-bold"><?php echo $sub_data["name"] ?></a>&nbsp;&nbsp;
                                    <a href="#" class="text-decoration-none link-dark fs-6 fw-bold">See All &nbsp; &rarr;</a>
                                </div>
                                <div class="col-12">
                                    <div class="row justify-content-center gap-3 offset-1">
                                        <div class="ui link cards">
                                            <?php
                                            $lesson_rs = Database::search("SELECT * FROM `lesson`  INNER JOIN `teacher` ON `teacher`.email = `lesson`.teacher_email INNER JOIN `day` ON `day`.id = `lesson`.day_id INNER JOIN `grade` ON `lesson`.grade_id =`grade`.id INNER JOIN `subject` ON `subject`.id =`lesson`.subject_id WHERE subject_id ='" . $sub_data["id"] . "' AND grade.id = '" . $grade_data["id"] . "'   ORDER BY `start_date` DESC LIMIT 4 OFFSET 0");
                                            $lesson_num = $lesson_rs->num_rows;
                                            for ($h = 0; $h < $lesson_num; $h++) {
                                                $lesson_data = $lesson_rs->fetch_assoc();
                                            ?>
                                                <div class="card ">
                                                    <div class="image">
                                                        <img src="resource/f/a.jpg" style="width:290px ; height: 250px;">
                                                    </div>

                                                    <div class="text-center mt-1">
                                                        <span class="text-success fw-bold fs-4"><?php echo $sub_data["name"] ?></span>
                                                    </div>
                                                    <div class="ms-3 fw-bold fs-5">
                                                        <span class="fs-5">Lesson : <span class="text-primary fs-5 fw-bold"><?php echo $lesson_data["lesson_name"] ?></span></span>
                                                        <br>
                                                        <span class="fs-5">Time :<span class="text-secondary fs-5"> <?php echo $lesson_data["time"] ?><span class="badge bg-info ms-1 text-black"><?php echo $lesson_data["day_name"] ?></span></span></span>
                                                        <br>
                                                        <span class="fs-5">Price :<span class="text-danger fs-5"> Rs.<?php echo $lesson_data["price"] ?>.00</span></span>
                                                        <br>
                                                        <span class="fs-5">Teacher:<span class="text-success fs-5"> <?php echo $lesson_data["fname"] . " " . $lesson_data["lname"] ?></span></span>
                                                    </div>
                                                    <hr>

                                                    <div class="col-12">
                                                        <div class="row align-content-center gap-2 offset-1 mb-2">
                                                            <a href='<?php echo "joinprocess.php?id=".$lesson_data["id"]; ?>' class="col-5 btn btn-success">JOIN <i class="bi bi-file-plus"></i></a>
                                                            <button class="col-5 btn btn-primary"onclick="addToCart(<?php echo $lesson_data['id']; ?>);">Add Cart <i class="bi bi-cart-plus"></i></button>
                                                        </div>
                                                    </div>

                                                </div>

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>

                        </div>

                    </div>


                    <!-- pro -->


                </div>
            </div>



            <div class="col-12 text-danger ">
                <hr>
            </div>
            <!-- carsouel -->
            <div class=" offset-1 col-10 align-content-center">
                <div class="row">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/back.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- carsouel -->

            <!-- sub -->
            <div class="col-12 col-lg-11">
                <div class="row">
                    <?php
                    $ext_rs = Database::search("SELECT * FROM `less_type`");
                    $ext_num = $ext_rs->num_rows;
                    for ($x = 0; $x < $ext_num; $x++) {
                        $ext_data = $ext_rs->fetch_assoc();
                    ?>
                        <div class="col-12 mt-3 mb-3 ms-3 border-bottom border-dark">
                            <a href="#" class="text-decoration-none link-dark fs-3 fw-bold"><?php echo $ext_data["name"] ?></a>&nbsp;&nbsp;
                            <a href="#" class="text-decoration-none link-dark fs-6 fw-bold">See All &nbsp; &rarr;</a>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gap-3 offset-1">
                                <div class="ui link cards">
                                    <?php
                                    $less_rs = Database::search("SELECT * FROM `lesson` INNER JOIN `teacher` ON `teacher`.email = `lesson`.teacher_email INNER JOIN `day` ON `day`.id = `lesson`.day_id  INNER JOIN `grade` ON `lesson`.grade_id =`grade`.id INNER JOIN `subject` ON `subject`.id =`lesson`.subject_id WHERE   less_type_id ='" . $ext_data["id"] . "' AND grade.id = '" . $grade_data["id"] . "' ORDER BY `start_date` DESC LIMIT 3 OFFSET 0");
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
                                                    <button class="col-10 btn btn-outline-primary  " onclick="addToCart(<?php echo $lesson_data['id']; ?>);">Add Cart</i></button>
                                                </div>
                                            </div>

                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>

                </div>


            </div>
        </div>




        <div class="col-12 col-lg-8 text-center mt-5 offset-lg-2 mb-3">
            <div class="row">
                <div class="centered banner test ad bg-info  text-black fw-bold">
                    <label class="fs-5 text-black">Pay your class fees through our bank account by indicating student ID number and upload slip to the class.</label>
                    <br>
                    <br>
                    <label class="fs-4 text-white">Call for any clarification - 070 328 3498</label>
                    <br>
                    <br>
                    876001******
                    <br>
                    W.D.W.Wijesiriwardhana
                    <br>
                    Commercial Bank - Horana Branch
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

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>