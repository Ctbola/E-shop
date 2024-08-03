<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title> sandeeu edu | Manage Teachers </title>
    <link rel="icon" href="image/2.png" />
</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-10 rounded-3 bg-light offset-lg-1 mt-3">
                <div class="row justify-content-center">
                <nav class="nav text-bg-dark text-white rounded-3">
                    <a class="nav-link text-white" href="admindash.php">Dashbroad /</a> 
                    <a class="nav-link active text-white" aria-current="page" href="#">Manage Teachers</a>
                </nav>
                    <div class="col-12 col-lg-8  border border-1 border-dark rounded-3 mt-3">
                        <div class="row text-center">
                            <h2 class="fw-bold">Manage Teachers</h2>

                        </div>
                    </div>
                    <hr style="width: 80%; color: red;" class="mt-3 border border-1 border-danger">


                    <div class="col-12 col-lg-6 mt-3 border border-dark border-1 rounded-3 mb-3" style="background-color: white;">
                        <div class="row">
                            <h4 class="">Invite Teachers:-</h4>
                            <p class="text-primary">(Please Create Uniqe Username & Password to New Teacher)</p>
                            <div class="col-12 col-lg-10 rounded-3 offset-lg-1  border-1 border-danger">
                                <div class="row justify-content-center">
                                    <div class="col-10 mt-2">
                                        <label class="form-label fs-5">User Name :</label>
                                        <input type="text" class="form-control col-10" id="username">
                                    </div>
                                    <div class="col-10 mb-2 mt-2">
                                        <label class="form-label fs-5">Password :</label>
                                        <input type="text" class="form-control" id="password">
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold">Email : <label >(Enter Invite Email)</label></label>
                                <input type="text" class="form-control" id="email">
                            </div>

                            <div class="col-6 mt-3 mb-3 offset-lg-5">
                                <button class="btn btn-outline-success" onclick="invitationt();">Send Invitation</button>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 80%; color: red;" class="mt-3 border border-1 border-danger">
                    <div class="col-12 col-lg-10 mt-3 ">
                        <div class="row">
                            <h4 class="">Teachers Details:-</h4>
                        </div>

                        <div class="col-12" >
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fs-4">id</th>
                                            <th scope="col" class="fs-4">First</th>
                                            <th scope="col" class="fs-4">Last</th>
                                            <th scope="col" class="fs-4">Email</th>
                                            <th scope="col" class="fs-4">Subject</th>
                                            <th scope="col" class="fs-4">Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td class="fs-5 mt-1">gayan</td>
                                            <td class="fs-5 mt-1">sehantha</td>
                                            <td class="fs-5 mt-1">Sadeepthalakindu18@gmail.com</td>
                                            <td><select class="form-select">
                                                <option class="form-control">Select Subject</option>
                                                <option class="form-control">2</option>
                                                <option class="form-control">3</option>
                                            </select></td>
                                            <td><select class="form-select">
                                                <option class="form-control">Select Grade</option>
                                                <option class="form-control">2</option>
                                                <option class="form-control">3</option>
                                            </select></td>
                                            <td><button class="btn btn-outline-primary">Save</button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>