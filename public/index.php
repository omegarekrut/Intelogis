<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

use App\Shipment;
use App\DeliveryServices\FastDelivery;
use App\DeliveryServices\SlowDelivery;

$price = null;
$date = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sourceKladr = $_POST['sourceKladr'] ?? '';
    $targetKladr = $_POST['targetKladr'] ?? '';
    $weight = floatval($_POST['weight'] ?? 0);
    $serviceType = $_POST['serviceType'] ?? '';

    $shipment = new Shipment($sourceKladr, $targetKladr, $weight);

    switch ($serviceType) {
        case 'fast':
            $service = new FastDelivery();
            break;
        case 'slow':
            $service = new SlowDelivery();
            break;
        default:
            $error = "Invalid service type selected.";
            break;
    }

    if (!isset($error)) {
        $price = $service->calculateCost($shipment);
        $date = $service->getDeliveryDate($shipment);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Cost Calculator</title>
</head>
<body>
<form action="" method="post">
    <label for="sourceKladr">Source KLADR:</label>
    <input type="text" name="sourceKladr" required>

    <label for="targetKladr">Target KLADR:</label>
    <input type="text" name="targetKladr" required>

    <label for="weight">Weight (kg):</label>
    <input type="number" step="0.01" name="weight" required>

    <label for="serviceType">Delivery Service:</label>
    <select name="serviceType">
        <option value="fast">Fast Delivery</option>
        <option value="slow">Slow Delivery</option>
    </select>

    <input type="submit" value="Calculate">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if (isset($error)): ?>
        <p>Error: <?= $error ?></p>
    <?php else: ?>
        <p>Price: <?= $price ?> units</p>
        <p>Delivery Date: <?= $date ?></p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
