<?php
include 'config.php';
include 'headercopy.php';

if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
$qry = mysqli_query($conn, "SELECT * FROM assessment WHERE unique_id_stud = {$_SESSION['unique_id']}");
$id = $_GET['id'];
$sql2 = "select * from  assessment where eID='$id'";
$qry2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($qry) > 0) {
  $rowss = mysqli_fetch_assoc($qry);
}
if (mysqli_num_rows($qry2) > 0) {
  $rowss2 = mysqli_fetch_assoc($qry2);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assessment Test</title>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
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

<input type="hidden" id="unq" name="unq" value="<?php echo $rowss2["unique_id"]; ?>">



  <div class="flex justify-center items-center w-full h-12">
    <div class="d w-2/4">
      <p class="text-2xl font-medium">Assessment Details</p>
    </div>
  </div>
  <div class="flex justify-center  w-full h-24 ">

    <div class="hey block p-3.5  w-2/4 border border-slate-300 ">
      <div class="flex h-1/2">
        <div class="w-1/2 flex  ">
          <p class="font-medium">Name:</p>
          <p class="font-normal ml-1"><?php echo $rowss['fname']; ?></p>
        </div>
        <div class="w-1/2  flex">
          <p class="font-medium ">Subject:</p>
          <p class="font-normal ml-1"><?php echo $rowss2['asses']; ?></p>
        </div>
      </div>
      <div class="flex w-full  h-1/2">
        <div class="w-1/2 flex">
          <p class="font-medium">Date:</p>
          <p class="font-normal ml-1"><?php echo $rowss2['datee']; ?></p>
        </div>
        <div class="w-1/2 flex">
          <p class="font-medium">Teacher:</p>
          <p class="font-normal ml-1"><?php echo $rowss2['teFname'] . " " . $rowss2['teLname']; ?></p>
        </div>
      </div>


    </div>
  </div>
  <div class="flex justify-center items-center w-full h-24 ">
    <div class="d w-2/4">
      <p class="text-2xl font-medium">Answer the following questions</p>
    </div>
  </div>
  <form id="foo"method="POST">
    <section class="flex justify-center w-full h-40 mt-2 ">

      <div class="block  h-full ">
        <div class="d w-full h-1/4  ">
          <p class="text-2xl font-medium"><?php echo $rowss2['q1']; ?></p>
        </div>
        <div class="d  w-full h-1/2 bg-green-400"><textarea class="border border-slate-300" id="ans1" name="Answer1" id="" cols="120" rows="5"></textarea></div>
      </div>
    </section>
    <section class="flex justify-center w-full h-40 mt-2 ">

      <div class="block  h-full ">
        <div class="d w-full h-1/4  ">
          <p class="text-2xl font-medium"><?php echo $rowss2['q2']; ?></p>
        </div>
        <div class="d  w-full h-1/2 bg-green-400"><textarea class="border border-slate-300" id="ans2" name="Answer2" id="" cols="120" rows="5"></textarea></div>
      </div>
    </section>
    <section class="flex justify-center w-full h-40 mt-2 ">

      <div class="block  h-full ">
        <div class="d w-full h-1/4  ">
          <p class="text-2xl font-medium"><?php echo $rowss2['q3']; ?></p>
        </div>
        <div class="d  w-full h-1/2 bg-green-400"><textarea class="border border-slate-300" id="ans3" name="Answer3" id="" cols="120" rows="5"></textarea></div>
      </div>
    </section>
    <section class="flex justify-center w-full h-40 mt-2 ">

      <div class="block  h-full ">
        <div class="d w-full h-1/4  ">
          <p class="text-2xl font-medium"><?php echo $rowss2['q4']; ?></p>
        </div>
        <div class="d  w-full h-1/2 bg-green-400"><textarea class="border border-slate-300" id="ans4" name="Answer4" id="" cols="120" rows="5"></textarea></div>
      </div>
    </section>
    <section class="flex justify-center w-full h-40 mt-2 ">

      <div class="block  h-full ">
        <div class="d w-full h-1/4  ">
          <p class="text-2xl font-medium"><?php echo $rowss2['q5']; ?></p>
        </div>
        <div class="d  w-full h-1/2 bg-green-400"><textarea class="border border-slate-300" id="ans5" name="Answer5" id="" cols="120" rows="5"></textarea></div>
      </div>
    </section>
        <section class="flex justify-center items-center w-full h-40 py-40 ">
      <div class="flex flex-col w-full justify-center  items-center ">
        <div class="block w-1/2   ">
         <label class="block mb-2 text-sm font-medium text-gray-900 " ><a href="../files/<?php echo $rowss2["filee"]; ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo $rowss2["filee"]; ?></a></label>
           <p class="text-base font-medium"><?php echo $rowss2['descr']; ?></p>
        </div>
           <div class="block w-1/2 py-12  ">
        <label class=" mb-2 text-sm font-medium text-gray-900" for="file_input">Attach Your answer in(docx,pdf)</label>
        <input class=" mt-6 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " id="file_input" type="File">
      </div>
      </div>
    </section>

    <section class="flex justify-center w-full h-1/4 mt-5 ">
        <button id="yes"name="yes" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-12 mr-2 mb-2 dark:bg-black dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Submit Your Answer </button>
        </section>
  </form>
  <script>
    var submit1 = document.getElementById("yes");
    submit1.addEventListener("click", function(e) {
      e.preventDefault();
      var formData = new FormData();
      var imagefile = document.querySelector('#file_input');
            formData.append("usF", imagefile.files[0]);
      var ans1 = document.getElementById("ans1").value;
      var ans2 = document.getElementById("ans2").value;
      var ans3 = document.getElementById("ans3").value;
      var ans4 = document.getElementById("ans4").value;
      var ans5 = document.getElementById("ans5").value;
      var unq = document.getElementById("unq").value;
      formData.append("uAns1", ans1);
      formData.append("uAns2", ans2);
      formData.append("uAns3", ans3);
      formData.append("uAns4", ans4);
      formData.append("uAns5", ans5);
      formData.append("uUnq", unq);
      var full_url = document.URL; // Get current url
      var id = full_url.substring(full_url.lastIndexOf('=') + 1);
      formData.append("idTry", id);
      var url = "take.php";
      
      axios.post(url, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        .then(function(res) {
          
         
          toastr.success("You have Successfully answered <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {window.location.replace("./viewSub");}});
                
          document.getElementById("foo").reset();
         
        })
        .catch(function(error) {
         toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
        })
    });
  </script>
</body>

</html>