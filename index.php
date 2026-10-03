<?php
    // SmartCafe Billing

    // === CONSTANTS
    const CURRENCY = "VND";
    const MEMBER_DISCOUNT_RATE = 0.10;
    const MEMBER_MIN = 100000;
    const PACKAGING_FEE_PER_ITEM = 2000;
    const SERVICE_RATE = 0.05;

    // === VARIABLES
    $productName = "Salt Coffee";
    $unitPrice = 45000;
    $rawQuantity = "3";
    $customerStatus = "MEMBER";
    $productAvailable = true;

    // === INSPECT DATA TYPES ===
    echo " === RAW DATA ===" . PHP_EOL;
    var_dump($productName);
    var_dump($unitPrice);
    var_dump($rawQuantity);
    var_dump($customerStatus);
    var_dump($productAvailable);

    // === CASTING ===
    $quantity = (int) $rawQuantity;
    echo "Raw quantity type: " . gettype($rawQuantity) . PHP_EOL;
    echo "Clean quantity type: " . gettype($quantity) . PHP_EOL;

    // === CALCULATE ===
    $subtotal = $unitPrice * $quantity;
    $isMember = $customerStatus === "MEMBER";
    $isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
    $discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;
    $afterDiscount = $subtotal - $discount;
    $packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
    $serviceFee = $afterDiscount * SERVICE_RATE;
    $total = $subtotal - $discount + $packagingFee + $serviceFee;

    // === CHECKOUT GATE ===
    $isValidCustomer = $customerStatus === "MEMBER" || $customerStatus === "GUEST";
    $hasValidQuantity = $quantity > 0;
    $canOrder = $productAvailable && $hasValidQuantity && $isValidCustomer;
    var_dump($canOrder);

    // === CONCATENATION ===
    $receipt = "=== SMARTCAFE RECEIPT ===" . PHP_EOL;
    $receipt .= "Product: " . $productName . PHP_EOL;
    $receipt .= "Unit Price: " . $unitPrice . " " . CURRENCY . PHP_EOL;
    $receipt .= "Quantity: " . $quantity . PHP_EOL;
    $receipt .= "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;
    $receipt .= "Discount: " . $discount . " " . CURRENCY . PHP_EOL;
    $receipt .= "Packaging Fee: " . $packagingFee . " " . CURRENCY . PHP_EOL;
    $receipt .= "Service Fee: " . $serviceFee . " " . CURRENCY . PHP_EOL;
    $receipt .= "Total: " . $total . " " . CURRENCY . PHP_EOL;
    if ($canOrder){
        $receipt .= "Status: READY TO ORDER" . PHP_EOL;
    }
    else{
        $receipt .= "Status: BLOCKED" . PHP_EOL;
    }
    echo $receipt;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCafe</title>
</head>
<body>
    <h1>SmartCafe</h1>
    <p>Product: <?= $productName ?></p>
    <p>Unit Price: <?= $unitPrice ?> <?= CURRENCY ?></p>
    <p>Quantity: <?= $quantity ?></p>
    <p>Subtotal: <?= $subtotal ?> <?= CURRENCY ?></p>
    <p>Discount: <?= $discount ?> <?= CURRENCY ?></p>
    <p>Packaging Fee: <?= $packagingFee ?> <?= CURRENCY ?></p>
    <p>Service Fee: <?= $serviceFee ?> <?= CURRENCY ?></p>
    <p>Total: <?= $total ?> <?= CURRENCY ?></p>
</body>
</html>