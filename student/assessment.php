<?php
include 'config.php';
include 'headercopy.php';

    if (!isset($_SESSION['unique_id'])) {
        header("Location: ../login/index");
        die();
    }
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM assessment WHERE eID = '$id'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <title>Assessment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>
<body>

  
  
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-40 ">
          <p class="text-2xl ">Take Assessment</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Assessment Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Result
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Score
                    </th>
    
                </tr>
            </thead>
            <tbody>
            <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
                <tr class="bg-white border-b dark:border-gray-300 text-black">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $i; ?>
                    </th>
                    <td class="py-4 px-6">
                        <?php echo $row['asses']; ?>
                    </td>
                    <td class="py-4 px-6  justify-center">
                        <button name="submit "type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='assessment2?id=<?php echo $row['eID']; ?>'">Start</button>
                      
                    </td>
                    <td class="py-4 px-6">
                        <?php echo $row['result']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo $row['score']; ?>
                    </td>
                </tr>
                
                

                <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
            </tbody>
        </table>
    </div>
      
    </div>
    
</body>
</html>