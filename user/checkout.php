<?php  
session_start();
require_once 'config.php';
//include('inc/header.php'); 
 //include('inc/nav.php');  
 include('../database/linklinkz.php');
 $_SESSION['customer'] = 'eroshananlf1@gmail.com';
$_SESSION['customerid'] = '16';

if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
 header('location:../login/login.php');
 
 
}//echo $_SESSION['customer']."<br>";
if(!isset($_SESSION['customerid'])){
	echo '<script>window.location.href = "../login/login.php";</script>';

}//echo $_SESSION['customerid']."<br>";?>
<?php 
//include('../home/headerIn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" type="text/css" href="../css/User/checkout.css">
   <!-- <link rel="stylesheet" type="text/css" href="../css/homestyle.css"/>-->
</head>
<body>
 
<?php


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
$total = 0;
$total_amount = 0;
// $cart = "";
// if(isset($_SESSION['cart'])){
// 	$cart = $_SESSION['cart'];
// 	foreach($cart as $key => $value){
// 	 // echo $key ." : ". $value['quantity'] . "<br>";
	 
// 	 $sql_cart = "SELECT * FROM products where product_id = $key";
// 	$result_cart = mysqli_query($conn, $sql_cart);
// 	$row_cart = mysqli_fetch_assoc($result_cart);
// 	$total = $total +  ($row_cart['price'] * $value['quantity']);
// }
// }

if (isset($_GET['total'])){
	$total = $_GET['total'];
}


$message  = '';

$cid =$_SESSION['customerid'];

$sql = "SELECT * FROM user_data where userid = $cid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//  ?>



 

<div class="container text-white">

<?php
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";







?>

    <section id="content">
    <div class="content-blog">
        <div class="page_header text-center py-5">
            <center>
                <div class="logo-container">
                    <span class="as"><img src="../resource/logo.png" alt="" width="150" height="70"></span>
                    <font size=20px;>Shop - Checkout</font>
                </div><br>
                <p>Enjoy products at the best rate!</p>
            </center>
        </div>
    </div>
<form'>
<?php echo $message ?>
<div class="container ">
			<div class="row">
				<div class="offset-md-2 col-md-8">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
							<label class="">Country </label>
							<select class="form-control" name='country' id="country">
								<option value="">Select Country</option>
								<option value="SL">Sri Lanka</option>
								
								
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name='fname' id="fname" placeholder="" value="<?php if(isset($row['firstname'])) { echo $row['firstname']; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name='lname' id="lname" placeholder="" value="<?php if(isset($row['lastname'])) {echo $row['lastname']; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input class="form-control" name='companyName' id="companyname" placeholder="" value="<?php if(isset($row['company'])) {echo $row['company']; } ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input class="form-control" name='addr1' id="addr1" placeholder="Street address" value="<?php if(isset($row['address1'])) {echo $row['address1']; } ?>" type="text">
							<div class="clearfix space20"></div>
							<input class="form-control" name='addr2' id="addr2" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(isset($row['address2'])) {echo $row['address2'];  } ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>Town / City </label>
									<input class="form-control" name='city' id="city" placeholder="Town / City" value="<?php if(isset($row['city'])) {echo $row['city']; } ?>" type="text">
								</div>
 
								<div class="col-md-4">
									<label>Postcode </label>
									<input class="form-control" name='Postcode' id="postcode" placeholder="Postcode / Zip" value="<?php if(isset($row['zip'])) {echo $row['zip']; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<!-- <label>Email Address </label>
							<input class="form-control" name='Email' placeholder="" value="-" type="text"> -->
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" name='Phone'  id="phonenumber" placeholder="" value="<?php if(isset($row['mobile'])) {echo $row['mobile']; } ?>" type="text">
							<input name="total_amount" id="total_amount" value= "<?php echo $total?>" type="hidden">
							<input name="currency" id="currency" value= "LKR" type="hidden">

					</div>
				</div>
				
			 
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding bg-white text-dark">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount"><?php echo $total?>.00/-</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount"><?php echo $total?>.00/-</span></strong> </td>
					
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method mt-5">
             
				<div class="row d-flex">
						<div id="payMethodError" class="error"></div>
						<div class="col-md-4">
							<input name="payment" value='COD'  id="radio1" class="mr-2 css-checkbox" type="radio"><span>Cash on delivery</span>
							<div class="space20"></div>
							<p>You can deliver handle payments with the delivery party</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value='Card'  id="radio2" class="mr-2 css-checkbox" type="radio"><span>Card Payment</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						
				
                </div>
           
				<div class="space30"></div>
					<div id="agreeError" class="error"></div>
					<input name="agree" id="checkboxG2" class="mr-2 css-checkbox " type="checkbox"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>

			 
				
        </div>		
        
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- <input type='submit' name='submit' value='Pay Now' class="btn" id="payButton"> -->
				<button class="stripe-button" id="payButton">
					<div class="spinner hidden" id="spinner"></div>
					<span id="buttonText">Pay</span>
				</button>
            </div>
        </div>
		
		</div>
	</section>
</div>

</form>


</body></html>




<?php //include('inc/footer.php');  ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
// Set Stripe publishable key to initialize Stripe.js
const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');



// Select payment button
const payBtn = document.querySelector("#payButton");
var name = ""; 
var productId = "";
var price = 0;
var currency = "" ;
var paymentRadios = "";
var errorDiv ="";
var payMethodError = "";
// Payment request handler
payBtn.addEventListener("click", function (evt) {
	country = document.querySelector('#country').value;
    fname = document.querySelector("#fname").value;
	lname = document.querySelector('#lname').value;
	companyname = document.querySelector('#companyname').value;
	addr1 = document.querySelector('#addr1').value;
	addr2 = document.querySelector('#addr2').value;
	city = document.querySelector('#city').value;
	postcode = document.querySelector('#postcode').value;
	phonenumber = document.querySelector('#phonenumber').value;
	agree = document.querySelector('#checkboxG2');
    price = document.querySelector("#total_amount").value;
    currency = document.querySelector("#currency").value;
	paymentRadios = document.getElementsByName('payment');
	errorDiv = document.querySelector('#agreeError');
	payMethodError = document.querySelector('#payMethodError');
	console.log('Agree'+agree);
	console.log(fname);
	console.log(price);
	console.log(currency);
	var selectedPayment;

	

	for(var i=0; i< paymentRadios.length; i++){
		if(paymentRadios[i].checked){
			selectedPayment = paymentRadios[i].value;
			break;
			
		}
	}
	console.log(selectedPayment);

	const formData = {
		country: country,
		fname: fname,
		lname: lname,
		companyname: companyname,
		addr1: addr1,
		addr2: addr2,
		city: city,
		postcode: postcode,
		phonenumber: phonenumber,
		price: price,
		paymentMode: selectedPayment,

	}

	if(price != 0){
		if(agree.checked){
		sendDataToDB(formData)
		.then(function(result){
			response = result;
			console.log(result)
			const redirectUrl = result.url;
			if (redirectUrl.includes('user/orders')) {
			window.location.href = redirectUrl;
			} else {
			console.log('Redirect URL invalid.');
			}
		})
		.catch(function(error){
			console.error(error);
		})

    // setLoading(true);
		console.log(paymentRadios)
		if(selectedPayment == "Card"){
		console.log(selectedPayment);createCheckoutSession().then(function (data) {
			if(data.sessionId){
				stripe.redirectToCheckout({
					sessionId: data.sessionId,
				}).then(handleResult);
			}else{
				handleResult(data);
			}
		})
		}else if(selectedPayment == null){
			payMethodError.innerText = "Please select a method of payment";
		}
		
	}else{
		errorDiv.innerText = "Read and Accept the terms and conditions";
	}
	}

	
	
	
	
	
    // 

        
});
    
// Create a Checkout Session with the selected product
const createCheckoutSession = function (stripe) {
    return fetch("payment_init.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            createCheckoutSession: 1,
			productID: fname,
            productName: fname,
            productPrice: price,
            currency: currency
        }),
    }).then(function (result) {
        return result.json();
    });
};

const sendDataToDB = function(formData){
	return fetch("storedata.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(formData),
    }).then(function (result) {
        return result;
    });

};

// Handle any errors returned from Checkout
const handleResult = function (result) {
    if (result.error) {
        showMessage(result.error.message);
    }
    
    setLoading(false);
};

// Show a spinner on payment processing
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        payBtn.disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#buttonText").classList.add("hidden");
    } else {
        // Enable the button and hide spinner
        payBtn.disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#buttonText").classList.remove("hidden");
    }
}

// Display message
function showMessage(messageText) {
    const messageContainer = document.querySelector("#paymentResponse");
	
    // messageContainer.classList.remove("hidden");
    // messageContainer.textContent = messageText;
	
    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 5000);
}


</script>


