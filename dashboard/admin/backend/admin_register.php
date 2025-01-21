<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aname = $_POST["name"];
    $aid = $_POST["id"];
    $pass = $_POST["pass"];

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Check if admin ID is already taken
    $sql11 = "SELECT 1 FROM admin WHERE admin_id = ?";
    $stmt11 = mysqli_prepare($conn, $sql11);
    mysqli_stmt_bind_param($stmt11, "s", $aid);
    mysqli_stmt_execute($stmt11);
    mysqli_stmt_store_result($stmt11);
    $aid_exists = mysqli_stmt_num_rows($stmt11) > 0;
    mysqli_stmt_close($stmt11);

    if ($aid_exists) {
        echo "<script>
                alert('Admin ID is already taken, registration failed!!');
             </script>";
    } else {
        $sql = "INSERT INTO admin (admin_id, admin_pass, admin_name) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $aid, $hashed_password, $aname);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                        alert('Registration Completed');
                     </script>";
            } else {
                echo "<script>
                        alert('Error: Could not complete registration');
                     </script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>
                    alert('Error: Could not prepare statement');
                 </script>";
        }
    }
}
mysqli_close($conn);
