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