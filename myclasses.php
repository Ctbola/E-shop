<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Classes | Sandeeu edu</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="image/2.png" />
</head>

<body>
    <?php
    require "connection.php";
    include "header.php";
    if (isset($_SESSION["u"])) {

    ?>

        <div class="container-fluid">
            <div class="row">

                <nav class="nav text-bg-dark text-white">
                    <a class="nav-link text-white" href="home.php">Home /</a> 
                    <a class="nav-link active text-white" aria-current="page" href="#">My Classes</a>
                </nav>

                <div class="col-12  text-center mt-4">
                    <label class="form-label text-primary fw-bold fs-1">My Classes</label>
                </div>

                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3 mt-3">
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-3 d-grid">
                                    <button class="btn btn-warning">Search class</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-1 mb-1 border border-dark">
                    <div class="row text-center  ">
                        <div class="col-2 col-lg-1  py-2 text-end  border-end border-dark" style="background-color: rgb(147, 199, 229);">
                            <span class="fs-4 fw-bold text-white">#</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2 border-end border-dark">
                            <span class="fs-4 fw-bold ">Lesson Name</span>
                        </div>
                        <div class="col-4 col-lg-2  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                            <span class="fs-4 fw-bold text-white ">Teacher</span>
                        </div>
                        <div class="col-4 col-lg-3 d-lg-block bg-light py-2 border-end border-dark">
                            <span class="fs-4 fw-bold ">Description</span>
                        </div>
                        <div class="col-2 d-none d-lg-block py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                            <span class="fs-4 fw-bold ">Time</span>
                        </div>
                        <div class="col-1 d-none d-lg-block bg-light py-2 ">
                            <span class="fs-4 fw-bold ">Day</span>
                        </div>
                        <div class="col-2 col-lg-1 bg-white"></div>
                    </div>
                </div>


                <?php
                $query = "SELECT * FROM `lesson` INNER JOIN `link` ON `link`.id =`lesson`.link_id INNER JOIN `teacher` ON `teacher`.email = `lesson`.teacher_email INNER JOIN `day` ON `day`.id = `lesson`.day_id INNER JOIN users_has_lesson ON users_has_lesson.lesson_id =lesson.id  WHERE `users_email`='" . $u["email"] . "' ";
                
                $_SESSION["l"] = $query;
                $pageno;

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $user_rs = Database::search($query);
                $user_num = $user_rs->num_rows;

                $results_per_page = 20;
                $number_of_pages = ceil($user_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <div class="col-12 mt-1  border border-dark">
                        <div class="row text-center">
                            <div class="col-2 col-lg-1  py-2 text-end border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white"><?php echo $x + 1; ?></span>
                            </div>
                            <div class="col-2 d-none d-lg-block bg-light py-2 border-end border-dark">
                                <span class="fs-4 fw-bold text-black"><?php echo $selected_data["lesson_name"]; ?></span>
                            </div>
                            <div class="col-4 col-lg-2  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white "><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                            </div>
                            <div class="col-4 col-lg-3 d-lg-block bg-light py-2 border-end border-dark">
                                <span class="fs-4 fw-bold "><?php echo $selected_data["lesson_description"] ?></span>
                            </div>
                            <div class="col-2 d-none d-lg-block  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white"><?php echo $selected_data["time"] ?></span>
                            </div>
                            <div class="col-1 d-none d-lg-block bg-light py-2 ">
                                <span class="fs-4 fw-bold "><?php echo $selected_data["day_name"] ?></span>
                            </div>
                            <div class="col-1 col-lg-1 bg-light py-2 d-grid">

                                <a href="<?php echo $selected_data["link"] ?>" class="btn btn-outline-danger">Watch</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="offset-2 mt-3 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                                echo "?page="($pageno - 1);
                                                            } ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {
                            ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="<?php echo "?page=" . ($x) ?>);"><?php echo $x; ?></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo "?page=" . ($x) ?>);"><?php echo $x; ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                                echo "?page="($pageno + 1);
                                                            } ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 mt-3">
                    <div class="row text-center">
                        <h1 class="text-primary">Start New Subject & Types</h1>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-8 mt-4 offset-2">
                            <div class="row ">
                                <label class="form-label fw-bold">Add New Subject</label>
                                <hr style="width: 90%;" class="bg-danger">
                                <select class="form-select" id="subject">
                                    <option value="0">Select Subject</option>
                                    <?php
                                    $sub_rs = Database::search("SELECT * FROM `subject`");
                                    $sub_num = $sub_rs->num_rows;
                                    for ($x = 0; $x < $sub_num; $x++) {
                                        $sub_data = $sub_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $sub_data["id"] ?>"><?php echo $sub_data["name"] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>

                        <div class="col-8 mt-4 offset-2">
                            <div class="row ">
                                <label class="form-label fw-bold">Subject Type</label>
                                <hr style="width: 90%;" class="bg-danger">
                                <select class="form-select" id="type">
                                    <option value="0">Subject Type</option>
                                    <?php
                                    $sub_rs = Database::search("SELECT * FROM `less_type`");
                                    $sub_num = $sub_rs->num_rows;
                                    for ($x = 0; $x < $sub_num; $x++) {
                                        $sub_data = $sub_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $sub_data["id"] ?>"><?php echo $sub_data["name"] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>

                        <div class="col-2 mt-3 offset-5">
                            <div class="row">
                                <button class="btn btn-outline-success" onclick="savenew();">Save</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    <?php
    } else {

        header("location:signup.php");
    }


    ?>
    <?php include "footer.php"; ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>