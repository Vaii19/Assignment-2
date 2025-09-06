<?php
require 'db.php';

if (isset($_POST['submit'])) {
  $name  = $_POST['name'] ?? '';
  $mobile = $_POST['mobile'] ?? '';
  $email = $_POST['email'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $department = isset($_POST['department']) ? implode(",", $_POST['department']) : '';
  $address = $_POST['address'] ?? '';

  // simple insert (classroom demo)
  $stmt = $conn->prepare(
    "INSERT INTO students (name, mobile, email, gender, department, address)
     VALUES (?,?,?,?,?,?)"
  );
  $stmt->bind_param("ssssss", $name, $mobile, $email, $gender, $department, $address);
  $stmt->execute();

  header("Location: process.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Registeration Form </title>
</head>

<body>
  <h1>Student Registeration Form</h1>

  <form method="post">
    Student Name: <input type="text" name="name" placeholder="Name" required><br><br>
    Mobile no.:+95- <input type="text" name="mobile" required><br><br>
    Email: <input type="email" name="email" required><br><br>

    Gender:
    <label><input type="radio" name="gender" value="Male" required> Male</label>
    <label><input type="radio" name="gender" value="Female"> Female</label>
    <br><br>

    Department:<br>
    <label><input type="checkbox" name="department[]" value="English"> English</label>
    <label><input type="checkbox" name="department[]" value="Computer"> Computer</label>
    <label><input type="checkbox" name="department[]" value="Business"> Business</label>
    <br><br>

    Address:<br>
    <textarea name="address" rows="4" cols="30"></textarea><br><br>

    <input type="submit" name="submit" value="Register">
  </form>

  <p><a href="view.php">View All Registered Students</a></p>
</body>
</html>
