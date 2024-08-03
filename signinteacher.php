<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teachers Login</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="style.css" />

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
                        <p class="text-center fw-bold">Sandeeu Education</p>
                    </div>

                    <div class="col-12">
                        <p class="text-center t1 fw-bold">Hi, Welcome Sandeeu Education</p>
                    </div>

                </div>

            </div>
            <!-- head -->
            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6  d-lg-block background1"></div>



                    <div class="col-12 col-lg-6" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="t2 mb-0">Sign In</p>
                                <p class="t2 fs-5 mt-0">for Teachers</p>

                                <span class="text-danger" id="msg2"></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email2" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password2" />
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
                            <div class="col-12 col-lg-12 d-grid">
                                <a href="teacherhome.php" class="btn btn-success">Sign In</a> 
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>