<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Profile | Sandeeu edu</title>
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
        $email = $_SESSION["u"]["email"];
    ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 ">
                    <div class="row">

                        <div class="col-12 col-lg-8 bg-body rounded mt-4 mb-4 bg-secondary">
                            <div class="row g-2">

                                <div class="col-lg-10  offset-lg-4">
                                    <div class="d-flex flex-column align-items-center text-center ">
                                        <?php
                                        $profile = Database::search("SELECT * FROM `profile_image` WHERE `users_email` = '" . $_SESSION["u"]["email"] . "' ");

                                        $profile_num = $profile->num_rows;

                                        if ($profile_num == 1) {
                                            $profile_data = $profile->fetch_assoc();
                                        ?>
                                            <div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                                                <img src="<?php echo $profile_data["path"]; ?>" width="90px" height="70px" class="rounded-circle">
                                            </div>

                                        <?php

                                        } else {

                                        ?>
                                            <div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                                                <img src="resource/profile_img/profile_img.svg" width="90px" height="70px" class="rounded-circle">
                                            </div>

                                        <?php

                                        }

                                        ?><br>
                                        <span class="fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>
                                        <input type="file" class="d-none" id="proimg" accept="image/*">
                                        <label for="proimg" class="btn btn-primary mt-5" onclick="proImage();">Update Profile Image</label>
                                        <button class="btn btn-outline-success mt-2" onclick="imagesave();">Save</button>

                                        <hr>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-3">
                                    <hr>
                                </div>

                                <div class=" col-12 border-end border-start offset-lg-3">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3 offset-lg-5">
                                            <h4 class="fw-bold fs-3 text-primary">Personal Details</h4>

                                        </div>
                                        <?php
                                        $user_details = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON `gender`.id = `users`.gender_id INNER JOIN `grade` ON `grade`.id = `users`.grade_id WHERE `email` ='" . $email . "'");
                                        $user_data = $user_details->fetch_assoc();
                                        ?>

                                        <div class="row mt-4 g-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label fw-bold"> Name</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="col-6 mt-3">
                                                        <input type="text" class="form-control" id="fname" placeholder="First Name" value="<?php echo $user_data["fname"]; ?>">
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $user_data["lname"]; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <label class="form-label fw-bold">Mobile</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="col-12  mt-3">
                                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" value="<?php echo $user_data["mobile"]; ?>">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <label class="form-label fw-bold">Password</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="input-group mt-3">
                                                        <input type="password" class="form-control" value="<?php echo $user_data["password"]; ?>" disabled aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <span class="input-group-text bg-primary" id="basic-addon2">
                                                            <i class="bi bi-eye-slash-fill"></i>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="col-12  mt-3">
                                                        <input type="text" class="form-control" placeholder="Email" value="<?php echo $user_data["email"]; ?>" readonly>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <label class="form-label fw-bold">Gender</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="col-12  mt-3">
                                                        <input type="text" class="form-control" placeholder="Gender" value="<?php echo $user_data["gender_name"]; ?>" readonly>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <label class="form-label fw-bold">Grade</label>
                                                    <hr style="width: 90%;" class="bg-danger">
                                                    <div class="col-12  mt-3">
                                                        <input type="text" class="form-control" placeholder="Grade" value="<?php echo $user_data["grade"]; ?>" readonly>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-12 mt-4 ">
                                                <div class="row  justify-content-center">
                                                    <button class="col-3 btn btn-outline-success" onclick="saveprofiledetails();">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="offset-lg-3">
                                <div class=" col-12 border-end border-start offset-lg-3">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3 offset-lg-5">
                                            <h4 class="fw-bold fs-3 text-primary">Adderss Details</h4>
                                        </div>
                                        <?php
                                        $add_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON `city`.id = `user_has_address`.city_id INNER JOIN `district` ON district.id = city.district_id INNER JOIN `province` ON  `province`.id = `district`.province_id WHERE `users_email`='" . $email . "' ");
                                        $add_data = $add_rs->fetch_assoc();
                                        $add_num = $add_rs->num_rows;

                                        ?>
                                        <div class="col-12 mt-4">
                                            <div class="row">
                                                <label class="form-label fw-bold">Adderss</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <?php
                                                if (!empty($add_data["line1"])) {
                                                ?>
                                                    <div class="col-6">
                                                        <label class="form-label fw-bold">Adderss Line 1</label>
                                                        <input type="text" class="form-control" value="<?php echo ($add_data["line1"]); ?> " id="line1" placeholder="line 01">
                                                    </div>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-6">
                                                        <label class="form-label fw-bold">Adderss Line 1</label>
                                                        <input type="text" class="form-control" id="line1" placeholder="line 01">
                                                    </div>

                                                    <?php
                                                }

                                                    ?><?php
                                                if (!empty($add_data["line2"])) {
                                                ?>


                                                    <div class="col-6">
                                                        <label class="form-label fw-bold">Adderss Line 2</label>
                                                        <input type="text" class="form-control" value="<?php echo ($add_data["line2"]); ?>" id="line2" placeholder="line 02">
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-6">
                                                        <label class="form-label fw-bold">Adderss Line 2</label>
                                                        <input type="text" class="form-control" id="line2" placeholder="line 02">
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>




                                        <?php


                                        $province_rs = Database::search("SELECT * FROM `province`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        $city_rs = Database::search("SELECT * FROM `city`");

                                        ?>
                                        <div class="col-8 mt-4 offset-2">
                                            <div class="row ">
                                                <label class="form-label fw-bold">City</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>
                                                    <?php


                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($city_data["id"]); ?>" <?php
                                                                                                            if (!empty($add_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $add_data["city_id"]) {
                                                                                                            ?> selected <?php
                                                                                                                                }
                                                                                                                            }
                                                                                                                                    ?>><?php echo $city_data["name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-8 mt-4 offset-2">
                                            <div class="row ">
                                                <label class="form-label fw-bold">District</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <select class="form-select" id="district">
                                                    <option value="0">Select District</option>
                                                    <?php
                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($district_data["id"]); ?>" <?php
                                                                                                                if (!empty($add_data["district_id"])) {
                                                                                                                    if ($district_data["id"] == $add_data["district_id"]) {
                                                                                                                ?> selected <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>><?php echo $district_data["name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-8 mt-4 offset-2">
                                            <div class="row ">
                                                <label class="form-label fw-bold">Province</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <select class="form-select" id="province">
                                                    <option value="0">Select Province</option>
                                                    <?php
                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo ($province_data["id"]); ?>" <?php
                                                                                                                if (!empty($add_data["province_id"])) {
                                                                                                                    if ($province_data["id"] == $add_data["province_id"]) {
                                                                                                                ?> selected <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>><?php echo $province_data["name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-8 mt-4 offset-2">
                                            <div class="row ">
                                                <label class="form-label fw-bold">Postal Code</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <?php
                                                if (!empty($add_data["postal_code"])) {
                                                ?>
                                                    <div class="col-12">

                                                        <input type="text" class="form-control" value="<?php echo ($add_data["postal_code"]); ?>" id="pcode">
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-12">

                                                        <input type="text" class="form-control" id="pcode">
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>







                                        <div class="col-12 mt-4 ">
                                            <div class="row  justify-content-center">
                                                <button class="col-3 btn btn-outline-success" onclick="saveprofiledetails();">Save</button>
                                            </div>
                                        </div>







                                    </div>

                                </div>
                                <hr class="offset-lg-3">
                            </div>

                        </div>
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

    <?php include "footer.php" ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>