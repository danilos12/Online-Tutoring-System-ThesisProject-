<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
    }else if (mysqli_num_rows($query1) > 0) {
        $row = mysqli_fetch_assoc($query1);

        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
	<meta name="apple-mobile-web-app-capable" content="yes" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
<body>

<h1>pinduta video</h1>

<a href="../video/lobby.php"><img src="images/video-solid.svg" width="82px" height="50px"></a>

</body>
</html>