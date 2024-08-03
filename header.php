<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<link rel="icon" href="image/2.png" />
</head>

<body>




    <div class="col-12 border border-dark bg-opacity-10 text-black bg-info">
        <div class="row mt-0 mb-1">
            <?php
            session_start();
            if (isset($_SESSION["u"])) {
                $u = $_SESSION["u"];
                $profile = Database::search( "SELECT * FROM `profile_image` WHERE `users_email` = '".$u["email"]."' ");
                
                $profile_num =$profile->num_rows;

                if($profile_num == 1){
                    $profile_data =$profile->fetch_assoc();
?>
<div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                    <img src="<?php echo $profile_data["path"]; ?>" width="90px" height="70px" class="rounded-circle">
                </div>

<?php

                }else{

                    ?>
                    <div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                    <img src="resource/profile_img/profile_img.svg" width="90px" height="70px" class="rounded-circle">
                </div>

                    <?php

                }

            ?>
                
                <div class="col-12 col-lg-4 offset-3 offset-lg-0 align-self-start mt-3 ">
                    <span class="text-lg-start fs-5 "><b>Hello,</b><span class="fs-4 text-danger"> <?php echo $u["fname"] . " " . $u["lname"]; ?></span></span>
                    <br>
                    <span class="text-lg-start fw-bold fs-5">Student Email : <span class="fs-6 "><?php echo $u["email"] ?></span></span>

                </div>

            <?php
            } else {
            ?>
                <div class="col-12 col-lg-4  offset-lg-2 offset-1 align-self-start mt-3 ms-5">
                    <a href="signup.php" class="text-decoration-none text-danger btn btn-outline-secondary fw-bold fs-4" style="cursor: pointer;">Register Now</a>
                </div>
            <?php
            }
            ?>


            <div class=" col-12 col-lg-4 offset-3 offset-lg-2 text-lg-center  mt-4 ">


                <span class="d-inline-block " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Cart">
                <a href="cart.php"><i class="bi bi-cart4 fs-3 text-success me-5"></i></a> <b>|</b>
                </span>

                <span onclick="Logout();" class="d-inline-block ms-5 " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Logout">
                    <i class="bi bi-box-arrow-right text-danger fw-bold fs-3 me-5"></i> <b>|</b>
                </span>


                <span class="d-inline-block ms-5 " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="My Profile">
                    <a href="profile.php"><i class="bi bi-person-circle fs-3 text-black"></i></a>
                </span>


            </div>

            <div class="col-12 col-lg-1 offset-5 offset-lg-0 align-content-end  mt-4">


                <div class="dropdown">
                    <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu <i class="bi bi-list"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="myclasses.php">My Classes</a></li>
                        <li><a class="dropdown-item" href="exam.php">Exam</a></li>
                        <li><a class="dropdown-item" href="payment.php">Payment History</a></li>
                        <li><a class="dropdown-item" href="chat.php">Contact Admin</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

    



    </div>


    </div>


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