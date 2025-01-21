<?php 

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $status = "Unresolved";
  $complainDate = date("Y-m-d");
  $rollno = $_SESSION["id"];
  $description = trim($_POST["complainDescription"]);
  $category = trim($_POST["category"]);

  $categoryMapping = [
      "Electrical appliances issue" => "H001",
      "Clineaness" => "H002",
      "Wi-Fi" => "H003",
      "Furniture" => "H004",
      "Medicine issue" => "H005",
      "Other" => "H006"
  ];
  $complainID = $categoryMapping[$category];
  $sql = "insert into makes_hostel values(?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssss", $complainID, $description,  $rollno, $complainDate, $status);  
    if (mysqli_stmt_execute($stmt)) {
      header("location:http://localhost/College Management System/dashboard/student/hostel_complain.php");
      exit();
    } 
    else
      echo "Submission failed !";
  }
  else
      echo "Failed to prepare the SQL statement!";
}
mysqli_close($conn);
?>