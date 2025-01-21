<?php 

include 'config.php'; 

$response = [];

// Fetch faculty information
$sql = "SELECT f_id, fac_name, email_id, fac_room_no, dname
        FROM faculty, department
        WHERE faculty.did = department.did AND f_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $fid, $fname, $emailid, $fac_room_no, $dname);
    mysqli_stmt_fetch($stmt);

    $response['faculty'] = [
        'f_id' => $fid,
        'fac_name' => $fname,
        'email_id' => $emailid,
        'fac_room_no' => $fac_room_no,
        'dname' => $dname
    ];
}
mysqli_stmt_close($stmt);

// Fetch courses teaching
$sql = "SELECT c_id FROM teaches WHERE f_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    $courses = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row['c_id'];
    }

    $response['courses'] = $courses;
}
mysqli_stmt_close($stmt);

// Fetch students below 75% attendance
$students_below_75 = [];

foreach ($courses as $course) {
    $sql = "SELECT CLASS_COUNT as CLASS_COUNT FROM total_classes WHERE C_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $course);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $class_row = mysqli_fetch_assoc($result);
    $total_class_count = $class_row>0 ? $class_row['CLASS_COUNT'] : 0;
    mysqli_stmt_close($stmt);

    $sql = "SELECT roll_no FROM takes WHERE c_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $course);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $count=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sql = "SELECT COUNT(*) AS total_attended FROM attendance WHERE roll_no = ? AND c_id = ?";
            $stmt2 = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt2, "ss", $row["roll_no"], $course);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);
            $attendance_row = mysqli_fetch_assoc($result2);
            $total_attended = $attendance_row['total_attended'];
            mysqli_stmt_close($stmt2);

            $percent = ($total_class_count == 0) ? 100 : ($total_attended / $total_class_count) * 100;

            if ($percent < 75) {
                $count++;
            }
        }
    }
    $students_below_75[] = [
        'c_id' => $course,
        'count' => $count,
    ];
    mysqli_stmt_close($stmt);
}

$response['students_below_75'] = $students_below_75;

mysqli_close($conn);
?>