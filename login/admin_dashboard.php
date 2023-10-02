


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style2.css" />
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>




<body>
<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL_ADMIN'])) {
        header("Location: index");
        die();
    }
 include "config.php";
$query1 = mysqli_query($conn, "SELECT * FROM admin WHERE email='{$_SESSION['SESSION_EMAIL_ADMIN']}'");
    if (mysqli_num_rows($query1) > 0) {
        $row = mysqli_fetch_assoc($query1);
        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
    }


 $sqlEventList = "SELECT * FROM users";
 $resultEventList = $conn->query($sqlEventList);



           
           
?>


 
 



  <div class="container">
    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
     
      </div>
      <section class="dashboard">
        <div class="dashboard-list">
          <h1>Home</h1>
          <table id="table1" class="table">
            <thead>
              <tr>

                <th>Credentials</th>
                <th>ID #</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Code</th>
                <th>Position</th>
              
              </tr>
            </thead>
            <tbody>
            <?php 
                 while($row = $resultEventList->fetch_assoc()){
                  echo "<br> 
                  <tr>
                  <td>" .'<button>View</button>'. "</td>
                  <td>" .$row["id"]. "</td>
                  <td>" .$row["name"]. "</td>
                  <td>" .$row["email"]. "</td>
                  <td>" .$row["password"]. "</td>
                  <td>" .$row["code"]. "</td>
                  <td>" .$row["Position"]. "</td>
                  
                  
                  </tr>";
                }
                ?>

            
          
             
            </tbody>
          </table>
         
        </div>
      </section>
    </section>
  
  </div>

</body>
</html>
