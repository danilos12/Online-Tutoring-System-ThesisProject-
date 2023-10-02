<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    session_start();

    require 'vendor/autoload.php';

include 'config.php';
$msg = "";
if (isset($_POST['submit'])) {
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$No = mysqli_real_escape_string($conn, $_POST['numbers']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$filet1 = rand(1000, 10000) . "-" . $_FILES["file1"]["name"];
$tname1 = $_FILES["file1"]["tmp_name"];
$uploads_dir1 = '../files';
move_uploaded_file($tname1, $uploads_dir1 . '/' . $filet1);


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {

                            $ran_id = rand(time(), 100000000);
                            $status = "Offline now";
                            $code = mysqli_real_escape_string($conn, md5(rand()));
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email,numbers,	valid_id, password, status, code)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}','{$No}','{$filet1}', '{$encrypt_pass}', '{$status}', '{$code}')");
                            $insert_query = mysqli_query($conn, "INSERT INTO allusers (unique_id, fname, lname, email, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$status}')");
                            $insert_query2 = mysqli_query($conn, "INSERT INTO deposit (unique_id)VALUES ('{$ran_id}')");
                            if ($insert_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
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
                                    $mail->addAddress($email);
                                    $pagecontents1 = file_get_contents("./tt.html");
                        $pagecontents1 = str_replace('{CODE1}', $code, $pagecontents1);
                        $pagecontents1 = str_replace('{NEME}', mb_strtoupper($fname), $pagecontents1);
                        $pagecontents1 = str_replace('{NEME2}', mb_strtoupper($lname), $pagecontents1);

                                    //Content
                                    $mail->isHTML(true);                                  //Set email format to HTML
                                    $mail->Subject = 'no reply';
                                    $mail->Body    = $pagecontents1;


                                    $mail->send();
                                    echo 'Message has been sent';
                                } catch (Exception $e) {
                                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                }
                                echo "</div>";
                                $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";

                            } else {
                                echo "Something went wrong. Please try again!";
                            }


        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Register</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <a href="../index.php" class="alert-close">
                        <span class="fa fa-close"></span>
                    </a>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/register.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register As Student</h2>

                        <?php echo $msg; ?>
                        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">

                        <input type="text" name="fname" placeholder="First name" required>
                        <input type="text" name="lname" placeholder="Last name" required>
                        <input type="text" name="numbers" placeholder="Mobile No." required>


                        <input type="text" name="email" placeholder="Enter your email" required>

                        <input type="password" name="password" placeholder="Enter your password" required>
                        <label for="file1">Upload Valid ID</label>
                        <input type="file" id="file1" name="file1" placeholder="Upload valid id" required>

                        <input class="example" id="checkk" type="checkbox" required>
                            <label class="tt" for="checkbox"> I acknowledge that I have read and agree to the <a href="./terms-conditions" target="_blank">Terms and Conditions</a>.*</label>
                            <style>
                                input.example {
                                    width: auto;
                                }

                                label.tt {
                                    text-align: justify;
                                    text-justify: inter-word;
                                    font-size: 14px;
                                    opacity: .6;
                                }
                            </style>
                        <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="index">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js">
        var x = document.getElementById("checkk").required;
    </script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>