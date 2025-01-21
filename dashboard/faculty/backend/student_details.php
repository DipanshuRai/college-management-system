<?php 

include 'config.php';

$flag=0;
if (isset($_GET['rollno'])) {
    $roll_no = $_GET["rollno"];
    $flag=1;

    $sql = "SELECT roll_no 
            FROM study_from
            WHERE f_id=? AND roll_no=?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $id, $roll_no);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
                FROM student 
                WHERE roll_no = ?";

        $stmt2 = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt2, "s", $roll_no);

        mysqli_stmt_execute($stmt2);
        mysqli_stmt_store_result($stmt2);
        mysqli_stmt_bind_result($stmt2, $roll_no, $room_no, $sname, $dob, $branch, $email_id, $semester, $s_pnumber, $fname, $f_pnumber, $street_address, $pin_code, $city, $state);
        mysqli_stmt_fetch($stmt2);
        mysqli_stmt_close($stmt2);
        $flag=2;
    } 

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>