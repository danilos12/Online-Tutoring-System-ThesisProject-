<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("Location: ../student/welcome");
        die();
    }else if (isset($_SESSION['SESSION_EMAIL_ADMIN'])) {
        header("Location: ../admin/admin_2");
        die();
    }else if (isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
        header("Location: ../teacher/welcome");
        die();
    }

    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");

            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $emailAdmin = mysqli_real_escape_string($conn, $_POST['email']);
        $passwordAdmin = mysqli_real_escape_string($conn, ($_POST['password']));
        $emailTeacher = mysqli_real_escape_string($conn, $_POST['email']);
        $passwordTeacher = mysqli_real_escape_string($conn, ($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $sql1 = "SELECT * FROM admin WHERE email='{$emailAdmin}' AND password='{$passwordAdmin}'";
        $result1 = mysqli_query($conn, $sql1);
        $sql2 = "SELECT * FROM tut_reg WHERE email='{$emailTeacher}' AND password='{$passwordTeacher}'";
        $result2 = mysqli_query($conn, $sql2);


        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['unique_id'] = $row['unique_id'];
                $_SESSION['fname'] = $row['fname'];
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                $sql2 = mysqli_query($conn, "UPDATE allusers SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                header("Location: ../student/welcome");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        }
        else if (mysqli_num_rows($result2) === 1) {
            $row = mysqli_fetch_assoc($result2);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL_TEACHER'] = $row['unique_id'];
                $_SESSION['fname'] = $row['fname'];
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE tut_reg SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                $sql2 = mysqli_query($conn, "UPDATE allusers SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                header("Location: ../teacher/welcome");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        }

        else if (mysqli_num_rows($result1) === 1) {
            $row = mysqli_fetch_assoc($result1);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL_ADMIN'] = $emailAdmin;

                header("Location: ../admin/admin_2");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        }
        else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }



    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
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
                    <a href="../index" class="alert-close">
                        <span class="fa fa-close"></span>
                    </a>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/teach.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>

                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register">Register as Student</a>.</p>
                            <p>Create Account! <a href="../teacher/teacreg">Register as Tutor</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
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