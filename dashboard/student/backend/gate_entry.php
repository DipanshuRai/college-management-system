<?php 

include 'config.php';

$total_late = 0;
$last30dayslate = 0;
$last7dayslate = 0;
$data=[];

$sql = "SELECT entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time FROM gate_entry WHERE roll_no=?";

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

switch ($filter) {
    case 'newestFirst':
        $sql .= " ORDER BY entry_time DESC";
        break;
    case 'all':
    default:
        break;
}

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $referenceTime = "21:30:00";
            $lateTime = $row["time"];
            $lateDate = $row["date"];
            // Assuming $lateTime is always greater than $referenceTime
            $lateDateTime = new DateTime($lateDate . ' ' . $lateTime);
            $referenceDateTime = new DateTime($lateDate . ' ' . $referenceTime);
            // Calculate the difference in days for the last 30 days
            $diffDays30 = (new DateTime())->diff($lateDateTime)->days;
            if ($diffDays30 <= 30) {
            $last30dayslate++;
            }
            // Calculate the difference in days for the last 7 days
            $diffDays7 = (new DateTime())->diff($lateDateTime)->days;
            if ($diffDays7 <= 7) {
            $last7dayslate++;
            }
            // Increment total late count
            $total_late++;
        }
    }
}

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Create a DateTime object from the datetime string
            $date = new DateTime($row["entry_time"]);
            // Extract date and time components
            $timeComponent = $date->format('H:i:s'); // Extracts time component (in 'H:i:s' format)
            $dateComponent = $date->format('Y-m-d'); // Extracts date component (in 'Y-m-d' format)

            $referenceTime = "21:30:00";
            // Create DateTime objects for reference time and $timeComponent
            $dateTime1 = DateTime::createFromFormat('H:i:s', $referenceTime);
            $dateTime2 = DateTime::createFromFormat('H:i:s', $timeComponent);

            // Calculate the difference in seconds
            $diffSeconds = $dateTime2->getTimestamp() - $dateTime1->getTimestamp();

            // Convert the difference to a readable format
            $lateDuration = gmdate('H:i:s', $diffSeconds);

            // Store the data in the array
            $data[] = [
                'sno' => count($data) + 1,
                'date' => $dateComponent,
                'time' => $timeComponent,
                'lateDuration' => $lateDuration
            ];
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