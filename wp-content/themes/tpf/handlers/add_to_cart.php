<?php
require_once __DIR__ . '/../../../../wp-load.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$productId = isset($data['productId']) ? absint($data['productId']) : 0;

if ($productId) {
    $added = WC()->cart->add_to_cart($productId);
    if ($added) {
        echo json_encode(WC()->cart->get_cart_contents_count());
    } else {
        echo json_encode('Error');
    }
} else {
    echo json_encode('Error');
}

exit;
?>
