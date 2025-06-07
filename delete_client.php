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
    
    $stmt = $conn->prepare("DELETE FROM clients WHERE id = :id");
    $stmt->bindParam(':id', $data['id']);
    $stmt->execute();
    
    echo json_encode(['success' => true, 'message' => 'Клиент успешно удален']);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Ошибка при удалении клиента: ' . $e->getMessage()]);
}
?>