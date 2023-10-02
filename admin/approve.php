
<?php
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../teacher/vendor/autoload.php';

$_POST = json_decode(array_keys($_POST)[0], true);

if(isset($_POST['displaysend33'])){
  $ids = $_POST['displaysend33'];
  $sql_query  ="SELECT * from tut_reg WHERE user_id=$ids";

  $results = mysqli_query($conn,$sql_query);
  $row = $results->fetch_assoc();
  $arr[] = $row;



  $eml = $row['email'];
  $fname = $row['fname'];
  $lname = $row['lname'];
    $ran_id = rand(time(), 100000000);
  $status1 = 'Approved';
  $pass = rand(time(), 1000000);
  $status = "Offline now";

  $sql22 = mysqli_query($conn, "UPDATE tut_reg SET stats = '$status1' WHERE user_id = '$ids'");
  $sql23 = mysqli_query($conn, "UPDATE tut_reg SET unique_id = ' $ran_id' WHERE user_id = '$ids'");

  $insert_query22 = mysqli_query($conn, "INSERT INTO allusers (unique_id, fname, lname, email, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$eml}', '{$status}')");
  if($insert_query22){

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
        $pagecontents1 = file_get_contents("./emailSend.php");
        $pagecontents1 = str_replace('{EMAIL}', $eml, $pagecontents1);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'You have been accepted';
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