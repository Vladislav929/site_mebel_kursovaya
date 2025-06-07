<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'config.php';

$response = ['success' => false];
$data = json_decode(file_get_contents("php://input"));

if ($data === null) {
    $response['error'] = "Invalid JSON data";
    http_response_code(400);
    echo json_encode($response);
    exit;
}

// Проверка обязательных полей
$required = ['id', 'name', 'price', 'image', 'characteristics'];
foreach ($required as $field) {
    if (!isset($data->$field)) {
        $response['error'] = "Missing required field: $field";
        http_response_code(400);
        echo json_encode($response);
        exit;
    }
}

try {
    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, image=?, characteristics=? WHERE id=?");
    $stmt->bind_param("sdssi", 
        $data->name,
        $data->price,
        $data->image,
        $data->characteristics,
        $data->id
    );
    
    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Product updated',
            'affected_rows' => $stmt->affected_rows
        ];
    } else {
        throw new Exception($stmt->error);
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
    http_response_code(500);
}

echo json_encode($response);
$conn->close();
?>