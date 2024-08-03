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

<body class="bg-dark">
    <div class="container-fluid">
        <div class="row">
<?php
session_start();
require "connection.php";
if (isset($_SESSION["a"])) {
    $admin = $_SESSION["a"];
?>
            <div class="col-12 c">
                <div class="row">

                    <div class="col-6 col-lg-3">
                        <div class="row">
                            <div class="col-2 icon"></div>

                            <span class="col-5 col-lg-5 text-white mt-3 offset-lg-0 text-start fs-5 fw-bold"> Sandeeu edu</span>
                        </div>
                    </div>

                    <div class="col-6 col-lg-5 mt-2 offset-lg-1">
                        <div class="row">
                            <input class="col-7 col-lg-8 border rounded-2" placeholder="Search" type="text">
                            <button class="btn btn-dark col-4 col-lg-2 ms-1 ">Search</button>

                        </div>
                    </div>



                    <div class="offset-lg-1 col-lg-1 mt-1 user d-none d-lg-block d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Profile"></div>

                    <div class="col-12 col-lg-1  mt-2 d-none d-lg-block">
                        <div class="row">
                            <div class=" dropdown ">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Profile
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="aprofile.php">Edit Profile</a></li>
                                    <li><a class="dropdown-item" onclick="signout();" href="#">Log Out</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="offset-lg-2 col-12 col-lg-8 bg-light mt-4 rounded-5">
                <div class="row text text-center">
                    <label class="fw-bold fs-2">Admin Dashbroad</label>
                </div>
            </div>


            <div class="col-12 mt-4 ">
                <div class="row">

                    <div class="col-12 col-lg-3 light ms-lg-4 rounded-4">
                        <div class="row text-center">
                            <h3 class="mt-1 fw-bold">Action</h3>
                            <hr class="col-10 offset-1 bg-dark" style="height: 5px;">
                        </div>

                        <div class="col-lg-8 offset-2 d-none d-lg-block mb-3 rounded-4">
                            <div class="row text-center">
                                <div class="card" style="width: 18rem;">
                                    <img src="image/userpro.svg" class="card-img-top mt-2" style="height: 100px;">
                                    <div class="card-body">
                                    <span class="card-text fw-bold fs-5"><?php echo $admin["fname"]." ".$admin["lname"]; ?></span>
                                        <span class="card-text  fs-6"><?php echo $admin["email"]?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 ms-lg-1 mb-4">
                            <div class="row">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active fs-4 rounded-2"><i class="bi bi-speedometer2 fw-bold  fw-bolder fs-4 me-2"></i> Dashbroad</a>
                                    <a href="chat.php" class="list-group-item list-group-item-action fs-4 mt-1 border border-dark rounded-2"><i class="bi bi-person-lines-fill fw-bold  fw-bolder fs-4 me-2"></i> Manage Administration</a>
                                    <a href="manageteachers.php" class="list-group-item list-group-item-action fs-4 mt-1 border border-dark rounded-2"><i class="bi bi-people-fill fw-bold  fw-bolder fs-4 me-2"></i> Manage Teachers</a>
                                    
                                    <a href="managestudent.php" class="list-group-item list-group-item-action fs-4 mt-1 border border-dark rounded-2"><i class="bi bi-person-video fw-bold  fw-bolder fs-4 me-2"></i> Manage Students</a>
                                    <a href="checkresault.php" class="list-group-item list-group-item-action fs-4 mt-1 border border-dark rounded-2"><i class="bi bi-book-half fw-bold  fw-bolder fs-4 me-2"></i> Check Results</a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 light ms-lg-5 rounded-4">
                        <div class="row">
                            <div class="col-12 ms-0" style="margin-top: 120px;">
                                <div class="row justify-content-center text-center ">

                                    <div class="col-6 col-lg-3">
                                        <div class="card" style="width: 15rem;">
                                            <img src="image/student.svg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Number of Students Learn in Our Education Center</p>
                                            </div>

                                        </div>
                                        <label class="form-control mt-2 fw-bold fs-5" style="width: 15rem;">3000</label>
                                    </div>

                                    <div class="col-6 col-lg-3 ">
                                        <div class="card" style="width: 15rem;">
                                            <img src="image/teacher.svg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Number of Teacher Teach in Our Education Center</p>
                                            </div>
                                        </div>
                                        <label class="form-control mt-2 fw-bold fs-5" style="width: 15rem;">50</label>
                                    </div>

                                    <div class="col-6 col-lg-3">
                                        <div class="card" style="width: 15rem;">
                                            <img src="image/classroom.svg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Number of book in Our Education Center</p>
                                            </div>
                                        </div>
                                        <label class="form-control mt-2 fw-bold fs-5" style="width: 15rem;">50</label>
                                    </div>

                                    <div class="col-6 col-lg-3">
                                        <div class="card" style="width: 15rem;">
                                            <img src="image/acdemicofficers.svg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Number of classes in Our Education Center</p>
                                            </div>
                                        </div>
                                        <label class="form-control mt-2 fw-bold fs-5" style="width: 15rem;">40</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-10 bg-light offset-lg-1 mt-3 rounded-3  mb-3">
                <div class="row text-center  justify-content-center">
                    <label class="fs-4 rounded-5 light col-6 mt-2">Class Details (latest)</label>

                    <div class="col-12 mt-3 fw-bold mb-2">
                        <div class="row">

                            <table class="table table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th scope="col" class="fs-4">#</th>
                                        <th scope="col" class="fs-4">Subject</th>
                                        <th scope="col" class="fs-4">Teacher</th>
                                        <th scope="col" class="fs-4">Participate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="fs-5">1</th>
                                        <td class="fs-5">Sinhala</td>
                                        <td class="fs-5">Mr. Gayan</td>
                                        <td class="fs-5">100 Students</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="fs-5">2</th>
                                        <td class="fs-5">Maths</td>
                                        <td class="fs-5">Mr. Lakindu</td>
                                        <td class="fs-5">300 Students</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="fs-5">3</th>
                                        <td class="fs-5">English</td>
                                        <td class="fs-5">Miss. Anuradi</td>
                                        <td class="fs-5">80 Students</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-10 bg-light offset-lg-1 mt-3 rounded-3  mb-3">
                <div class="row text-center  justify-content-center">
                    <label class="fs-4 rounded-5 light col-6 mt-2">Payment Details</label>

                    <div class="col-12 mt-3 fw-bold mb-2 ">
                        <div class="row">

                            <div class="col-12 col-lg-3 ">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Monthly Income</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Students Fees</h6>
                                        <p class="card-text">Rs. 650 000 .00</p>
                                        <button class="btn btn-outline-danger">Checked</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Teachers Payment</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Teachers Salery</h6>
                                        <p class="card-text">Rs. 150 000 .00</p>
                                        <button class="btn btn-outline-danger">Checked</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Other Payment</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Bill Payments</h6>
                                        <p class="card-text">Rs. 50 000 .00</p>
                                        <button class="btn btn-outline-danger">Checked</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Monthly Profit</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">net</h6>
                                        <p class="card-text">Rs. 450 000 .00</p>
                                        <button class="btn btn-outline-danger">Checked</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
<!-- footer -->

<div class="col-12">
                    <p class="text-center text-white">&copy; 2022 EDU_GURU.lk || All Right Reserved</p>
                </div>

                <!-- footer -->
        </div>
    </div>

<?php
}else{
   
    
     header("Location:adminsignin.php");

    
}
?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>