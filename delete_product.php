<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$stmt = $conn->prepare("DELETE FROM products WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Product deleted successfully"]);
} else {
    echo json_encode(["error" => "Error deleting product"]);
}

$stmt->close();
$conn->close();
?>