<?php include './backend//hostel_complain.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hostel Complain - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/css/style.css">
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
                <i class="mdi mdi-border-color"></i>
              </span> Hostel Complain
            </h3>
          </div>
          <div class="col-md-8 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Write Complain</h4>
                <form class="forms-sample" action="" method="post">
                  <div class="form-group row">
                    <label for="ComplainDescription" class="col-sm-3 col-form-label">Complain Description</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ComplainDescription" name="complainDescription" placeholder="10-30 words" requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Category" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="category" name="category" required>
                        <option value="" disabled selected>Select category</option>
                        <option value="Electrical appliances issue">Electrical appliances issue</option>
                        <option value="Clineaness">Clineaness</option>
                        <option value="Wi-Fi">Wi-Fi</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Medicine issue">Medicine issue</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2" name="submit" onclick="showPopup()">Submit</button>
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
  <script>
    function showPopup() {
      alert("Complain Registered");
    }
  </script>
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