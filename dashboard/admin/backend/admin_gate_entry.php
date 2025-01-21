<?php 

include 'config.php';

$entries = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rollno'])) {
    $roll_no = mysqli_real_escape_string($conn, $_POST['rollno']);
    $sql = "INSERT INTO gate_entry (roll_no, entry_time) VALUES ($roll_no, NOW())";
    mysqli_query($conn, $sql);
}

$filter_queries = [
    "last7days" => " AND entry_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)",
    "last1month" => " AND entry_time >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND entry_time <= NOW()",
    "newestFirst" => " ORDER BY entry_time DESC",
    "sortByName" => " ORDER BY sname"
];

$filter = $_GET["filter"] ?? '';
$filter_query = $filter_queries[$filter] ?? '';

$sql = "SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
        FROM gate_entry
        JOIN student ON student.roll_no = gate_entry.roll_no
        WHERE 1=1 $filter_query";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $date = new DateTime($row["entry_time"]);
        $timeComponent = $date->format('H:i:s');

        $referenceTime = "21:30:00";
        $dateTime1 = DateTime::createFromFormat('H:i:s', $referenceTime);
        $dateTime2 = DateTime::createFromFormat('H:i:s', $timeComponent);

        $diffSeconds = $dateTime2->getTimestamp() - $dateTime1->getTimestamp();
        $lateDuration = gmdate('H:i:s', $diffSeconds);

        $entries[] = [
            "sname" => $row["sname"],
            "roll_no" => $row["roll_no"],
            "date" => $row["date"],
            "time" => $row["time"],
            "lateDuration" => $lateDuration
        ];
    }
}

mysqli_close($conn);
?>