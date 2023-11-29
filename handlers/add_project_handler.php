<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $kort_beschrijving = $_POST['kort_beschrijving'];
    $beschrijving = $_POST['beschrijving'];
    $type = $_POST['type'];
    $jaar = $_POST['jaar'];

    // Prepare SQL statement to insert a new project
    $stmt = $conn->prepare("INSERT INTO projecten (titel, kort_beschrijving, beschrijving, type, jaar) VALUES (:titel, :kort_beschrijving, :beschrijving, :type, :jaar)");
    $stmt->bindValue(':titel', $titel);
    $stmt->bindValue(':kort_beschrijving', $kort_beschrijving);
    $stmt->bindValue(':beschrijving', $beschrijving);
    $stmt->bindValue(':type', $type);
    $stmt->bindValue(':jaar', $jaar);
    $stmt->execute();

    // Redirect to a success page or any other page after creating the project
    header("Location: ../");
    exit();
} else {
    // Handle the case if someone tries to access this script directly without proper POST data
    echo "Invalid request";
}
?>