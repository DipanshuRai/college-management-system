<?php

include 'config.php';

// Fetch complaint counts
$totalMessComplainResolved = $totalMessComplainUnresolved = 0;
$totalHostelComplainResolved = $totalHostelComplainUnresolved = 0;

function fetch_complaint_count($conn, $query, $id) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_assoc($result)['count(*)'];
    mysqli_stmt_close($stmt);
    return $count;
}

$totalMessComplainResolved = fetch_complaint_count($conn, "SELECT count(*) FROM makes_mess WHERE status='Resolved' AND roll_no = ?", $id);
$totalMessComplainUnresolved = fetch_complaint_count($conn, "SELECT count(*) FROM makes_mess WHERE status='Unresolved' AND roll_no = ?", $id);
$totalHostelComplainResolved = fetch_complaint_count($conn, "SELECT count(*) FROM makes_hostel WHERE status='Resolved' AND roll_no = ?", $id);
$totalHostelComplainUnresolved = fetch_complaint_count($conn, "SELECT count(*) FROM makes_hostel WHERE status='Unresolved' AND roll_no = ?", $id);

$totalComplain = $totalMessComplainResolved + $totalMessComplainUnresolved + $totalHostelComplainResolved + $totalHostelComplainUnresolved;
$totalResolved = $totalMessComplainResolved + $totalHostelComplainResolved;
$totalUnresolved = $totalMessComplainUnresolved + $totalHostelComplainUnresolved;

// Fetch attendance percentages
$attendance_percentages = array();

$sql2 = "SELECT course.cname AS cname, course.c_id AS c_id
         FROM course, takes
         WHERE takes.c_id = course.c_id AND roll_no = ?";
$stmt2 = mysqli_prepare($conn, $sql2);
mysqli_stmt_bind_param($stmt2, "s", $id);
mysqli_stmt_execute($stmt2);
mysqli_stmt_store_result($stmt2);
mysqli_stmt_bind_result($stmt2, $cname, $cid);
mysqli_stmt_fetch($stmt2);

if (mysqli_stmt_execute($stmt2)) {
    $result = mysqli_stmt_get_result($stmt2);
    while ($row = mysqli_fetch_assoc($result)) {
        $course = $row["c_id"];
        
        $sql2 = "SELECT CLASS_COUNT as CLASS_COUNT FROM total_classes WHERE C_ID = ?";
        $stmt2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt2, "s", $course);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $class_row = mysqli_fetch_assoc($result2);
        $total_class_count = $class_row['CLASS_COUNT'];
        
        $sql3 = "SELECT COUNT(*) AS total_attended FROM attendance WHERE roll_no = ? AND c_id = ?";
        $stmt3 = mysqli_prepare($conn, $sql3);
        mysqli_stmt_bind_param($stmt3, "ss", $id, $course);
        mysqli_stmt_execute($stmt3);
        $result3 = mysqli_stmt_get_result($stmt3);
        $attendance_row = mysqli_fetch_assoc($result3);
        $total_attended = $attendance_row['total_attended'];
        
        $percent = $total_class_count == 0 ? 100 : ($total_attended / $total_class_count) * 100;
        $attendance_percentages[$course] = $percent;
        
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt3);
    }
}

// Fetch libary fines data
$totalFine = $totalFinePaid = $totalBookIssued = 0;

$sql3 = "SELECT issue_date, return_date, status, fine FROM issue WHERE ROLL_NO = ?";
$stmt3 = mysqli_prepare($conn, $sql3);
mysqli_stmt_bind_param($stmt3, "s", $id);
mysqli_stmt_execute($stmt3);
$result = mysqli_stmt_get_result($stmt3);

while ($row = mysqli_fetch_assoc($result)) {
    $date1 = date("Y-m-d");
    $date2 = $row["return_date"];
    $dateTime1 = DateTime::createFromFormat('Y-m-d', $date1);
    $dateTime2 = DateTime::createFromFormat('Y-m-d', $date2);
    $interval = $dateTime1->diff($dateTime2);

    if ($dateTime1 > $dateTime2 && $row["status"] == "Not Returned") {
        $fine = $interval->days * 5;
        $totalFine += $fine;
    }

    if ($row["status"] == "Returned") {
        $totalFinePaid += $row["fine"];
    }

    $totalBookIssued++;
}
mysqli_stmt_close($stmt3);

// Fetch student details
$sql = "SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
        FROM student 
        WHERE roll_no = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $roll_no, $room_no, $sname, $dob, $branch, $email_id, $semester, $s_pnumber, $fname, $f_pnumber, $street_address, $pin_code, $city, $state);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>