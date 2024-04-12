<?php  
session_start();  
  
// 连接到数据库（请根据实际情况修改这些值）  
$servername = "localhost";  
$username = "your_username";  
$password = "your_password";  
$dbname = "your_database";  
  
// 创建连接  
$conn = new mysqli($servername, $username, $password, $dbname);  
  
// 检查连接  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
  
// 验证用户是否登录  
if (!isset($_SESSION['username'])) {  
    header("Location: login.php"); // 重定向到登录页面  
    exit();  
}  
  
// 收集表单数据  
$title = $conn->real_escape_string($_POST['title']);  
$description = $conn->real_escape_string($_POST['description']);  
$reporter = $conn->real_escape_string($_SESSION['username']);  
  
// 插入数据到数据库  
$sql = "INSERT INTO bugs (title, description, reporter) VALUES ('$title', '$description', '$reporter')";  
  
if ($conn->query($sql) === TRUE) {  
    echo "Bug submitted successfully.";  
} else {  
    echo "Error: " . $sql . "<br>" . $conn->error;  
}  
  
$conn->close();  
?>
