<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';
$ide = $_GET['roomId'];
$query = mysqli_query($conn, "SELECT * FROM tut_reg WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");

if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    
    <link rel='stylesheet' type='text/css' media="all" href='./styles/lobby.css'>
  <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
</head>
<body>
    <div id="form__container">
        <div id="form__container__header">
            <p>👋 Create or Join Room</p>
        </div>


       <form id="lobby__form">

          
        <div class="form__field__wrapper">
            
            <?php echo '<input type="hidden" name="name" value="'.$_SESSION['fname'].'"></input>'; ?>
            
        </div>
            <div class="form__field__wrapper">
                <label>Welcome</label>
                
                <?php echo '<input type="hidden" name="room" value="'.$ide.'"></input>'; ?>
            </div>

            <div class="form__field__wrapper">
                <button type="submit">Go to Room 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
               </button>
            </div>
       </form>
   </div>

   <script type="text/javascript" src="./js/lobby.js" crossorigin="anonymous"></script>
</body>
</html>