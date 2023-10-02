<?php
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../teacher/vendor/autoload.php';

$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);
  $msg = '';
  $_POST = json_decode(array_keys($_POST)[0], true);

  if(isset($_POST['decsss'])){
    $ids = $_POST['decsss'];
    $sql_query  ="SELECT * from tut_reg WHERE user_id=$ids";

    $results = mysqli_query($conn,$sql_query);
    $row = $results->fetch_assoc();
    $arr[] = $row;



    $eml = $row['email'];
    $status = 'Declined';


    $sql22 = mysqli_query($conn, "UPDATE tut_reg SET stats = '$status' WHERE user_id = '$ids'");

  if($sql22){

    echo "<div style='display: none;'>";
    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dan2x27@gmail.com';                     //SMTP username
        $mail->Password   = 'dsqdctkuqfspymmf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('dan2x27@gmail.com');
        $mail->addAddress($eml);
        $pagecontents1 = file_get_contents("./rej.html");
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


  }else{
    echo 'Failed';

  }





  }



?>