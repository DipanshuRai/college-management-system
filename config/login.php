<?php
session_start();

require_once "config.php";

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// Redirect if already logged in
$redirects = [
    'student' => 'dashboard/student/dashboard_student.php',
    'faculty' => 'dashboard/faculty/dashboard_faculty.php',
    'admin' => 'dashboard/admin/admin_library.php'
];

if (isset($redirects[$user])) {
    header("Location: http://localhost/College Management System/" . $redirects[$user]);
    exit;
}

$id = $password = $user = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty(trim($_POST['id'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['user']))) {

    $id = trim($_POST['id']);
    $password = trim($_POST['password']);
    $user = $_POST['user'];

    // Define the queries and bindings for each user type
    $queries = [
        'student' => "SELECT sname, roll_no, password FROM student WHERE roll_no = ?",
        'faculty' => "SELECT fac_name, f_id, password FROM faculty WHERE f_id = ?",
        'admin' => "SELECT admin_name, admin_id, admin_pass FROM admin WHERE admin_id = ?"
    ];
    if (isset($queries[$user])) {
        $stmt = mysqli_prepare($conn, $queries[$user]);
        mysqli_stmt_bind_param($stmt, "s", $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $name, $id, $stored_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $stored_password)){
                        $_SESSION["user"] = $user;
                        $_SESSION["id"] = $id;
                        $_SESSION["name"] = $name;
                        $_SESSION["loggedin"] = true;
                        header("Location: http://localhost/College Management System/" . $redirects[$user]);
                        exit;
                    }
                    // else  
                      // echo "Incorrect";
                }
            }
        }
    }
    $err = "Invalid login credentials.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - College Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="../css/login.css" rel="stylesheet">
  <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />

</head>

<body>
  <div class="container-fluid">
    <form class="mx-auto" action="" method="post" onsubmit="return validateForm()">
      <h4 class="text-center">Login</h4>
      <div class="mb-3 mt-5">
        <label for="exampleInputEmail1" class="form-label">User ID</label>
        <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="idWarning" class="form-text warning"></small>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <small id="passwordWarning" class="form-text warning"></small>
      </div>
      <input type="hidden" name="fakepassword" value="fakepassword">
      <div class="radio-container">
        <input type="radio" id="student" name="user" value="student">
        <label for="student">Student</label>

        <input type="radio" id="faculty" name="user" value="faculty">
        <label for="faculty">Faculty</label>

        <input type="radio" id="admin" name="user" value="admin">
        <label for="admin">Admin</label>
      </div>
      <small id="radioWarning" class="form-text warning"></small>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-5">Login</button>
      </div>
    </form>
  </div>

  <script>
    function validateForm() {
      var idField = document.getElementById("exampleInputEmail1");
      var passwordField = document.getElementById("exampleInputPassword1");
      var idWarning = document.getElementById("idWarning");
      var passwordWarning = document.getElementById("passwordWarning");
      var radioWarning = document.getElementById("radioWarning");
      var radios = document.querySelectorAll('input[type="radio"]:checked');

      if (idField.value === "") {
        idWarning.style.display = "inline";
        idField.placeholder = "Enter ID";
      } else {
        idWarning.style.display = "none";
        idField.placeholder = "";
      }

      if (passwordField.value === "") {
        passwordWarning.style.display = "inline";
        passwordField.placeholder = "Enter Password";
      } else {
        passwordWarning.style.display = "none";
        passwordField.placeholder = "";
      }
      if (radios.length === 0) {
        radioWarning.textContent = "Please select a user type";
        radioWarning.style.display = "block";
      } else {
        radioWarning.style.display = "none";
      }

      if (idField.value === "" || passwordField.value === "" || radios.length === 0) {
        return false; // Prevent form submission
      }
      // If all fields are filled, allow form submission
      return true;
    }
  </script>
</body>

</html>