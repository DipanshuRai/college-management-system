<?php include './backend/admin_library.php' ?>

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
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>
<body>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit STATUS and FINE</h5>
                </div>
                <form action="admin_library.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="issueIDEdit" id="issueIDEdit">
                        <div class="form-group">
                            <label for="status">Staus</label>
                            <input type="text" class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="fine">Fine</label>
                            <input type="text" class="form-control" id="fineEdit" name="fineEdit" aria-describedby="emailHelp">
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
                                    <h4 class="card-title">Issue new book</h4>
                                    <form action="admin_library.php" method="POST">
                                        <div class="form-group row">
                                            <label for="rollno" class="col-sm-2 col-form-label">Roll No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="emailHelp">
                                            </div>
                                            <label for="bookID" class="col-sm-2 col-form-label">Book ID</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="bookID" name="bookID" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="issueDate" class="col-sm-2 col-form-label">Issue Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="issueDate" name="issueDate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                                            </div>
                                            <label for="returnDate" class="col-sm-2 col-form-label">Return Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="returnDate" name="returnDate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="showPopup()">Issue</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom:20px;">Issue History</h4>
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Title</th>
                                                <th>Roll No.</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>Status</th>
                                                <th>Fine</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($libraryRecords) > 0) {
                                                $sno = 1;
                                                foreach ($libraryRecords as $l) {
                                                    echo "<tr>";
                                                    echo "<td>" . $sno . "</td>";
                                                    echo "<td>" . $l["title"] . "</td>";
                                                    echo "<td>" . $l["roll_no"] . "</td>";
                                                    echo "<td>" . $l["issue_date"] . "</td>";
                                                    echo "<td>" . $l["return_date"] . "</td>";
                                                    echo "<td>" . $l["status"] . "</td>";
                                                    echo "<td>" . $l["fine"] . "</td>"; // current fine to be paid
                                                    echo "<td> <button class='edit btn btn-sm btn-primary' id=" . $l['issue_id'] . ">Update</button>
                                                                <button class='delete btn btn-sm btn-danger' id=" . $l['issue_id'] . ">Delete</button></td>";
                                                    echo "</tr>";
                                                    $sno++;
                                                }
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
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
            alert("Issue data added");
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('edit')) {
                    let tr = event.target.closest('tr');
                    let status = tr.querySelector('td:nth-child(6)').innerText;
                    let fine = tr.querySelector('td:nth-child(7)').innerText;
                    let issueID = tr.querySelector('.edit').getAttribute('id'); // Get issueID from the data attribute

                    document.getElementById('statusEdit').value = status;
                    document.getElementById('fineEdit').value = fine;
                    document.getElementById('issueIDEdit').value = issueID;

                    $('#editModal').modal('toggle');
                } else if (event.target.classList.contains('delete')) {
                    let tr = event.target.closest('tr');
                    let issueID = tr.querySelector('.delete').getAttribute('id'); // Get issueID from the data attribute

                    if (confirm("Are you sure you want to delete !")) {
                        window.location = `admin_library.php?delete=${issueID}`;
                    }
                }
            });
        });
    </script>
</body>
</html>