<!DOCTYPE html>
<html lang="en">

<head>
    <title>Exames | Sandeeu edu</title>
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
    
    if(isset($_SESSION["u"])){
        $u =$_SESSION["u"];
        ?>

    <div class="container-fluid">
        <div class="row justify-content-center">

        <nav class="nav text-bg-dark text-white">
                    <a class="nav-link text-white" href="home.php">Home /</a> 
                    <a class="nav-link active text-white" aria-current="page" href="#">Exames</a>
                </nav>
            <div class="col-12 col-lg-10 mt-3 mb-3 offset-lg-1">
                <div class="row">
            
                    <div class="col-12 col-lg-10">
                        <div class="row text-center ">
                            <h2>My Exames</h2>
                        </div>
                    </div>

                    <div class="col-lg-10 mt-3 mb-5">
                        <div class="row">
                            <select class="form-select">
                                <option value="0">Select Subject</option>
                                <?php
                                $subject_rs = Database::search("SELECT * FROM `subject`");
                                $subject_num = $subject_rs->num_rows;

                                for ($x = 0; $x < $subject_num; $x++) {
                                    $subject_data = $subject_rs->fetch_assoc();
                                ?>
                                    <option><?php echo $subject_data["name"]; ?></option>
                                <?php

                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <div class="row">
                            <h4>Exames</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <div class="row">
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Lesson</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $less_rs = Database::search("SELECT * FROM `exam` INNER JOIN `lesson` ON `lesson`.id = `exam`.lesson_id INNER JOIN `link` ON `link`.id =`exam`.link_id INNER JOIN `day` ON `day`.id = `lesson`.day_id INNER JOIN `subject` ON `subject`.id = `lesson`.subject_id  WHERE `users_email`='" . $u["email"] . "' ");
                                    $less_num = $less_rs->num_rows;
                                    for ($y = 0; $y < $less_num; $y++) {
                                        $less_data = $less_rs->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td data-label="#"><?php echo $y + 1; ?></td>
                                            <td data-label="Subject"><?php echo $less_data["name"]; ?></td>
                                            <td data-label="Lesson"><?php echo $less_data["lesson_name"]; ?></td>
                                            <td data-label=""><a href="<?php echo $less_data["link"]; ?>">View</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="col-12 col-lg-10 mt-5">
                        <div class="row  ">
                            <h4>Marks</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10 mb-3">
                        <div class="row text-center">
                            <!-- table -->
                            <table class="ui celled padded table">
                                <thead>
                                    <tr>
                                        <th class="single line">Resault</th>
                                        <th>Lesson</th>
                                        <th>Subject</th>
                                        <th>Mark</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $mar_rs = Database::search("SELECT * FROM `mark` INNER JOIN `exam` ON `exam`.id = `mark`.exam_id INNER JOIN `lesson` ON `lesson`.id =`exam`.lesson_id INNER JOIN `subject` ON `subject`.id =`lesson`.subject_id WHERE `users_email`='" . $u["email"] . "'");
                                    $mar_num = $mar_rs->num_rows;
                                    for ($m = 0; $m < $mar_num; $m++) {
                                        $mar_data = $mar_rs->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td>
                                                <h2 class="ui center aligned header text-uppercase text-danger"><?php echo $mar_data["mark"]; ?></h2>
                                            </td>
                                            <td class="single line">
                                                <?php echo $mar_data["lesson_name"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $mar_data["name"]; ?>
                                            </td>
                                            <td >
                                                <?php echo $mar_data["mark"]; ?>%

                                            </td>
                                            <td><?php echo $mar_data["comment"]; ?></td>
                                        </tr>


                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
                                            <div class="ui right floated pagination menu ">
                                                <a class="icon item">
                                                    <i class="bi bi-arrow-left-short fw-bold"></i>
                                                </a>
                                                <a class="item">1</a>
                                                <a class="item">2</a>
                                                <a class="item">3</a>
                                                <a class="item">4</a>
                                                <a class="icon item">
                                                    <i class="bi bi-arrow-right-short fw-bold"></i>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- table -->
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
</body>

</html>