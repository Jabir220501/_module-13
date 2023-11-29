<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gather form data
    $titel = $_POST['titel'];
    $kort_beschrijving = $_POST['kort_beschrijving'];
    $beschrijving = $_POST['beschrijving'];
    $type = $_POST['type'];
    $jaar = $_POST['jaar'];


    $projectId = $_GET['id'];

    // Prepare SQL statement to update the project
    $stmt = $conn->prepare("UPDATE projecten SET titel = :titel, kort_beschrijving = :kort_beschrijving, beschrijving = :beschrijving, type = :type, jaar = :jaar WHERE id = :id");
    $stmt->bindValue(':titel', $titel);
    $stmt->bindValue(':kort_beschrijving', $kort_beschrijving);
    $stmt->bindValue(':beschrijving', $beschrijving);
    $stmt->bindValue(':type', $type);
    $stmt->bindValue(':jaar', $jaar);
    $stmt->bindValue(':id', $projectId);
    $stmt->execute();

    // Redirect to a success page or any other page after updating the project
    header("Location: ../");
    exit();


} else {
    echo "Invalid request";
}
?>