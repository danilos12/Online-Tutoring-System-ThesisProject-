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

  if(isset($_POST['geng'])){
    $ids = $_POST['geng'];
    $rooms = $_POST['geng3'];

    $sql_query  ="SELECT * from lesson WHERE roomID=$rooms";
    $results = mysqli_query($conn,$sql_query);
    $row = $results->fetch_assoc();
    $arr[] = $row;
    $name1 = $row['fname'];
    $SUBS = $row['subj'];

    $status = 'Declined';



    $sql_query2  ="SELECT * from tut_reg WHERE unique_id=$ids";

    $results2 = mysqli_query($conn,$sql_query2);
    $row2 = $results2->fetch_assoc();
    $arr2[] = $row2;

        $eml = $row2['email'];



        $sql22 = mysqli_query($conn, "DELETE FROM lesson WHERE roomID = '$rooms'");

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
        $pagecontents1 = file_get_contents("./delete.php");
        $pagecontents1 = str_replace('{NAME}', $name1, $pagecontents1);
        $pagecontents1 = str_replace('{SUBJECT}', $SUBS, $pagecontents1);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Suspicious Post';
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