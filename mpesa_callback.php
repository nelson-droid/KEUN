<?php
// Log the callback data
$callbackData = file_get_contents('php://input');
file_put_contents('mpesa_callback.log', date('Y-m-d H:i:s') . " - " . $callbackData . "\n", FILE_APPEND);

// Parse the callback data
$data = json_decode($callbackData);

if ($data) {
    // Process the callback based on the type
    if (isset($data->Body->stkCallback)) {
        // STK Push callback
        $result = $data->Body->stkCallback->ResultDesc;
        $merchantRequestID = $data->Body->stkCallback->MerchantRequestID;
        $checkoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
        
        // Log the transaction result
        file_put_contents('mpesa_transactions.log', 
            date('Y-m-d H:i:s') . " - " .
            "MerchantRequestID: $merchantRequestID, " .
            "CheckoutRequestID: $checkoutRequestID, " .
            "Result: $result\n",
            FILE_APPEND
        );
        
        // You can add your business logic here
        // For example, update your database with the transaction status
    }
}

// Always return success to M-Pesa
header('Content-Type: application/json');
echo json_encode(['ResultCode' => 0, 'ResultDesc' => 'Success']);
?> 