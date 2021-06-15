<?php
require_once('./db.php');
require __DIR__ . '/vendor/autoload.php';

use SevenGps\PayUnit;

if (isset($_POST['submit'])) {
    $total_amount = $_POST['amount'];
}

function generateTransactionId($length)
{
    return substr(sha1(time()), 0, $length);
}
function saveTransaction($transaction_id, $amount){
    $database = new Connection();
    $conn = $database->open();

    $sql = "INSERT INTO payment (amount, transaction_id) VALUES ('$amount', '$transaction_id')";
    $query = $conn->prepare($sql);

    $query->execute();

    $database->close();
}
$transaction_id = generateTransactionId(15);

$myPayment = new PayUnit(
    getenv("API_KEY"),
    getenv("API_PASS"),
    getenv("API_USER"),
    "http://127.0.0.1:2022/response.php",
    "",
    "test",
    "Donation",
    "",
    "XAF",
    "Toukour",
    $transaction_id
);

saveTransaction($transaction_id, $total_amount);
$myPayment->makePayment($total_amount);
