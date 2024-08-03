<!DOCTYPE html>
<html lang="en">
<head>
<title>My Cart | Sandeeu edu</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="image/2.png" />
</head>
<body>
<div class="container-fluid">
        <div class="row">

            <?php 
            require "connection.php";
            include "header.php";

            

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];


                $total = 0;
                $subtotal = 0;
                $shipping = 0;

            ?>

                <hr />

                <div class="col-12 pt-3" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 border border-1 border-primary rounded mb-3">
                    <div class="row">

                        <div class="col-12  mt-2">
                            <label class="form-label fs-1 fw-bolder">Cart <i class="bi bi-cart4 fs-1 text-primary"></i></label>
                        </div>

                        <div class="col-10">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Cart..." />
                                </div>
                                <div class="col-12 col-lg-2 d-grid mb-3">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <?php

                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email` = '" . $email . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {

                        ?>

                            <!-- Empty View -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold">
                                            You have no items in your Cart yet.
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                        <a href="home.php" class="btn btn-outline-primary fs-3 fw-bold">Go Your Class Dashboard</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Empty View -->

                        <?php

                        } else {

                        ?>

                            <!-- products -->

                            <div class="col-12 col-lg-9">
                                <div class="row">

                                    <?php

                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `lesson` WHERE `id` = '" . $cart_data["lesson_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"]);

                                        

                                        $seller_rs = Database::search("SELECT * FROM `teacher` WHERE `email` = '" . $product_data["teacher_email"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                                    ?>

                                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5">Teacher :</span>&nbsp;
                                                            <span class="fw-bold text-black fs-5"><?php echo $seller; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-4">

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["lesson_description"]; ?>" title="Lesson Details">

                                                        

                                                        <img src="resource/f/a.jpg" class="img-fluid rounded-start" style="max-width: 200px;">
                                                    </span>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title fw-bold"><?php echo $product_data["lesson_name"]; ?></h3>

                                                        

                                                        
                                                        
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                        <span type="number" class="mt-3 fs-4 fw-bold px-3 cardqtytext" >1</span> 
                                                        <br><br>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        
                                                        <a href='<?php echo "joinprocess.php?id=".$product_data["id"]; ?>' class="btn btn-outline-success mb-2">JOIN </a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);">Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs.
                                                                <?php echo ($product_data["price"])?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>

                            <!-- products -->

                            <!-- Summary -->

                            <div class="col-12 col-lg-3">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summary</label>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-6 mb-3">
                                        <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                    </div>

                                    <div class="col-6 text-end mb-3">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                    </div>

                                    

                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>

                                    <div class="col-6 mt-2">
                                        <span class="fs-4 fw-bold">Total</span>
                                    </div>

                                    <div class="col-6 mt-2 text-end">
                                        <span class="fs-4 fw-bold">Rs. <?php echo ($total); ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn btn-primary fs-5 fw-bold">CHECKOUT</button>
                                    </div>

                                </div>
                            </div>

                            <!-- Summary -->

                        <?php

                        }

                        ?>

                    </div>
                </div>

            <?php

            } else {
                echo ("Please Sign In or Register");
            }

            ?>

            <?php include "footer.php" ?>

        </div>
    </div>

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