<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST["name"];
    $fid = $_POST["id"];
    $did = $_POST["did"];
    $emailID = $_POST["emailID"];
    $roomNumber = $_POST["roomNumber"];
    $pass = $_POST["pass"];

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email ID is already taken
    $sql10 = "SELECT 1 FROM faculty WHERE email_id = ?";
    $stmt10 = mysqli_prepare($conn, $sql10);
    mysqli_stmt_bind_param($stmt10, "s", $emailID);
    mysqli_stmt_execute($stmt10);
    mysqli_stmt_store_result($stmt10);
    $email_exists = mysqli_stmt_num_rows($stmt10) > 0;
    mysqli_stmt_close($stmt10);

    // Check if faculty ID is already taken
    $sql11 = "SELECT 1 FROM faculty WHERE f_id = ?";
    $stmt11 = mysqli_prepare($conn, $sql11);
    mysqli_stmt_bind_param($stmt11, "s", $fid);
    mysqli_stmt_execute($stmt11);
    mysqli_stmt_store_result($stmt11);
    $fid_exists = mysqli_stmt_num_rows($stmt11) > 0;
    mysqli_stmt_close($stmt11);

    if ($email_exists) {
        echo "<script>
                alert('Email ID is already taken, registration failed!!');
             </script>";
    } else if ($fid_exists) {
        echo "<script>
                alert('Faculty ID is already taken, registration failed!!');
             </script>";
    } else {
        $sql = "INSERT INTO faculty (f_id, password, fac_name, email_id, fac_room_no, did)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $fid, $hashed_password, $fname, $emailID, $roomNumber, $did);
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

?>