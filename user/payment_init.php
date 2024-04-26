<?php 
 
// Include the configuration file 
require_once 'config.php'; 

// Include the Stripe PHP library 
require_once '../libraries/stripe-php-master/init.php'; 
 
// Set API key 
$stripe = new \Stripe\StripeClient(STRIPE_API_KEY);
$name;
 
$response = array( 
    'status' => 0, 
    'error' => array( 
        'message' => 'Invalid Request!'    
    ) 
); 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // $name = $_POST['name'];
    $input = file_get_contents('php://input'); 
    $request = json_decode($input); 
} 
 
if (json_last_error() !== JSON_ERROR_NONE) { 
    http_response_code(400); 
    echo json_encode($response); 
    exit; 
} 
 
if(!empty($request->createCheckoutSession)){ 
    // Convert product price to cent 
    $stripeAmount = round($request->productPrice*100, 2); 
 
    // Create new Checkout Session for the order 
    try { 
        $checkout_session = $stripe->checkout->sessions->create([ 
            'line_items' => [[ 
                'price_data' => [ 
                    'product_data' => [ 
                        'name' => $request->productName,
                        'metadata' => [ 
                            'pro_id' => $request->productID 
                        ] 
                    ], 
                    'unit_amount' => $stripeAmount, 
                    'currency' => $request->currency, 
                ], 
                'quantity' => 1 
            ]], 
            'mode' => 'payment', 
            'success_url' => "http://localhost/Campamento-GIS23-main/user/payment-success.php?session_id={CHECKOUT_SESSION_ID}", 
            'cancel_url' => "http://localhost/Campamento-GIS23-main/user/payment-cancel.php", 
        ]); 

    } catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $checkout_session){ 
        $response = array( 
            'status' => 1, 
            'message' => 'Checkout Session created successfully!', 
            'sessionId' => $checkout_session->id 
        ); 
    }else{ 
        $response = array( 
            'status' => 0, 
            'error' => array( 
                'message' => 'Checkout Session creation failed! '.$api_error    
            ) 
        ); 
    } 
} 
 
// Return response 
echo json_encode($response); 
 
?>