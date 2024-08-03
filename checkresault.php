<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Admin | Manage Student</title>
    <link rel="icon" href="image/2.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-11 ms-lg-5 ">
                <div class="row ">
                    <label class="form-label fs-2 fw-bold offset-5 mt-3">Student Results</label>
                    <table class="table mt-3">
                    <div class="row text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-4">#</th>
                                <th scope="col" class="fs-4">Resault</th>
                                <th scope="col" class="fs-4">Mark</th>
                                <th scope="col" class="fs-4">Comment</th>
                                
                                
                                
                                
                            </tr>
                        </thead>
                        <?php
                        session_start();
                        require "connection.php";
                            $less_rs = Database::search("SELECT * FROM `mark`");
                            $less_num =$less_rs->num_rows;
                            for($x=0;$x<$less_num;$x++){
                                $less_data=$less_rs->fetch_assoc();
                                ?>
                                <tr>
                                <th scope="row"><?php echo $x+1 ?></th>
                                <td class="fs-5"><?php echo $less_data["marks"] ?></td>
                                <td class="fs-5"><?php echo $less_data["mark"] ?></td>
                                <td class="fs-5"><?php echo $less_data["comment"] ?></td>
                                <td class="fs-5"><button class=" btn btn-success">Checked</button></td>
                                
                            </tr>
                                <?php
                            }
                            ?>
                            
                            </div>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>