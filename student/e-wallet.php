<?php
include 'config.php';
include 'headercopy.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <link href="./output.css" rel="stylesheet">

<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <title>E-wallet</title>
</head>
<body>
    <style>
    .error{


    background-color: red;
    color: black;
        }

    </style>





    <div class="w-full flex justify-center mt-3">

    </div>

    <div class="div3 border md:container md:mx-auto mt-5   drop-shadow-lg align-middle ">

            <div class="billing p-5 block">
              <div class="p-3"><h1 class="font-sans text-4xl">Billing Details</h1></div>
              <div class="flex space-x-5 p-5">
            <div class="card1 w-80 h-44 shadow p-7 mb-5 bg-white rounded text-center " >
              <div class="text-left"><span >Balance</span></div>
              <h1 class="bal text-6xl " > </h1>
            </div>
                <div class="flex flex-col justify-center card2 mb-4">
                  <div class="">

                  </div>
                  <div class=""><button type="button" data-modal-toggle="authentication-modal" class="w-24 text-center text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 ">Deposit</button>
                  </div>
                </div>
              </div>

            </div>

            <div class="transaction block overflow-x-auto relative">
              <div class="p-3">
                <h1 class="font-sans text-4xl">Transaction History</h1>
              </div>

            <table class="  w-full  ">
		<thead class="bg-black  text-white  ">
			<tr class="flex w-full mb-4 text-center lg:pl-44 md:pl-0">

				<th class="p-4 w-1/4">Amount</th>
				<th class="p-4 w-1/4">Dates</th>
        <th class="p-4 w-1/4">Status</th>

			</tr>
		</thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
		<tbody  class="trans bg-grey-light flex flex-col items-center overflow-y-scroll  h-60 lg:pl-44 md:pl-0" style="height: 33vh;">








		</tbody>
	</table>
  </div>
          </div>

    </div>



 <!-- Main modal -->
 <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative  rounded-lg shadow dark:bg-gray-700 ">
          <button onClick="window.location.reload();" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              <span class="sr-only">Close modal</span>
          </button>
          <div class="py-6 px-6 lg:px-8 bg-black">
              <h3 class="mb-4 text-xl font-medium text-gray-900  dark:text-white">Deposit Form</h3>
              <form class="space-y-6 " action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">How much will you deposit</label>
                      <input type="text" name="inputs" id="inputs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter the Amount" required>
                  </div>

                  <div id="paypal-button-container" ></div>


              </form>
          </div>
      </div>
  </div>
</div>




<script src="https://www.paypal.com/sdk/js?client-id=ASTe2yWWRkumqzfZDdetQqwtVvSYpdUvH3xQLKSNkenxj2jCNX5z_VB6kkA-RbYp11APqSqru228S4ht&currency=PHP"></script>

<script>
       var display = "true";
       var update = "https://b.sbox.stats.paypal.com/v2/counter.cgi?p=uid_e0c11de33a_mtm6ntq6mte&s=SMART_PAYMENT_BUTTONS";
    function load_data(){
                       $.ajax({
                          method: 'POST',
                          url: 'balance.php',
                          data:{displaysend2:display
                          },
                          success: function(data) {
                            $('.bal').html(data);
                            console.log("hell");


                          }
                        });
  }
    function load_trans(){
                       $.ajax({
                          method: 'POST',
                          url: 'transaction_history.php',
                          data:{displaysend3:display
                          },
                          success: function(data) {
                            $('.trans').html(data);



                          }
                        });
  }


      $( document ).ready(function() {

     load_data();
     load_trans();

    });
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: document.getElementById('inputs').value
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:



                var ship = orderData.purchase_units[0].amount.value;




                $.ajax({
                type: 'POST',
                dataType: "json",
                url: "test.php",
                data: {myData:ship},

                success: function(data){
                  load_data();
                  console.log('Capture result:', orderData);
                  console.log('Amount:', ship);
                  console.log(data);

                    $('.trans').html(data);



                },
                        error: function(e){
                            console.log(e.message);
                }
                });





                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';

            });

        }


    }).render('#paypal-button-container');








</script>
</body>
</html>