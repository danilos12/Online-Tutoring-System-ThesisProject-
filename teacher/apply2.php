<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'config.php';
require 'vendor/autoload.php';

    
    
    $q = mysqli_real_escape_string($conn, $_POST['usFnme']);
    $w = mysqli_real_escape_string($conn, $_POST['usLnme']);
    $e = mysqli_real_escape_string($conn, $_POST['usEmail']);
    $r = mysqli_real_escape_string($conn, $_POST['usCont']);

    $filet1 = rand(1000, 10000) . "-" . $_FILES["usF"]["name"];
    $tname1 = $_FILES["usF"]["tmp_name"];
    $uploads_dir1 = '../files';
    move_uploaded_file($tname1, $uploads_dir1 . '/' . $filet1);

    $filet2 = rand(1000, 10000) . "-" . $_FILES["usF1"]["name"];
    $tname2 = $_FILES["usF1"]["tmp_name"];
    $uploads_dir2 = '../files';
    move_uploaded_file($tname2, $uploads_dir2 . '/' . $filet2);

    $filet3 = rand(1000, 10000) . "-" . $_FILES["usF2"]["name"];
    $tname3 = $_FILES["usF2"]["tmp_name"];
    $uploads_dir3 = '../files';
    move_uploaded_file($tname3, $uploads_dir3 . '/' . $filet3);

    $sql = "INSERT into applyey(fname,lname,email,contact,introVid,ident,diploma,datee) 
    VALUES('$q','$w','$e','$r','$filet1','$filet2','$filet3',CURRENT_TIMESTAMP)";
    if (mysqli_query($conn, $sql)) {


        echo "<div style='display: none;'>";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dpansag14@gmail.com';                     //SMTP username
            $mail->Password   = 'pvwztlwytabedssh';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('dpansag14@gmail.com');
            $mail->addAddress($e);
            $pagecontents1 = file_get_contents("./emailSend.php");
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Apply form';
            $mail->Body    = $pagecontents1;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "</div>";
        echo "success";
    } else {
        echo "error";
    }

?>