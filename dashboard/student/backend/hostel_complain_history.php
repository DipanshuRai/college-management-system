<?php

include 'config.php';

$data = [];
$total_complaints = 0;
$total_resolved_complaints = 0;
$total_unresolved_complaints = 0;

$base_query = "SELECT description, complain_date, status FROM makes_hostel WHERE roll_no = ?";

// Apply filters
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
switch ($filter) {
    case 'last7days':
        $base_query .= " AND complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
        break;
    case 'newestFirst':
        $base_query .= " ORDER BY complain_date DESC";
        break;
    case 'resolved':
        $base_query .= " AND status = 'Resolved'";
        break;
    case 'unresolved':
        $base_query .= " AND status = 'Unresolved'";
        break;
    case 'all':
    default:
        break;
}

// Prepare, bind, and execute statement
$stmt = mysqli_prepare($conn, $base_query);
if (!$stmt)
    die('Preparation failed: ' . mysqli_error($conn));

mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["status"] == "Resolved") {
                $total_resolved_complaints++;
            } elseif ($row["status"] == "Unresolved") {
                $total_unresolved_complaints++;
            }
            $total_complaints++;
            $data[] = $row;
        }
    } 
    else
        die('Error fetching result: ' . mysqli_error($conn));
} 
else
    die('Execution failed: ' . mysqli_error($conn));

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>