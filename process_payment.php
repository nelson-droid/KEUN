<?php
require_once 'mpesa_api.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'] ?? '';
    $amount = $_POST['amount'] ?? '';
    
    if (empty($phone) || empty($amount)) {
        echo json_encode(['success' => false, 'message' => 'Phone and amount are required']);
        exit;
    }
    
    // Format phone number (remove + if present and ensure it starts with 254)
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) === 12 && substr($phone, 0, 3) === '254') {
        // Phone is already in correct format
    } elseif (strlen($phone) === 9 && substr($phone, 0, 1) === '7') {
        $phone = '254' . $phone;
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid phone number format']);
        exit;
    }
    
    try {
        $mpesa = new MpesaAPI();
        
        // Generate a unique reference
        $accountReference = 'PAY' . time();
        $transactionDesc = 'Payment for services';
        
        // Initiate STK Push
        $response = $mpesa->initiateSTKPush($phone, $amount, $accountReference, $transactionDesc);
        
        if (isset($response->ResponseCode) && $response->ResponseCode === '0') {
            echo json_encode([
                'success' => true,
                'message' => 'Payment request sent successfully',
                'merchantRequestID' => $response->MerchantRequestID,
                'checkoutRequestID' => $response->CheckoutRequestID
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to initiate payment',
                'error' => $response->errorMessage ?? 'Unknown error'
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'An error occurred',
            'error' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?> 