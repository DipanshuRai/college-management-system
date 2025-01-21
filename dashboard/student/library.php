<?php include './backend/library.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Library - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/myStyle.css">
  <link rel="shortcut icon" href="../assets/images/favicon1.png" />
  </style>
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
                <i class="mdi mdi-library"></i>
              </span> Library Details
            </h3>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Total Fine Pending<i class="mdi mdi-currency-inr mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-3"><?php echo $totalFine ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Total Fine Paid <i class="mdi mdi-currency-inr mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5"><?php echo $totalFinePaid ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Total Book Issued <i class="mdi mdi-book-multiple mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5"><?php echo $totalBookIssued ?></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Issue History</h4>
                  <table class="table">
                    <div class="col-12 grid-margin">
                      <div class="template-demo">
                        <form action="" method="get">
                          <button type="submit" class="button" name="filter" value="all">All</button>
                          <button type="submit" class="button" name="filter" value="last7days">Last 7 Days</button>
                          <button type="submit" class="button" name="filter" value="newestFirst">Newest First</button>
                          <button type="submit" class="button" name="filter" value="notReturned">Not Returned</button>
                          <button type="submit" class="button" name="filter" value="returned">Returned</button>
                        </form>
                      </div>
                    </div>
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th>Fine</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($fineData as $row) : ?>
                        <tr>
                          <td><?php echo $row['sno']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['author']; ?></td>
                          <td><?php echo $row['issue_date']; ?></td>
                          <td><?php echo $row['return_date']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td><?php echo $row['fine']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <center style="margin-top:10px;">
                    <div>
                      <?php
                      if ($flag == 1)
                        echo "No book issued";
                      ?>
                    </div>
                  </center>
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