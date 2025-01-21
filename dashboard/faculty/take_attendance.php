<?php include './backend/take_attendance.php' ?>

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
                                <i class="mdi mdi-pen"></i>
                            </span> Take Attendance
                        </h3>
                    </div>
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
                                                foreach($courses as $c)
                                                    echo "<option value=" . $c["c_id"] . ">" . $c["c_id"] ." - ". $c["cname"] . "</option>";
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
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                            <i class="mdi mdi-account-outline icon-sm me-2"></i>
                                            <span><?php echo $course ?></span>
                                        </div>
                                        <div class="d-flex align-items-center text-muted font-weight-light">
                                            <i class="mdi mdi-clock icon-sm me-2"></i>
                                            <span><?php echo date('F jS, Y') ?></span>
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
                                                                    <th>Name</th>
                                                                    <th>Roll No.</th>
                                                                    <th>Status</th>
                                                                    <th>Mark Attendance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $sno=1;
                                                            foreach($attendance as $a){
                                                                echo "<tr>";
                                                                echo "<td>" . $sno . "</td>";
                                                                echo "<td>" . $a["sname"] . "</td>";
                                                                echo "<td>" . $a["roll_no"] . "</td>";
                                                                echo '<td style="padding: 0;"><div class="form-check form-check-' . $a['color'] . '">
                                                                        <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="' . $a["roll_no"] . '" id="' . $a["roll_no"] . '" checked>
                                                                        <i class="input-helper"></i>
                                                                        </label>
                                                                        </div></td>';
                                                                echo '<td style="padding: 0;"><div class="form-check form-check-primary">
                                                                        <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="attendance[]" value="' . $a['roll_no'] . '">
                                                                        <i class="input-helper"></i>
                                                                        </label>
                                                                        </div></td>';
                                                                echo "</tr>";
                                                                $sno++;
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-2 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-gradient-primary me-2" name="submit" onclick="showPopup()">Submit </button>
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
    <script>
        function showPopup() {
            alert("Attendance Submitted");
        }
    </script>
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