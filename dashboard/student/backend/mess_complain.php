<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $status = "Unresolved";
    $complainDate = date("Y-m-d");
    $rollno = $_SESSION["id"];
    $description = trim($_POST["complainDescription"]);
    $category = trim($_POST["category"]);

    $categoryMapping = [
        "Food issue" => "C001",
        "Hygein" => "C002",
        "Unclean plates" => "C003",
        "Staff behaviour" => "c004",
        "Overcrowding" => "C005",
        "Other" => "C006"
    ];
    $complainID = $categoryMapping[$category];
    $sql = "insert into makes_mess values(?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $complainID, $description,  $rollno, $complainDate, $status);
        if (mysqli_stmt_execute($stmt)) {
            header("location:http://localhost/College Management System/dashboard/student/mess_complain.php");
            exit();
        } 
        else
            echo "Submission failed !";
    }
    echo "Failed to prepare the SQL statement!";
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>