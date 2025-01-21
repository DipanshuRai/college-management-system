<?php

include 'config.php';

$courses = [];
$attendance = [];

$sql = "SELECT teaches.c_id, cname
      FROM teaches, course
      WHERE teaches.c_id=course.c_id AND f_id=?;";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $cid, $cname);
    mysqli_stmt_fetch($stmt);
}
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = [
                'c_id' => $row["c_id"],
                'cname' => $row["cname"],
            ];
        }
    }
}

$course = "";
// Check if form is submitted
if (isset($_GET['submit'])) {
    // Check if category is selected
    if (isset($_GET['category']) && !empty($_GET['category'])) {
        $course = $_GET['category'];
        $sql = " SELECT sname,student.roll_no AS roll_no
                                     FROM student,takes
                                     WHERE takes.roll_no=student.roll_no AND c_id=?;";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_course_id);
        $param_course_id = $course;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $sname, $roll_no);
        }
    }
}

if (mysqli_stmt_execute($stmt) && isset($_GET['submit'])) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $sql = "SELECT CLASS_COUNT as CLASS_COUNT
                    FROM total_classes 
                    WHERE C_ID = ?;";
            $stmt2 = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt2, "s", $course);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);
            $class_row = mysqli_fetch_assoc($result2);
            $total_class_count = $class_row>0 ? $class_row['CLASS_COUNT'] : 0;

            $sql = "SELECT COUNT(*) AS total_attended
                    FROM attendance
                    WHERE roll_no = ? AND c_id = ?";

            $stmt3 = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt3, "ss", $row["roll_no"], $course);
            mysqli_stmt_execute($stmt3);
            $result3 = mysqli_stmt_get_result($stmt3);
            $attendance_row = mysqli_fetch_assoc($result3);
            $total_attended = $attendance_row['total_attended'];

            if ($total_class_count == 0) 
                $percent = 100;
            else
                $percent = ($total_attended / $total_class_count) * 100;
            if ($percent >= 90)
                $color = "success";
            else if ($percent < 90 && $percent >= 75)
                $color = "info";
            else
                $color = "danger";

            $attendance[] = [
                'sname' => $row["sname"],
                'roll_no' => $row["roll_no"],
                'color' => $color
            ];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['attendance']) && is_array($_POST['attendance'])) {

        $sql = "INSERT INTO attendance (roll_no, c_id, time) 
        VALUES (?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $sql);

        foreach ($_POST['attendance'] as $roll_no) {
            mysqli_stmt_bind_param($stmt, "ss", $roll_no, $course);
            mysqli_stmt_execute($stmt);
        }
    }
    $sql = "UPDATE total_classes
            SET CLASS_COUNT = CLASS_COUNT + 1
            WHERE C_ID = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $course);
    mysqli_stmt_execute($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>