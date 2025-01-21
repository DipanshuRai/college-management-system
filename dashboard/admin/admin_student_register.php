<?php include './backend/admin_student_register.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Register - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myStyle.css">
    <link rel="shortcut icon" href="../assets/images/favicon1.png" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>
<body>
    <div class="container-scroller">
        <?php include './navbar.php' ?>  
        <div class="container-fluid page-body-wrapper">
            <?php include './sidebar.php' ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-account-plus"></i>
                            </span> Register
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-description"> Student Information</h3>
                                    <form class="admin_register.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 col-form-label">Father's Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="rollno" class="col-sm-3 col-form-label">Roll Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="dob" class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="dob" name="dob" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="pass" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="pass" name="pass" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="branch" class="col-sm-3 col-form-label">Branch</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="branch" name="branch" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="semester" name="semester" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="emailID" class="col-sm-3 col-form-label">Email ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="emailID" name="emailID" aria-describedby="emailHelp" placeholder="example@iiitg.ac.in">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="roomNumber" class="col-sm-3 col-form-label">Room Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="roomNumber" name="roomNumber" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="spnumber" class="col-sm-3 col-form-label">Phone Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="spnumber" name="spnumber" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fpnumber" class="col-sm-3 col-form-label">Father's Phone Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="fpnumber" name="fpnumber" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                        <h4 class="card-description"> Address </h4>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="pinCode" class="col-sm-3 col-form-label">Pin Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="pinCode" name="pinCode" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="city" class="col-sm-3 col-form-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="state" class="col-sm-3 col-form-label">State</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-center">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © College Management System 2024</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
</body>
</html>