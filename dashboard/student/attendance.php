<?php include './backend/attendance.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Attendance - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="../assets/images/favicon1.png" />
</head>
<body>
  <div class="container-scroller">
    <?php include 'navbar.php' ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'sidebar.php' ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-history"></i>
              </span> Attendance History
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Courses Enrolled <i class="mdi mdi-book-multiple mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5">
                    <?php
                    if (count($data['courseData']) > 0) {
                      foreach ($data['courseData'] as $course)
                        echo "<div style='padding-left:30px;'>- " . $course["c_id"] . "</div>";
                    } 
                    else
                      echo "No course enrolled";
                    ?>
                  </h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Attendance <i class="mdi mdi-percent mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5">
                    <?php
                    if (count($data['courseData']) > 0) {
                      foreach ($data['courseData'] as $course)
                        echo "<div style='padding-left:30px;'>- " . $course["c_id"] . " : " . round($data['attendancePercentages'][$course['c_id']], 2) . "%</div>";
                    } 
                    else
                      echo "No course enrolled";
                    ?>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card" style="height: 110px;">
                <div class="card-body">
                  <form class="forms-sample" action="" method="get">
                    <div class="form-group row">
                      <label for="Category" class="col-sm-2 col-form-label ">Course</label>
                      <div class="col-sm-7">
                        <select class="form-control" id="category" name="category" required>
                          <option value="" disabled selected>Choose course</option>
                          <?php
                          foreach ($data['courseData'] as $course)
                            echo "<option value=" . $course["c_id"] . ">" . $course["c_id"] . " : " . $course["cname"] . "</option>";
                          ?>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-gradient-primary me-2" name="submit">OK</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                      <i class="mdi mdi-account-outline icon-sm me-2"></i>
                      <span><?php echo $_GET['category'] ?? '' ?></span>
                    </div>
                  </div>
                  <form class="forms-sample" action="" method="post">
                    <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>S.N.</th>
                                  <th>Day</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                if (count($data['attendanceData']) > 0) {
                                  $sno = 1;
                                  $flag = 0;
                                  foreach ($data['attendanceData'] as $attendance) {
                                    echo "<tr>";
                                    echo "<td>" . $sno . "</td>";
                                    echo "<td>" . $attendance["day"] . "</td>";
                                    echo "<td>" . $attendance["date"] . "</td>";
                                    echo "<td>" . $attendance["time"] . "</td>";
                                    echo "</tr>";
                                    $sno++;
                                  }
                                } 
                                else {
                                  echo "<tr><td colspan='4' class='text-center'>";
                                  if (isset($_GET['submit']))
                                    echo "No attendance recorded";
                                  else
                                    echo "Choose course";
                                  echo "</td></tr>";
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
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
  <!-- <script src="../assets/vendors/chart.js/Chart.min.js"></script> -->
  <!-- <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- <script src="../assets/js/off-canvas.js"></script> -->
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <!-- <script src="../assets/js/dashboard.js"></script> -->
  <!-- <script src="../assets/js/todolist.js"></script> -->
</body>
</html>