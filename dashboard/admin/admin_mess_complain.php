<?php include './backend/admin_mess_complain.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hostel Complain - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myStyle.css">
    <link rel="shortcut icon" href="../assets/images/favicon1.png" />
</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit STATUS</h5>
                </div>
                <form action="admin_mess_complain.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="complainIDEdit" id="complainIDEdit">
                        <div class="form-group">
                            <label for="status">Staus</label>
                            <input type="text" class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            </span> Mess Complain History
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom:20px;">Issue History</h4>
                                    <table class="table">
                                        <div class="col-12 grid-margin">
                                            <div class="template-demo">
                                                <form action="" method="get">
                                                    <button type="submit" class="button" name="filter" value="all">All</button>
                                                    <button type="submit" class="button" name="filter" value="last7days">Last 7 Days</button>
                                                    <button type="submit" class="button" name="filter" value="newestFirst">Newest First</button>
                                                    <button type="submit" class="button" name="filter" value="unresolved">Unresolved</button>
                                                    <button type="submit" class="button" name="filter" value="resolved">Resolved</button>
                                                </form>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Description</th>
                                                <th>Roll No.</th>
                                                <th>Complain Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($complains) > 0) {
                                                $sno = 1;
                                                $flag = 0;
                                                foreach ($complains as $complain) {
                                                    echo "<tr>";
                                                    echo "<td>" . $sno . "</td>";
                                                    echo "<td>" . $complain["description"] . "</td>";
                                                    echo "<td>" . $complain["roll_no"] . "</td>";
                                                    echo "<td>" . $complain["complain_date"] . "</td>";
                                                    echo "<td>" . $complain["status"] . "</td>";
                                                    echo "<td> <button class='edit btn btn-sm btn-primary' id=" . $complain['complain_id'] . ">Update</button></td>";
                                                    echo "</tr>";
                                                    $sno++;
                                                }
                                            } else
                                                $flag = 1;
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                        if ($flag == 1) {
                                            echo "<center style='margin-top:10px;'>
                                                    <div>
                                                        No complain registered
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
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                status = tr.getElementsByTagName("td")[4].innerText;
                console.log(status);
                statusEdit.value = status;
                complainIDEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
    </script>
</body>

</html>