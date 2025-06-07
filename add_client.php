<?php
header('Content-Type: application/json');

// Настройки подключения к базе данных
$host = 'localhost';
$dbname = 'shop';
$username = 'root';
$password = '';

$data = json_decode(file_get_contents('php://input'), true);

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("INSERT INTO clients (full_name, phone) VALUES (:full_name, :phone)");
    $stmt->bindParam(':full_name', $data['full_name']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->execute();
    
    echo json_encode(['success' => true, 'message' => 'Клиент успешно добавлен']);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Ошибка при добавлении клиента: ' . $e->getMessage()]);
}
?>