<?php
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/giving_requests.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'ok' => false,
        'message' => 'Payment approval must be submitted from the giving form.',
    ]);
    exit;
}

$name = trim($_POST['name'] ?? '');
$amount = trim($_POST['amount'] ?? '');
$paymentMode = trim($_POST['payment_mode'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$givingType = trim($_POST['giving_type'] ?? 'Giving');

$allowedModes = ['mpesa', 'airtel_money', 'paypal', 'vooma'];
$errors = [];

if ($name === '') {
    $errors[] = 'Name is required.';
}

if ($amount === '' || !is_numeric($amount) || (float) $amount <= 0) {
    $errors[] = 'Enter a valid amount.';
}

if (!in_array($paymentMode, $allowedModes, true)) {
    $errors[] = 'Choose a valid mode of payment.';
}

if ($phone === '' || !preg_match('/^\+?[0-9 ]{9,16}$/', $phone)) {
    $errors[] = 'Enter a valid phone number.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode([
        'ok' => false,
        'message' => implode(' ', $errors),
    ]);
    exit;
}

$requestId = create_giving_request([
    'giving_type' => $givingType,
    'name' => $name,
    'amount' => (float) $amount,
    'payment_mode' => $paymentMode,
    'phone' => $phone,
]);

http_response_code(501);
echo json_encode([
    'ok' => false,
    'message' => 'Payment details received for ' . $givingType . ' as request #' . $requestId . ', but STK push is not configured yet. Add the payment provider API credentials to activate automatic approval requests.',
]);
