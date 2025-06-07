<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$price = $data->price;
$image = $data->image;
$characteristics = $data->characteristics;

$stmt = $conn->prepare("INSERT INTO products (name, price, image, characteristics) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdss", $name, $price, $image, $characteristics);

if ($stmt->execute()) {
    echo json_encode(["message" => "Product added successfully"]);
} else {
    echo json_encode(["error" => "Error adding product"]);
}

$stmt->close();
$conn->close();
?>