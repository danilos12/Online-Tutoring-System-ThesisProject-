
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
if(isset($_POST['displaysend33'])){
  $id = $_POST['displaysend33'];
  $sql_query  ="SELECT * from approved WHERE unique_id=$id";
  $sql_query2  ="SELECT * from lesson WHERE unique_id=$id";
  $results = mysqli_query($conn,$sql_query);
  $row = $results->fetch_assoc();
  $results2 = mysqli_query($conn,$sql_query2);
  $row2 = $results->fetch_assoc();


  $ear = $row['earnings'];
  
  $eml = $row['email'];
  $on = $ear * 0;
  
  $sql22 = mysqli_query($conn, "UPDATE approved SET earnings = '{$on}' WHERE unique_id = '$id'");
$sql222 = mysqli_query($conn, "UPDATE lesson SET earn = '{$on}' WHERE unique_id = '$id'");
  if($sql22){

    echo "<div style='display: none;'>";
    //Create an instance; passing `true` enables exceptions
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
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('dan2x27@gmail.com');
        $mail->addAddress($eml);
        $pagecontents1 = file_get_contents("./paid.html");
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Payday';
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