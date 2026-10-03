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
?>