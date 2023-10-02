<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
    header("Location: ../login/index");
    die();
}
$query = mysqli_query($conn, "SELECT * FROM lesson WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>My Subject</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body class="bg-gray-100">
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex flex-col items-left w-3/4 h-40 ">
          <p class="text-2xl font-semibold ">Manage Subject</p>
            <a href="./lesson" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-36 ">Add Subject</a>
            <a href="./sesHistory" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-36 ">Session History</a>
        </div>
    
            <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                    <tr >
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-2">
                            My Subjects
                        </th>
                        
                        <th scope="col" class="py-3 px-2 ">
                            Enrolled Student
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            My Course Outline
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            My Hourly Rate
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($query->num_rows > 0) {
                        $i = 0;
                        while ($row = $query->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-200 text-black">
                                <th scope="row" class="py-6 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $i; ?>
                                </th>
                                <td class="py-4 px-4">
                                    <?php echo $row['subj']; ?>
                                </td>
                                
                                <td class="py-6 px-10  flex  ">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='viewSub2?sub=<?php echo $row['subj']; ?>'">view</button>
                                    <input type="hidden" id="iidd" name="iidd" value="<?php echo $row['id']; ?>">
                                    
                                </td>
                                <td class="py-3 px-2">
                                    <a href="../files/<?php echo $row["filee"]; ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo $row["filee"]; ?></a>
                                </td>
                                <td class="py-3 px-10">
                                    ₱<?php echo $row['hourlyrate']; ?>
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