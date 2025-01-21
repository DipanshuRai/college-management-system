<?php 
include 'config.php';

$libraryRecords = [];

if (isset($_GET['delete'])) {
    $issueID = $_GET['delete'];
    echo $issueID;
    $sql = "DELETE FROM issue WHERE issue_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $issueID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['issueIDEdit'])) {
        // Update the record
        $status = $_POST["statusEdit"];
        $fine = $_POST["fineEdit"];
        $issueID = $_POST["issueIDEdit"];

        $sql = "UPDATE issue 
                SET fine = ?, status = ?
                WHERE issue.issue_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "dsi", $fine, $status, $issueID);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if (!$result) {
            echo "We could not update the record successfully";
        }
    } else {
        $rollno = $_POST["rollno"];
        $status = "Not Returned";
        $bookID = $_POST["bookID"];
        $fine = 0;
        $issueDate = $_POST["issueDate"];
        $returnDate = $_POST["returnDate"];

        $sql = "INSERT INTO issue (roll_no, book_id, issue_date, return_date, status, fine)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssd", $rollno, $bookID, $issueDate, $returnDate, $status, $fine);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if (!$result) {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    }
}

$totalFine = 0;
$totalFinePaid = 0;
$totalBookIssued = 0;

$sql = "SELECT roll_no, issue_id, title, author, issue_date, return_date, status, fine
        FROM book, issue
        WHERE book.BOOK_ID = issue.BOOK_ID";
$stmt = mysqli_prepare($conn, $sql);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date1 = date("Y-m-d");
            $date2 = $row["return_date"];

            $dateTime1 = new DateTime($date1);
            $dateTime2 = new DateTime($date2);

            $interval = $dateTime1->diff($dateTime2);

            $fine = 0;
            if ($dateTime1 > $dateTime2 && $row["status"] == "Not Returned") {
                $fine = $interval->days * 5;
                $totalFine += $fine;
            }

            if ($row["status"] == "Returned") {
                $totalFinePaid += $row["fine"];
            }

            $totalBookIssued++;

            $libraryRecords[] = [
                'issue_id' => $row['issue_id'],
                'title' => $row["title"],
                'roll_no' => $row["roll_no"],
                'issue_date' => $row["issue_date"],
                'return_date' => $row["return_date"],
                'status' => $row["status"],
                'fine' => $fine
            ];
        }
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>