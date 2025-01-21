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
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages2" aria-expanded="false" aria-controls="general-pages2">
                <span class="menu-title">Register</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-plus menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_student_register.php"> Student </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_faculty_register.php"> Faculty </a></li>
                    <li class="nav-item"> <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_register.php"> Admin </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_library.php">
                <span class="menu-title">Library</span>
                <i class="mdi mdi-library menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_hostel_complain.php">
                <span class="menu-title">Hostel Complain</span>
                <i class="mdi mdi-hospital-building menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_mess_complain.php">
                <span class="menu-title">Mess Complain</span>
                <i class="mdi mdi-silverware-variant menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="http://localhost/College Management System/dashboard/admin/admin_gate_entry.php">
                <span class="menu-title">Gate Entry</span>
                <i class="mdi mdi-gate menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>