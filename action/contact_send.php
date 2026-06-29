<?php 


      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;

      require '../vendor/autoload.php';

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = htmlspecialchars($_POST['fName']);
        $lname = htmlspecialchars($_POST['lName']);
        $emailAddress = htmlspecialchars($_POST['emailAddress']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $mail = new PHPMailer(true);

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mdarafathossenarob@gmail.com';
            $mail->Password = 'iuty otqx smir xteb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('mdarafathossenarob@gmail.com', $fname . ' ' . $lname);
            $mail->addReplyTo($emailAddress, $fname . ' ' . $lname);
            $mail->addAddress('mdarafathossenarob@gmail.com');
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = "
            <p>First Name: " . $fname . "</p>
            <p>Last Name: " . $lname . "</p>
            <p>Email Address: " . $emailAddress . "</p>
            <p>Subject: " . $subject . "</p>
            <p>Message: " . $message . "</p>
            ";
            $mail->send();
            echo 'Message sent successfully!';
            header('Location: ../contact.php');
            exit;
        }catch (Exception $e){
            echo "message could not be sent. {$mail->ErrorInfo}";
        }
    }
?>