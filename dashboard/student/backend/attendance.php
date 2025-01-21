<?php 

include 'config.php';

$courseData = [];
$attendancePercentages = [];
$attendanceData = [];

//Get enrolled courses
$sql = "SELECT course.cname AS cname, course.c_id AS c_id
        FROM course,takes
        WHERE takes.c_id=course.c_id AND roll_no=?;";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $courseData[] = $row;
    }
    mysqli_stmt_close($stmt);
}

// Get coursewise attendance percent
foreach ($courseData as $course) {
    $sql2 = "SELECT CLASS_COUNT as CLASS_COUNT
             FROM total_classes
             WHERE C_ID = ?;";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "s", $course['c_id']);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);
    $class_row = mysqli_fetch_assoc($result2);
    $total_class_count = $class_row['CLASS_COUNT'] ?? 0;

    $sql3 = "SELECT COUNT(*) AS total_attended
             FROM attendance
             WHERE roll_no = ? AND c_id = ?;";
    $stmt3 = mysqli_prepare($conn, $sql3);
    mysqli_stmt_bind_param($stmt3, "ss", $id, $course['c_id']);
    mysqli_stmt_execute($stmt3);
    $result3 = mysqli_stmt_get_result($stmt3);
    $attendance_row = mysqli_fetch_assoc($result3);
    $total_attended = $attendance_row['total_attended'] ?? 0;

    $attendancePercent = $total_class_count == 0 ? 100 : ($total_attended / $total_class_count) * 100;
    $attendancePercentages[$course['c_id']] = $attendancePercent;

    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
}

// Get complete attendance data
if (isset($_GET['submit']) && !empty($_GET['category'])) {
    $course = $_GET['category'];

    $sql = "SELECT DAYNAME(time) AS day, DATE(time) AS date, TIME(time) AS time
            FROM attendance
            WHERE roll_no = ? AND c_id = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $id, $course);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $attendanceData[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
}

$data = [
    'courseData' => $courseData,
    'attendanceData' => $attendanceData,
    'attendancePercentages' => $attendancePercentages
];

mysqli_close($conn);
?>