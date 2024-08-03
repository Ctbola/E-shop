<?php
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Student Login | Sandeeu edu</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="image/2.png" />
</head>

<body class="set">
    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- head -->
            <div class="col-12 container ">
                <div class="row">
                    <div class="col-12">
                        <div class="logo"></div>
                        <p class="text-center fw-bold fs-3 outline opacity-75" style="color: black; background-color: white;">Sandeeu Education</p>
                    </div>

                    <!-- <div class="col-12">
                        <p class="text-center t1">Hi, Welcome Sandeeu Education</p>
                    </div> -->

                </div>

            </div>
            <!-- head -->

            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6  d-lg-block background"></div>
                    <div class="col-12 col-lg-6" id="signUpBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="t2 mb-0">Create New Account</p>
                                <p class="t2 fs-5 mt-0">for Student</p>
                            </div>
                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                    </i>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" class="form-control" id="f" />
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" class="form-control" id="l" />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="e" />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="p" />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Mobile</label>
                                <input type="text" class="form-control" id="m" />
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Grade</label>
                                <select class="form-select" id="gr">
                                    <option value="0">Select Grade</option>
                                    <?php
                                    $grade_rs = Database::search("SELECT * FROM `grade`");
                                    $grade_num = $grade_rs->num_rows;

                                    for ($x = 0; $x < $grade_num; $x++) {
                                        $grade_data = $grade_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo$grade_data["id"]; ?>"><?php echo$grade_data["grade"]; ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Gender</label>
                                <select class="form-select" id="g">
                                    <option value="0">Select Gender</option>
                                    <?php
                                    $gender_rs = Database::search("SELECT * FROM `gender`");
                                    $gender_num = $gender_rs->num_rows;

                                    for ($x = 0; $x < $gender_num; $x++) {
                                        $gender_data = $gender_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo$gender_data["id"]; ?>"><?php echo$gender_data["gender_name"]; ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-success" onclick="signUp();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-secondary" onclick="changeView();">Sign In</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-6 d-none" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="t2 mb-0">Sign In</p>
                                <p class="t2 fs-5 mt-0">for Student</p>
                                <span class="text-danger" id="msg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="email2" value="<?php echo $email; ?>"/>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password2" value="<?php echo $password; ?>"/>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="remember">
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary" onclick="forgotpassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-success" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-warning" onclick="changeView();">Create New Account</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- modal -->

            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                            <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc"/>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-success" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

        </div>
    </div>



    </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>