<?php
include 'config.php';
include 'headercopy.php';

if (!isset($_SESSION['unique_id'])) {
    header("Location: ../login/index");
    die();
}
$query = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id_stud = {$_SESSION['unique_id']}");


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
    <title>My subject</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    
    <link rel="stylesheet" href="ss.css">
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js"
        integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    
    

    <style>
        .modal {
            transition: all 0.3s ease-out;
        }

        .modal-overlay {
            transition: all 0.3s ease-out;
        }

        .modal-container {
            transition: all 0.3s ease-out;
        }


        #modal-button:hover {
            cursor: pointer;
        }

        #modal-button:focus {
            outline: none;
        }


        .modal-open {
            pointer-events: auto;
            opacity: 1;
        }

        .modal-open .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-open .modal-container {
            transform: scale(1);
        }


        .modal-close {
            pointer-events: auto;
        }

        .modal-close:hover {
            cursor: pointer;
        }

        .modal-close:focus {
            outline: none;
        }

        .modal-close .modal-container {
            transform: scale(0.9);
        }

        .modal-close .modal-overlay {
            background-color: transparent;
        }

        .modal-close .modal {
            pointer-events: none;
            opacity: 0;
        }
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
          <p class="text-2xl ">My Subject</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-2">
                            My subjects
                        </th>
                        <th scope="col" class="py-3 px-2">
                            Tutor's Name
                        </th>
                        <th scope="col" class="py-3 px-2">
                            My schedule
                        </th>
                        <th scope="col" class="py-3 px-2">
                            Course outline
                        </th>
                        <th scope="col" class="py-3 px-12 ">
                            Assessment
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            My Room
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            Set my schedule
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            Hourly Rate
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            Session History
                        </th>
                        <th scope="col" class="py-3 px-2 ">
                            Rating
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
                                <td class="py-4 px-2">
                                    <?php echo $row['subject']; ?>
                                </td>
                                <td class="py-4 px-2">
                                    
                                    <a onclick="window.location.href='viewProf?id=<?php echo $row['unique_id']; ?>'" class="font-bold text-black cursor-pointer dark:text-black hover:underline"><?php echo $row['tFname']." ".$row['tLname']; ?></a>
                                </td>
                                <td class="py-3 px-2">
                                    <?php $time = strtotime($row['start']);
                                    $time2 = strtotime($row['end']);
                                    echo $row['sched']." / ". date("g:i a", $time) ." - ". date("g:i a", $time2);?>
                                </td>
                                <td class="py-3 px-2">
                                    <a href="../files/<?php echo $row["filee"]; ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo $row["filee"]; ?></a>
                                </td>
                                <td class="py-6 px-12  flex  ">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='assessment?id=<?php echo $row['eID']; ?>'">view</button>
                                    <input type="hidden" id="iidd" name="iidd" value="<?php echo $row['id']; ?>">
                                    
                                </td>
                                <td class="py-3 px-2">
                                    <a href="https://owlhub.me/student/Call/lobby?roomId=<?php echo $row['roomID']; ?>" class="text-blue-500 underline hover:text-blue-700">Go to room</a>
                                </td>
                                <td class="py-3 px-2">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='setSched?id=<?php echo $row['eID']; ?>'">set</button>
                                </td>
                                
                                <td class="py-3 px-2">
                                    ₱<?php echo $row['hourlyrate']; ?>
                                </td>
                                <td class="py-3 px-2">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='viewSes?id=<?php echo $row['roomID']; ?>'">view</button>
                                </td>
                                
                                    <?php

  
 
  $sql = "SELECT rate FROM rating WHERE rID = '".$row['roomID']."'";
  $result = $conn->query($sql);
  
  if($result->num_rows > 0){
   
    $rate = $result->fetch_assoc();
    echo '<td class="py-3 px-4">'.$rate['rate'].' / 5</td>';
  }else{
   
    echo '<td class="py-3 px-2"><button type="button" class="rating-tut text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-romy="'.$row['roomID'].'" data-fna="'.$row['fname'].'"  data-lna="'.$row['lname'].'" data-sub="'.$row['subject'].'" data-unq="'.$row['unique_id'].'" data-kiki="'.$row['unique_id_stud'].'">Rate</button></td>';
  }

?>
                                
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
        
        <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-content py-4 text-left px-6">

                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Rate Tutor</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>


                <x-star-rating id="tey" value="0" number="5"></x-star-rating>
                
<label for="messageRate" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
<textarea id="messageRate" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>


                <div class="flex justify-end pt-2">
                    <button id="yess"
                        class="huy px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-600">Yes</button>

                    <button
                        class="et modal-close  px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">No</button>
                </div>
            </div>
        </div>
    </div>
<script>


        var modal = document.querySelector(".modal");
        var modalButton = document.querySelector(".rating-tut");
        var closeButton = document.querySelector(".modal-close");
        var closeButton2 = document.querySelector(".et");
        var closeButton3 = document.querySelector(".huy");
const modal2Buttons = document.getElementsByClassName('rating-tut');
let rom = "";
let fna = "";
let lna = "";
let sub = "";
let unq = "";
let rating = "";
let msgRat = "";
let kiki = "";
for (let i = 0; i < modal2Buttons.length; i++) {
  modal2Buttons[i].addEventListener('click', (e) => {
    e.preventDefault();
            modal.classList.add("modal-open");
             rom = event.target.dataset.romy;
            fna = event.target.dataset.fna;
            lna = event.target.dataset.lna;
            sub = event.target.dataset.sub;
            unq = event.target.dataset.unq;
            kiki = event.target.dataset.kiki;
            
  });
}

        


        closeButton.addEventListener("click", function () {
            modal.classList.remove("modal-open");
        });
        closeButton2.addEventListener("click", function () {
            modal.classList.remove("modal-open");
            
            
        });
        closeButton3.addEventListener("click", function () {
            
            
            rating = document.getElementById('tey').value;
            //console.log(rating);
            msgRat = document.getElementById('messageRate').value;
            //console.log(msgRat);
            
            let xhr = new XMLHttpRequest();
  xhr.open('POST', 'rat.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
  toastr.success("Done Rating <br><span class='my-font-size'>- page will be reloaded after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {location.reload();}});
              modal.classList.remove("modal-open");  

}  else {
  toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true});
}
  };
  xhr.send('rate=' + rating + '&romy=' + rom + '&fnam=' + fna + '&lnam=' + lna + '&subj=' + sub + '&unqq=' + unq + '&msgRate=' + msgRat + '&unqStud=' + kiki);
  
        });

        
    </script>
<script src="rating.js"></script>
</body>
</html>