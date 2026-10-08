
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartDelivery</title>
</head>
<body>
    <h1>SmartDelivery</h1>
    <p>Distance: <?= $distanceKm ?> km</p>
    <p>Weight: <?= $weight ?> kg</p>
    <p>Priority: <?= $priority ?></p>
    <p>Base Fee: <?= $baseFee ?> <?= CURRENCY ?></p>
    <p>Distance Fee: <?= $distanceFee ?> <?= CURRENCY ?></p>
    <p>Surcharge: <?= $surcharges ?> <?= CURRENCY ?></p>
    <p>Discount: <?= $discount ?> <?= CURRENCY ?></p>
    <p>Tax: <?= $tax ?> <?= CURRENCY ?></p>
    <p>Total Delivery Fee: <?= $finalTotal ?> <?= CURRENCY ?></p>
    <p>Status: <?= $status ?></p>
</body>
</html>