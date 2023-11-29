<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $projectId = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM projecten WHERE id = :id");
    $stmt->bindValue(':id', $projectId);
    $stmt->execute();

    header("Location: ../");
    exit();
} else {
    echo "Invalid request";
}
?>