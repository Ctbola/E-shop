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
                    <label class="form-label text-primary fw-bold fs-1">My Payments</label>
                </div>

                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3 mt-3">
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-3 d-grid">
                                    <button class="btn btn-warning">Search</button>
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
                            <span class="fs-4 fw-bold text-white ">Start date</span>
                        </div>
                        <div class="col-4 col-lg-3 d-lg-block bg-light py-2 border-end border-dark">
                            <span class="fs-4 fw-bold ">End date</span>
                        </div>
                        <div class="col-4 col-lg-2  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                            <span class="fs-4 fw-bold text-white ">Price</span>
                        </div>
                        
                    </div>
                </div>


                
                    <div class="col-12 mt-1  border border-dark mb-3">
                        <div class="row text-center">
                            <div class="col-2 col-lg-1  py-2 text-end border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white">1</span>
                            </div>
                            <div class="col-2 d-none d-lg-block bg-light py-2 border-end border-dark">
                                <span class="fs-4 fw-bold text-black">Maths</span>
                            </div>
                            <div class="col-4 col-lg-2  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white ">2023.01.25</span>
                            </div>
                            <div class="col-4 col-lg-3 d-lg-block bg-light py-2 border-end border-dark">
                                <span class="fs-4 fw-bold ">2023.02.25</span>
                            </div>
                            <div class="col-4 col-lg-2  py-2 border-end border-dark" style="background-color: rgb(147, 199, 229);">
                                <span class="fs-4 fw-bold text-white ">Rs.1500.00</span>
                            </div>
                            <div class="col-1 col-lg-1 bg-light py-2 d-grid">

                            <span class="fs-4 fw-bold text-success ">Success</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-1 mb-3">
                        <div class="row text-center">
                           <div class="col-12 fw-bold fs-4 text-primary mt-5">
                            Add Bank Payment Slip
                           </div>
                           <input type="file" class="d-none" id="proimg" accept="image/*">
                           <label for="proimg" class="btn btn-outline-success mt-3 col-2 offset-5" onclick="proImage();">Update Slip</label>
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