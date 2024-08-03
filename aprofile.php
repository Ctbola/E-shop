<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title> Sadeeu edu | E - edu</title>
    <link rel="icon" href="image/2.png" />
</head>

<body>

<?php 
session_start();
require "connection.php";
if(isset($_SESSION["a"])){
?>
<div class="container-fluid">
        <div class="row">
        <nav class="nav text-bg-dark text-white">
                    <a class="nav-link text-white" href="admindash.php">Dashbroad /</a> 
                    <a class="nav-link active text-white" aria-current="page" href="#">My Profile</a>
                </nav>
            <div class="col-12  ">
                <div class="row">

                    <div class="col-12 col-lg-8 bg-body  rounded mt-4 mb-4 bg-secondary">
                        <div class="row g-2">

                            <div class="col-lg-10  offset-lg-4">
                                <div class="d-flex flex-column align-items-center text-center ">

                                    <div class="col-12 col-lg-1 mt-2 mb-2 text-center">
                                        <img src="image/userpro.svg" width="90px" height="70px" class="rounded-circle">
                                    </div>




                                    <br>
                                    <span class="fw-bold"><?php echo $_SESSION["a"]["fname"]." ".$_SESSION["a"]["lname"];?></span>
                                    <span class="fw-bold text-black-50"><?php echo $_SESSION["a"]["email"]?></span>
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


                                    <div class="row mt-4 g-2">
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-label fw-bold"> Name</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <div class="col-6 mt-3">
                                                    <input type="text" class="form-control" id="fname" placeholder="First Name" value="<?php echo $_SESSION["a"]["fname"]?>">
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $_SESSION["a"]["lname"]?>">
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-12 mt-4">
                                            <div class="row">
                                                <label class="form-label fw-bold">Code</label>
                                                <hr style="width: 90%;" class="bg-danger">
                                                <div class="input-group mt-3">
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION["a"]["code"]?>" disabled aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                    <input type="text" class="form-control" placeholder="Email" value="<?php echo $_SESSION["a"]["email"]?>" readonly>
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
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>

    

    





    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>