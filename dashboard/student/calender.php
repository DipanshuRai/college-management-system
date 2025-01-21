<?php include './backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Academic Calender - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="shortcut icon" href="../assets/images/favicon1.png" />
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h2 {
      text-align: center;
      color: green;
    }

    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 80%;
      max-width: 800px;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f2f2f2;
    }

    a {
      text-decoration: none;
      color: blue;
    }
  </style>
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
                <i class="mdi mdi-calendar"></i>
              </span> Academic Calender
            </h3>
          </div>
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <div style="text-align: center;">
                  <img src="../assets/images/iiitg-logo.png" alt="IIITG Logo" style="padding-bottom: 20px; height:200px;">
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-success">
                      <th> S.N. </th>
                      <th> Name </th>
                      <th> Click </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-warning">
                      <td> 1 </td>
                      <td>Academic Calendar for Winter Semester AY 2023-24 (January - May 2024) </td>
                      <td><a href="https://www.iiitg.ac.in/uploads/2023/12/13/0fd0a75da8f93079f107ca447d33131c.pdf">View</a></td>
                    </tr>
                    <tr class="table-warning">
                      <td> 2 </td>
                      <td> Academic calendar of BTech 2023 batch first semester </td>
                      <td><a href="https://www.iiitg.ac.in/uploads/2023/12/14/d9423e55cd7ed59e5b45b70ed6922c80.pdf">View</a></td>
                    </tr>
                    <tr class="table-warning">
                      <td> 3 </td>
                      <td> Holiday List 2024 </td>
                      <td><a href="https://www.iiitg.ac.in/uploads/2024/01/09/1c4b20abd6e85e1f347ac2c02d0c0b53.pdf">View</a></td>
                    </tr>
                  </tbody>
                </table>
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
  <!-- <script src="../assets/js/todolist.js"></script>      -->
</body>
</html>