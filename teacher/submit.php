<?php
    include('config.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';


// get the incoming POST data
$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);

    $fname = mysqli_real_escape_string($conn, $_POST['fnmes']);
    $lname = mysqli_real_escape_string($conn, $_POST['lnames']);
    $e = mysqli_real_escape_string($conn, $_POST['emailsss']);





    $filet1 = rand(1000, 10000) . "-" . $_FILES["file1"]["name"];
    $tname1 = $_FILES["file1"]["tmp_name"];
    $uploads_dir1 = '../files/';
    move_uploaded_file($tname1, $uploads_dir1 . '/' . $filet1);

    $filet2 = rand(1000, 10000) . "-" . $_FILES["file2"]["name"];
    $tname2 = $_FILES["file2"]["tmp_name"];
    $uploads_dir2 = '../files/';
    move_uploaded_file($tname2, $uploads_dir2 . '/' . $filet2);


    $filet3 = rand(1000, 10000) . "-" . $_FILES["file3"]["name"];
    $tname3 = $_FILES["file3"]["tmp_name"];
    $uploads_dir3 = '../files/';
    move_uploaded_file($tname3, $uploads_dir3 . '/' . $filet3);


    $filet4 = rand(1000, 10000) . "-" . $_FILES["file4"]["name"];
    $tname4 = $_FILES["file4"]["tmp_name"];
    $uploads_dir4 = '../files/';
    move_uploaded_file($tname4, $uploads_dir4 . '/' . $filet4);





$statss = "Pending";



    $sql = "INSERT INTO tut_reg(fname,lname,email,gov_id,diploma,resumes,video,stats,datee)
    VALUES('$fname','$lname','$e','$filet1','$filet2','$filet3','$filet4','$statss',CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $sql)) {


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
            $mail->addAddress($e);
            $pagecontents1 = file_get_contents("./emailSend.html");
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Apply form';
            $mail->Body    = $pagecontents1;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        echo "success";
    } else {
        echo "error";
    }
?>
