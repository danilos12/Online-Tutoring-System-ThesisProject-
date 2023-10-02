<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
    header("Location: ../login/index");
    die();
}
$query = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$id = $_GET['sub'];
$query211 = mysqli_query($conn, "SELECT * FROM enrolled WHERE subject = '$id'");




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Enrolled Student</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body class="bg-gray-100">
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex-col items-center w-3/4 h-40 ">
            <p class="text-2xl ">Enrolled Student</p>
          <p class="text-2xl ">Subject: <?php echo $id ?></p>
        
        </div>
            <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                    <tr >
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-2">
                            Enrolled Student
                        </th>
                        <th scope="col" class="py-3 px-2">
                            Schedule
                        </th>
                        <th scope="col" class="py-3 px-12 ">
                            Assessment
                        </th>
                        <th scope="col" class="py-3 px-12 ">
                            Go to room
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($query211->num_rows > 0) {
                        $i = 0;
                        while ($row2 = $query211->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-200 text-black">
                                <th scope="row" class="py-6 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $i; ?>
                                </th>
                                <td class="py-4 px-6">
                                    <?php echo $row2['fname']," ",$row2['lname']; ?>
                                </td>
                                <td class="py-4 px-6">
                                    <?php $time = strtotime($row2['start']);
                                    $time2 = strtotime($row2['end']);
                                    echo $row2['sched']." / ". date("g:i a", $time) ." - ". date("g:i a", $time2);?>
                                </td>
                                <td class="py-6 px-10  flex  ">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='assessment?id=<?php echo $row2['eID']; ?>'">view</button>
                                    <input type="hidden" id="iidd" name="iidd" value="<?php echo $row2['id']; ?>">
                                    
                                </td>
                                <td class="py-6 px-10">
                                    <a href="https://owlhub.me/teacher/Call/lobby2?roomId=<?php echo $row2['roomID']; ?>" class="text-blue-500 underline hover:text-blue-700">Go to room</a>
                                </td>
                                

                            </tr>
                            

                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">No records found...</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
</body>
</html>