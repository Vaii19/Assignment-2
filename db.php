<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$DB_HOST = 'localhost';  // ✅ Added this line
$DB_USER = 'root';
$DB_PASS = '';    
$DB_NAME = 'student_db';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$conn->set_charset('utf8mb4');
?>
