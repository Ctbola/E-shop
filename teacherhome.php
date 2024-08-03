<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title> sandeeu edu | Teachers Page</title>
    <link rel="icon" href="image/2.png" />
</head>
<?php
session_start();
require "connection.php";

?>



    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 c">
                    <div class="row">

                        <div class="col-6 col-lg-3">
                            <div class="row">
                                <div class="col-2 icon"></div>

                                <span class="col-5 col-lg-4 text-white mt-3 offset-lg-0 text-start fs-5 fw-bold"> EDU GURU</span>
                            </div>
                        </div>

                        <div class="col-6 col-lg-5 mt-2 offset-lg-1">
                            <div class="row">
                                <input class="col-7 col-lg-8 border rounded-2" placeholder="Search" type="text">
                                <button class="btn btn-dark col-4 col-lg-2 ms-1 ">Search</button>

                            </div>
                        </div>

                        
                         
                            <div class="offset-lg-0 col-lg-1 mt-1  d-none d-lg-block d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Profile">
                                <img src="image/userpro.svg" width="90px" height="40px" class="rounded-circle" id="viewimg">
                            </div>

                        


                        <div class="col-12 col-lg-1  mt-2 d-none d-lg-block">
                            <div class="row">
                                <div class=" dropdown ">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menu
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="teacherProfile.php">Edit Profile</a></li>
                                        <li><a class="dropdown-item" href="viewsubmitanswersheets.php">View Submitted Answersheets</a></li>
                                        <li><a class="dropdown-item" href="addAssimentMark.php">Add Assigmets Marks</a></li>
                                        <li><a class="dropdown-item" onclick="teachersignout();" href="#">Log Out</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-12 col-lg-10 offset-lg-1 mt-3 mb-3 rounded-4 " style="background-color: lightgrey;">
                    <div class="col-12 col-lg-6 rounded-3 border border-2 border-primary offset-lg-3 mt-3">
                        <div class="row text-center">
                            <h2 class="mt-1 text-primary">Teacher's Page</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 rounded-3  offset-lg-3 mt-3">
                        <div class="row text-center">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="d-flex flex-column align-items-center ">
                                   
                                        <div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                                            <img src="image/userpro.svg" width="90px" height="70px" class="rounded-circle" id="viewimg">
                                        </div>

                                    



                                    <br>
                                    <span class="badge bg-success fs-6">Active</span>
                                    <span class="fw-bold fs-4">sadeeptha lakindu</span>
                                    <span class="fw-bold  fs-5 text-black-50">sadeepthalakindu18@gmail.com</span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-12 offset-lg-1 mb-3">
                        <div class="row text-center">
                            <div class="col-12 col-lg-5 rounded-3 border border-2 border-dark offset-lg-1 mt-3">
                                <span class="fw-bold fs-4 border-bottom border-2 border-dark">Add New Assigmets</span>
                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Subject :</label>
                                        <select class="form-select" id="subject">
                                            <option value="0" class="form-control">Select Subject</option>
                                            <?php
                                            $subject_rs = Database::search("SELECT * FROM `subject`");
                                            $subject_num = $subject_rs->num_rows;
                                            for ($x = 0; $x < $subject_num; $x++) {
                                                $subject_data = $subject_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $subject_data["sub_id"] ?>" class="form-control"><?php echo $subject_data["sub_name"] ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>

                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Grade :</label>
                                        <select class="form-select" id="grade">
                                            <option value="0" class="form-control">Select Grade</option>
                                            <?php
                                            $grade_rs = Database::search("SELECT * FROM `grade`");
                                            $grade_num = $grade_rs->num_rows;
                                            for ($x = 0; $x < $grade_num; $x++) {
                                                $grade_data = $grade_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $grade_data["grade_id"] ?>" class="form-control"><?php echo $grade_data["grade_name"] ?></option>
                                            <?php
                                            }
                                            ?>



                                        </select>
                                    </div>
                                </div>

                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Teacher :</label>
                                        <input type="text" class="border-0 fw-bold text-primary" value="sadeeptha lakindu" readonly  id="email">
                                    </div>
                                </div>

                                
                                <button class="btn btn-success mt-3 mb-3" onclick="assiment();">Add Assiment</button>
                                

                                </button>
                                <!-- modal -->
                                <div class="modal fade" id="assiment" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Add Assigmets</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-3">
                                                    <label for="fname" class="form-label">Assiment Name</label>
                                                    <input type="text" class="form-control" id="Assiname" placeholder="Assiname">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="lname" class="form-label">Assiment Id</label>
                                                    <input type="text" class="form-control" id="Assiid" placeholder="Assiid">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="mobile" class="form-label">Start Date</label>
                                                    <input type="date" class="form-control" id="sd" placeholder="sd">
                                                </div>
                                                <div class="mt-3">

                                                    <label for="email" class="form-label">End Date</label>
                                                    <input type="date" class="form-control" id="ed" placeholder="ed">
                        
                                                </div>
                                                <div class="mt-3">

                                                <div class="row mt-2">
                                            <div class="col-6">
                                                <span >Choose File</span>
                                                <input type="file" class="form-control" id="pf">
                                            </div>
                                        </div>
                        
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" onclick="uploadassiment();">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->
                            </div>

                            <div class="col-12 col-lg-5 rounded-3 border border-2 border-dark offset-lg-1 mt-3">
                                <span class="fw-bold fs-4 border-bottom border-2 border-dark">Add Lesson Notes</span>
                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Subject :</label>
                                        <select class="form-select" id="subject1">
                                            <option value="0" class="form-control">Select Subject</option>
                                            <?php
                                            $subject_rs = Database::search("SELECT * FROM `subject`");
                                            $subject_num = $subject_rs->num_rows;
                                            for ($x = 0; $x < $subject_num; $x++) {
                                                $subject_data = $subject_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $subject_data["sub_id"] ?>" class="form-control"><?php echo $subject_data["sub_name"] ?></option>
                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>

                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Grade :</label>
                                        <select class="form-select" id="grade1">
                                            <option value="0" class="form-control">Select Grade</option>
                                            <?php
                                            $grade_rs = Database::search("SELECT * FROM `grade`");
                                            $grade_num = $grade_rs->num_rows;
                                            for ($x = 0; $x < $grade_num; $x++) {
                                                $grade_data = $grade_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $grade_data["grade_id"] ?>" class="form-control"><?php echo $grade_data["grade_name"] ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-10 offset-1">
                                    <div class="row text-start">
                                        <label class="form-label mt-3 fw-bold fs-5 text-start">Teacher :</label>
                                        <input type="text" class="border-0 fw-bold text-primary" value="sadeptha lakindu"  id="email1" readonly>
                                    </div>
                                </div>

                                
                                <label for="proimg" class="btn btn-success mt-3 mb-3" onclick="addlessonnote();">Add Lesson Notes</label>
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="lessonnote" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Add Lesson Notes</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-3">
                                                    <label for="fname" class="form-label">Lesson Name</label>
                                                    <input type="text" class="form-control" id="lessname1" placeholder="Lesson Name">
                                                </div>
                                                
                                                <div class="mt-3">

                                                <div class="row mt-2">
                                            <div class="col-6">
                                                <span >Choose File</span>
                                                <input type="file" class="form-control" id="pf1">
                                            </div>
                                        </div>
                        
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" onclick="uploadlessnote();">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->
                        </div>
                    </div>

                    <div class="col-lg-8 col-12 offset-lg-2 mb-3 ">
                        <div class="row text-center">
                            <div class="col-6 col-lg-4 rounded-3  offset-lg-1 mt-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body " style="background-color: rgb(172, 67, 67);">
                                        <h5 class="card-title fw-bold ">View Submitted Answersheets</h5>
                                        <h6 class="card-subtitle mb-2  text-light ">Student Answers</h6>


                                        <a href="viewsubmitanswersheets.php" class="text-decoration-none text-warning">Click to View</a>

                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-4 rounded-3  offset-lg-2 mt-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body " style="background-color: rgb(172, 67, 67);">
                                        <h5 class="card-title fw-bold ">Add Assigmets</h5>
                                        <h5 class="card-title fw-bold "> Marks</h5>
                                        <h6 class="card-subtitle mb-2  text-light ">Student Assiment</h6>


                                        <a href="addAssimentMark.php" class="text-decoration-none text-warning">Click to View</a>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php

    ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    </body>

</html>