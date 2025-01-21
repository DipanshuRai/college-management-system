<?php include './backend/admin_gate_entry.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gate Entry - <?php echo $_SESSION['name'] ?></title>
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
                            </span> Late Entry
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="admin_gate_entry.php" method="post">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom:20px;">Entry History</h4>
                                    <table class="table">
                                        <div class="col-12 grid-margin">
                                            <div class="template-demo">
                                                <form action="" method="get">
                                                    <button type="submit" class="button" name="filter" value="all">All</button>
                                                    <button type="submit" class="button" name="filter" value="last7days">Last 7 Days</button>
                                                    <button type="submit" class="button" name="filter" value="last1month">Last 1 Month</button>
                                                    <button type="submit" class="button" name="filter" value="newestFirst">Newest First</button>
                                                    <button type="submit" class="button" name="filter" value="sortByName">Sort by Name</button>
                                                </form>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Roll No.</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Late Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($entries) > 0) {
                                                $sno = 1;
                                                $flag=0;
                                                foreach ($entries as $entry) {
                                                    echo "<tr>";
                                                    echo "<td>" . $sno . "</td>";
                                                    echo "<td>" . $entry["sname"] . "</td>";
                                                    echo "<td>" . $entry["roll_no"] . "</td>";
                                                    echo "<td>" . $entry["date"] . "</td>";
                                                    echo "<td>" . $entry["time"] . "</td>";
                                                    echo "<td>" . $entry["lateDuration"] . "</td>";
                                                    echo "</tr>";
                                                    $sno++;
                                                }
                                            }
                                            else 
                                                $flag = 1;
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    if ($flag == 1) {
                                        echo "<center style='margin-top:10px;'>
                                                <div>
                                                    No entry registered
                                                </div>
                                              </center>";
                                    }
                                    ?>
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