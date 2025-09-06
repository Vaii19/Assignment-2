<?php
session_start();
require 'db.php';

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int)$_GET['id'];


    $stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $student = $stmt->get_result()->fetch_assoc();

    if (!$student) {
        echo "Student not found. <a href='view.php'>Back</a>";
        exit;
    }


    if (isset($_POST['update'])) {
        $name  = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $department = isset($_POST['department']) ? implode(",", $_POST['department']) : '';
        $address = $_POST['address'];

        $up = $conn->prepare("UPDATE students SET name=?, mobile=?, email=?, gender=?, department=?, address=? WHERE id=?");
        $up->bind_param("ssssssi", $name, $mobile, $email, $gender, $department, $address, $id);
        $up->execute();

        $_SESSION['message'] = "Record updated successfully";
        header("Location: process.php");
        exit;
    }

    $dept_selected = array_map('trim', explode(',', (string)$student['department']));
    function checked($cond) { return $cond ? 'checked' : ''; }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Students</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border: 1px solid #ddd; 
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  
  </style>
</head>
<body>
<?php if (isset($student)): ?>
  <h1>Edit Student Record</h1>
  <form method="post">
    Student Name:
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>
    Mobile: <input type="text" name="mobile" value="<?= htmlspecialchars($student['mobile']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required><br><br>
    Gender:
    <label><input type="radio" name="gender" value="Male" <?= checked($student['gender']==='Male') ?>> Male</label>
    <label><input type="radio" name="gender" value="Female" <?= checked($student['gender']==='Female') ?>> Female</label><br><br>
    Department:<br>
    <label><input type="checkbox" name="department[]" value="English" <?= checked(in_array('English',$dept_selected)) ?>> English</label>
    <label><input type="checkbox" name="department[]" value="Computer" <?= checked(in_array('Computer',$dept_selected)) ?>> Computer</label>
    <label><input type="checkbox" name="department[]" value="Business" <?= checked(in_array('Business',$dept_selected)) ?>> Business</label><br><br>
    Address:<br>
    <textarea name="address"><?= htmlspecialchars($student['address']) ?></textarea><br><br>
    <input type="submit" name="update" value="Update Record">
  </form>
  <p><a href="view.php">Cancel</a></p>

<?php else: ?>
  <h1>Registered Students</h1>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Mobile</th><th>Email</th>
      <th>Gender</th><th>Department</th><th>Address</th><th>Action</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM students ORDER BY id ASC");
    if ($res->num_rows === 0) {
        echo "<tr><td colspan='8'>No students yet.</td></tr>";
    } else {
        while ($r = $res->fetch_assoc()) {
            echo "<tr>
              <td>".htmlspecialchars($r['id'])."</td>
              <td>".htmlspecialchars($r['name'])."</td>
              <td>".htmlspecialchars($r['mobile'])."</td>
              <td>".htmlspecialchars($r['email'])."</td>
              <td>".htmlspecialchars($r['gender'])."</td>
              <td>".htmlspecialchars($r['department'])."</td>
              <td>".htmlspecialchars($r['address'])."</td>
              <td><a href='view.php?id={$r['id']}'>Edit</a></td>
            </tr>";
        }
    }
    ?>
  </table>
  <p><a href="index.php">Register a New Student</a></p>
<?php endif; ?>
</body>
</html>
