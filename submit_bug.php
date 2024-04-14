<?php  
// 检查是否是通过 POST 方法提交的表单  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // 获取表单数据  
    $name = $_POST["name"];  
    $email = $_POST["email"];  
    $bugDescription = $_POST["bug-description"];  
    $stepsToReproduce = $_POST["steps-to-reproduce"];  
  
    // 数据验证和清理（在实际应用中非常重要）  
    $name = htmlspecialchars($name);  
    $email = htmlspecialchars($email);  
    $bugDescription = htmlspecialchars($bugDescription);  
    $stepsToReproduce = htmlspecialchars($stepsToReproduce);  
  
    // 邮件主题  
    $subject = "新的Bug反馈";  
  
    // 构建邮件正文  
    $message = "姓名: $name\n";  
    $message .= "邮箱: $email\n";  
    $message .= "Bug 描述:\n$bugDescription\n";  
    $message .= "重现步骤:\n$stepsToReproduce\n";  
  
    // 收件人的电子邮件地址（替换为实际的邮箱地址）  
    $to = "your-support-email@example.com";  
  
    // 邮件头部信息  
    $headers = "From: Bug反馈系统 <noreply@yourdomain.com>\r\n";  
    $headers .= "Reply-To: $email\r\n";  
    $headers .= "MIME-Version: 1.0\r\n";  
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";  
  
    // 发送邮件  
    if (mail($to, $subject, $message, $headers)) {  
        echo "Bug 反馈已发送至邮箱，感谢您的反馈！";  
    } else {  
        echo "发送邮件时出错，请稍后再试。";  
    }  
} else {  
    // 如果不是通过 POST 方法提交，显示错误信息  
    echo "错误：无效的请求方法。";  
}  
?>
