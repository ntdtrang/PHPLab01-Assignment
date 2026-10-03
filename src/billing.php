<?php
$quantity = (int) $rawQuantity;

$subtotal = $unitPrice * $quantity;
$isMember = $customerStatus === "MEMBER";
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
$discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;
$afterDiscount = $subtotal - $discount;
$packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
$serviceFee = $afterDiscount * SERVICE_RATE;
$total = $subtotal - $discount + $packagingFee + $serviceFee;

$isValidCustomer = $customerStatus === "MEMBER" || $customerStatus === "GUEST";
$hasValidQuantity = $quantity > 0;
$canOrder = $productAvailable && $hasValidQuantity && $isValidCustomer;
