<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="../assets/images/faces/account.png" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION['name'] ?></span>
                    <span class="text-secondary text-small"><?php echo $_SESSION['user'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/student/dashboard_student.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/student/library.php">
                <span class="menu-title">Library</span>
                <i class="mdi mdi-library menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages3" aria-expanded="false" aria-controls="general-pages3">
                <span class="menu-title">Academics</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/attendance.php"> Attendance </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/calender.php"> Academic Calender </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/curriculum.php"> Curriculum </a></li> -->
                    <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/timetable.php"> Time Table </a></li> -->
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages1" aria-expanded="false" aria-controls="general-pages1">
                <span class="menu-title">Hostel</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-hospital-building menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/hostel_complain.php"> Hostel Complain </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/hostel_complain_history.php"> Complain History </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/contact_details.php"> Contact Details </a></li> -->
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages2" aria-expanded="false" aria-controls="general-pages2">
                <span class="menu-title">Mess</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-silverware-variant menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/mess_menu.php"> Mess Menu </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/mess_complain.php"> Mess Complain </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/student/mess_complain_history.php"> Complain History </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/student/gate_entry.php">
                <span class="menu-title">Gate Entry</span>
                <i class="mdi mdi-gate menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>