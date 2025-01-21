<?php

include 'config.php';

$complains = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['complainIDEdit'])) {
    $status = mysqli_real_escape_string($conn, $_POST["statusEdit"]);
    $complainID = mysqli_real_escape_string($conn, $_POST["complainIDEdit"]);

    $sql = "UPDATE makes_mess SET status='$status' WHERE complain_id=$complainID;";
    if (!mysqli_query($conn, $sql)) {
        echo "We could not update the record successfully";
    }
}

$sql = "SELECT roll_no, complain_id, description, complain_date, status FROM makes_mess";

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["filter"])) {
    $filter = mysqli_real_escape_string($conn, $_GET["filter"]);
    $filter_queries = [
        "last7days" => " WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)",
        "newestFirst" => " ORDER BY complain_date DESC",
        "resolved" => " WHERE status='resolved'",
        "unresolved" => " WHERE status='unresolved'",
        "all" => ""
    ];
    $sql .= $filter_queries[$filter] ?? "";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $complains[] = [
            "description" => $row["description"],
            "roll_no" => $row["roll_no"],
            "complain_date" => $row["complain_date"],
            "status" => $row["status"],
            "complain_id" => $row["complain_id"]
        ];
    }
}

mysqli_close($conn);
?>