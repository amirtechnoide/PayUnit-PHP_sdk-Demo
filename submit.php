<?php

use SevenGps\PayUnit;
if (isset($_POST['submit'])){
    $total_amount = $_POST['amount'];
    echo '<h3>CA fonctionne bien</h3>';
}


$myPayment = new PayUnit(
    "ddd23a5b550f9891d59d94e313eb12ea19a57X e2f",
    "f4d656f2-2a4d-4b55-992a-887eb6805cf4",
    "payunit_sand_EvfYadcNp",
    "http://127.0.0.1:8000/index",
    "http://192.168.100.10/seven-payunit-sandbox/sandbox/notify",
    "test",
    "description",
    "purchaseRef",
    "FCFA",
    "name",
    "transactionId"
);

$myPayment->makePayment("total_amount");