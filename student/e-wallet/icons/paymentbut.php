<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="paypal-button-container"></div>
    <input text="text" id="inputs">
    <div id="data">asdasd </div>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=ASTe2yWWRkumqzfZDdetQqwtVvSYpdUvH3xQLKSNkenxj2jCNX5z_VB6kkA-RbYp11APqSqru228S4ht&currency=USD"></script>

    <script>
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
                    var receipt = JSON.stringify(orderData, null, 2);
                    var ship = orderData.purchase_units[0].amount.value;
                    console.log('Capture result', orderData, receipt );
                    //var transaction = orderData.purchase_units[0].payments.captures[0];
                    //alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                    
                    const eut = ship;
                    document.getElementById('data').innerHTML = eut;
                    $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "test.php",
                    data: {myData:eut},
                   
                    success: function(data){
                        alert('Items added');
                       
                    },
                            error: function(e){
                                console.log(e.message);
                    }
                    });


                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
</html>