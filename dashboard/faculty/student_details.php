<?php include './backend/student_details.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myStyle.css">
    <link rel="shortcut icon" href="../assets/images/favicon1.png" />
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
                                <i class="mdi mdi-account"></i>
                            </span> Get Student Details
                        </h3>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action="" method="get">
                                    <div class="form-group row">
                                        <label for="ComplainDescription" class="col-sm-5 col-form-label">Roll Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rollno" placeholder="Enter roll number" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-gradient-primary me-2" name="submit">OK</button>
                                        </div>
                                    </div>
                                </form>
                                <?php if($flag==2){?>
                                <h3 class="card-description"> Student Information</h3>
                                <form class="form-sample">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="n65sag" value="<?php echo $sname; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Father's Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $fname ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Roll Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $roll_no ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Date of Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $dob ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Branch</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $branch ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Semester</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $semester ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email ID</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $email_id ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Room Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $room_no ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $s_pnumber ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Father's Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $f_pnumber ?>" readonly>
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
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $street_address ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pin Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $pin_code ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $city ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">State</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $state ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php }
                                if($flag==1)    
                                    echo "Invalid Roll Number"
                                ?>
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