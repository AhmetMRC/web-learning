<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "ahmet.23.pasa.23@gmail.com";
    $subject = "Yeni İletişim Formu Mesajı";
    
    $email_content = "İsim: $name\n";
    $email_content .= "E-posta: $email\n\n";
    $email_content .= "Mesaj:\n$message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    if(mail($to, $subject, $email_content, $headers)) {
        echo json_encode(["status" => "success", "message" => "Mesajınız başarıyla gönderildi!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Mesaj gönderilirken bir hata oluştu."]);
    }
    exit;
} 