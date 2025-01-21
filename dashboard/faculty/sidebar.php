<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="http://localhost/College Management System/dashboard/faculty/dashboard_faculty.php" class="nav-link">
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
            <a class="nav-link" href="http://localhost/College Management System/dashboard/faculty/dashboard_faculty.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/faculty/student_details.php">
                <span class="menu-title">Student Details</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/faculty/take_attendance.php">
                <span class="menu-title">Attendance</span>
                <i class="mdi mdi-pen menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>