<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Sandeeu edu | Admin Signin</title>
    <link rel="icon" href="image/2.png" />
</head>

<body class="bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4 rounded-4 blue" style="margin-top: 100px;">
                <div class="row text-center">
                    <label class="col-12 text-light fs-2 fw-bold mt-2 mb-2">Sandeeu edu</label>
                    <p class="text-white fs-5">The best online educatin platform</p>
                </div>
            </div>

            <div class="col-12 col-lg-8 bg-info offset-lg-2 rounded-4 bg-opacity-50  " id="signin" style="margin-top: 100px;">
                <div class="row text-center">
                    <div class="col-12 col-lg-10 offset-lg-1 mt-2 ">
                        <div class="row text-start">
                            <label class="form-label text-black fw-bold fs-5">Email :</label>
                            <input type="text" class="form-control border-1 border-dark mt-3" id="email">
                        </div>
                    </div>

                    

                    <div class="col-12 col-lg-10 offset-lg-1 mt-2 mb-2 ">
                        <div class="row text-center">
                            <button class="btn btn-primary border-dark col-6 offset-3 mt-5 mb-2 fw-bold" onclick="sendcode();">Send Code</button>
                            
                        </div>
                    </div>
                
                </div>
            </div>

            <div class="col-12 col-lg-8 bg-info offset-lg-2 rounded-4 bg-opacity-50 d-none   " id="signin1" style="margin-top: 100px;">
                <div class="row text-center">
                    <div class="col-12 col-lg-10 offset-lg-1 mt-2 ">
                        <div class="row text-start">
                            <label class="form-label text-black fw-bold fs-5">Confirmation Code :</label>
                            <input type="text" class="form-control border-1 border-dark mt-3" id="concode">
                        </div>
                    </div>

                    

                    <div class="col-12 col-lg-10 offset-lg-1 mt-1 mb-2 ">
                        <div class="row text-center">
                            
                            <button class="btn btn-danger col-5 ms-5 mt-3 mb-3 " onclick="sendcode();">Resend code</button>
                            <button class="btn btn-warning col-5 ms-5 mt-3 mb-3 fw-bold" onclick="codeconfirm();" >Log Dashbroad</button>
                            
                        </div>
                    </div>
                
                </div>
            </div>


<!-- footer -->

<div class="col-12 fixed-bottom d-none d-lg-block">
                    <p class="text-center text-white">&copy; 2022 Sandeeuedu.lk || All Right Reserved</p>
                </div>

                <!-- footer -->

        </div>
    </div>

    <script src="script.js"></script>
</body> 

</html>