<?php include './backend/dashboard_student.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="../assets/images/favicon1.png" />
</head>
<body>
  <div class="container-scroller">
    <?php include 'navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Complains Detail <i class="mdi mdi-book-open mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php
                    echo "<div>" . "- Total Complains : $totalComplain" . "</div>";
                    echo "<div>" . "- Total Resolved : $totalResolved" . "</div>";
                    echo "<div>" . "- Total Unresolved : $totalUnresolved" . "</div>";
                    ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Attendance <i class="mdi mdi-percent mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php
                    if (empty($attendance_percentages)) {
                      echo "No course enrolled";
                    } 
                    else {
                      foreach ($attendance_percentages as $course => $percent) {
                        echo "<div>" . "- " . $course . " : " . $percent . "</div>";
                      }
                    }
                    ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Library Details <i class="mdi mdi-library mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php
                    echo "<div>" . "- Total book issed : $totalBookIssued" . "</div>";
                    echo "<div>" . "- Total fine : $totalFine" . "</div>";
                    echo "<div>" . "- Total fine paid : $totalFinePaid" . "</div>";
                    ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h3 class="card-description"> Personal Information</h3>
                <form class="form-sample">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="n65sag" value="<?php echo $_SESSION['name']; ?>" readonly>
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
  <!-- <script src="../assets/vendors/chart.js/Chart.min.js"></script> -->
  <!-- <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- <script src="../assets/js/off-canvas.js"></script> -->
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <!-- <script src="../assets/js/dashboard.js"></script> -->
  <!-- <script src="../assets/js/todolist.js"></script> -->
</body>
</html>