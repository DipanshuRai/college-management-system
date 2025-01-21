<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sname = $_POST["name"];
    $fname = $_POST["fname"];
    $rollno = $_POST["rollno"];
    $dob = $_POST["dob"];
    $branch = $_POST["branch"];
    $semester = $_POST["semester"];
    $emailID = $_POST["emailID"];
    $roomNumber = $_POST["roomNumber"];
    $spnumber = $_POST["spnumber"];
    $fpnumber = $_POST["fpnumber"];
    $address = $_POST["address"];
    $pinCode = $_POST["pinCode"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $gender = $_POST["gender"];
    $pass = $_POST["pass"];

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Check if email ID is already taken
    $sql10 = "SELECT 1 FROM student WHERE email_id = ?";
    $stmt10 = mysqli_prepare($conn, $sql10);
    mysqli_stmt_bind_param($stmt10, "s", $emailID);
    mysqli_stmt_execute($stmt10);
    mysqli_stmt_store_result($stmt10);
    $email_exists = mysqli_stmt_num_rows($stmt10) > 0;
    mysqli_stmt_close($stmt10);

    // Check if roll number is already taken
    $sql11 = "SELECT 1 FROM student WHERE roll_no = ?";
    $stmt11 = mysqli_prepare($conn, $sql11);
    mysqli_stmt_bind_param($stmt11, "s", $rollno);
    mysqli_stmt_execute($stmt11);
    mysqli_stmt_store_result($stmt11);
    $rollno_exists = mysqli_stmt_num_rows($stmt11) > 0;
    mysqli_stmt_close($stmt11);

    if ($email_exists) {
        echo "<script>
                alert('Email ID is already taken, registration failed!!');
             </script>";
    } else if ($rollno_exists) {
        echo "<script>
                alert('Roll number is already taken, registration failed!!');
             </script>";
    } else {
        $sql = "INSERT INTO student (sname, fname, roll_no, dob, branch, semester, email_id, room_no, s_pnumber, f_pnumber, street_address, pin_code, city, state, gender, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $sname, $fname, $rollno, $dob, $branch, $semester, $emailID, $roomNumber, $spnumber, $fpnumber, $address, $pinCode, $city, $state, $gender, $hashed_password);
        mysqli_stmt_execute($stmt);

        // Register the student for the courses based on the semester
        $sql = "SELECT C_ID FROM course WHERE semester=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $semester);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cid = $row["C_ID"];
                $sql2 = "SELECT f_id FROM teaches WHERE c_id=?";
                $stmt2 = mysqli_prepare($conn, $sql2);
                mysqli_stmt_bind_param($stmt2, "s", $cid);
                mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);
                if (mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $fid = $row2['f_id'];
                    $sql3 = "INSERT INTO study_from VALUES(?, ?, ?)";
                    $stmt3 = mysqli_prepare($conn, $sql3);
                    mysqli_stmt_bind_param($stmt3, "sss", $rollno, $fid, $cid);
                    mysqli_stmt_execute($stmt3);

                    $sql3 = "INSERT INTO takes VALUES(?, ?)";
                    $stmt3 = mysqli_prepare($conn, $sql3);
                    mysqli_stmt_bind_param($stmt3, "ss", $rollno, $cid);
                    mysqli_stmt_execute($stmt3);
                }
            }
        }
        echo "<script>
                alert('Registration Completed');
             </script>";
    }
}
mysqli_close($conn);

?>