<?php
    // SmartCafe Billing
    const CURRENCY = "VND";
    const MEMBER_DISCOUNT_RATE = 0.10;
    const MEMBER_MIN = 100000;
    const PACKAGING_FEE_PER_ITEM = 2000;
    const SERVICE_RATE = 0.05;

    $productName = "Salt Coffee";
    $unitPrice = 45000;
    $rawQuantity = "3";
    $customerStatus = "MEMBER";
    $productAvailable = true;

    echo " === RAW DATA ===" . PHP_EOL;
    var_dump($productName);
    var_dump($unitPrice);
    var_dump($rawQuantity);
    var_dump($customerStatus);
    var_dump($productAvailable);
?>