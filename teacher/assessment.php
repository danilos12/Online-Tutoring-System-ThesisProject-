<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
    header("Location: ../login/index");
    die();
}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM assessment WHERE eID = '$id'");


$query211 = mysqli_query($conn, "SELECT * FROM enrolled WHERE eID = '$id'");

if (mysqli_num_rows($query211) > 0) {
  $rowss21 = mysqli_fetch_assoc($query211);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Assessment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="bg-gray-100">
    <style>
        .my-font-size{
    font-size: 9px;
}
        .toast {
  background-color: #ffffff;
}
.toast-message {
  color: #000000; 
}
.toast-title {
  color: #000000; 
}

.toast-close-button {
  color: #8f8f8f;
}
.toast-close-button:hover {
  color: #000000;
}
#toast-container>.toast-warning {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #ffc107;
}
.toast-warning .toast-progress {
  background-color: #ffc107;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-error {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #dc3545;
}
.toast-error .toast-progress {
  background-color: #dc3545;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-success {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #198754;
}
.toast-success .toast-progress {
  background-color: #198754;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-info {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #0dcaf0;
}
.toast-info .toast-progress {
  background-color: #0dcaf0;
  height: 4px;
  opacity: 100%;
}
.toast {
    width: 400px !important;
}
    </style>
<div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-40 ">
          <p class="text-2xl ">Manage Assessment of: <?php echo $rowss21['fname']," ",$rowss21['lname']; ?></p>
        
        </div>


    
            <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                    <tr >
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-2">
                            Assessment Name
                        </th>
                        
                        <th scope="col" class="py-3 px-12 ">
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
                    if ($query->num_rows > 0) {
                        $i = 0;
                        while ($row = $query->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-200 text-black">
                                <th scope="row" class="py-6 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $i; ?>
                                </th>
                                <td class="py-4 px-6">
                                    <?php echo $row['asses']; ?>
                                </td>
                                
                                <td class="py-6 px-0  flex  ">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='assessment2?id=<?php echo $id; ?>'">view</button>
                                    <input type="hidden" id="iidd" name="iidd" value="<?php echo $id ?>">
                                    <button id="delet"type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="deleteData(<?php echo $row['unID']; ?>)">Delete</button>
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
                    } else {
                        echo '<tr><td colspan="6">No records found...</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="butt flex justify-center mt-24 h-24 ">
        <div class=" w-full flex justify-center items-center">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-12 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='addassessment?id=<?php echo $id; ?>'">Add Assessment +</button>
        </div>

    </div>

    <script>
    
    
    function deleteData(unID) {
    var formData = new FormData();
    formData.append("uIdd", unID);
    axios.post('delete.php', formData)
        .then(function (response) {
            
            toastr.success("Successfully deleted <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {location.reload();}});
          
        })
        .catch(function (error) {
            toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
        });
}
  </script>   
</body>

</html>