<?php
include 'config.php';

$filter = "";
$totalFine = 0;
$totalFinePaid = 0;
$totalBookIssued = 0;
$fineData = [];
$sno = 1;
$flag=0;

$baseSql = "SELECT title, author, issue_date, return_date, status, fine 
            FROM book, issue 
            WHERE book.BOOK_ID = issue.BOOK_ID AND ROLL_NO = ?";

$filterSql = "";
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["filter"])) {
    $filter = $_GET["filter"];
    switch ($filter) {
        case "last7days":
            $filterSql = " AND issue_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            break;
        case "newestFirst":
            $filterSql = " ORDER BY issue_date DESC";
            break;
        case "returned":
            $filterSql = " AND status='Returned'";
            break;
        case "notReturned":
            $filterSql = " AND status='Not Returned'";
            break;
        case "all":
        default:
            $filterSql = "";
            break;
    }
}

$sql = $baseSql . $filterSql;

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $id;

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Fine calculation
            $date1 = date("Y-m-d"); // Current date in YYYY-MM-DD format (string)
            $date2 = $row["return_date"];

            // Create DateTime objects from the date strings
            $dateTime1 = DateTime::createFromFormat('Y-m-d', $date1); // current date
            $dateTime2 = DateTime::createFromFormat('Y-m-d', $date2); // return date

            $interval = $dateTime1->diff($dateTime2);

            // Check if the current date is after the return date
            if ($dateTime1 > $dateTime2 && $row["status"] == "Not Returned") {
                // Calculate the fine based on the difference in days
                $fine = $interval->days * 5; // current fine for not returned books
                $totalFine += $fine; // total paid and unpaid fine
            } 
            else
                // Return date is on or before the current date, no fine
                $fine = 0;
            if ($row["status"] == "Returned")
                $totalFinePaid += $row["fine"]; // total fine paid for returned books

            $totalBookIssued++;

            // Store data in array
            $fineData[] = [
                'sno' => $sno,
                'title' => $row["title"],
                'author' => $row["author"],
                'issue_date' => $row["issue_date"],
                'return_date' => $row["return_date"],
                'status' => $row["status"],
                'fine' => $fine
            ];
            $sno++;
        }
    } 
    else
        $flag = 1;
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>