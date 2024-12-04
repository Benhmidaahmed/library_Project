<?php

session_start();
if($_SESSION['user_type'] === 'user') {
    header("Location: ../gestionlivre2/Front/index1.php");
    exit;
};
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include '../../../includes/config.php';

try {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['originalName']) || 
        !isset($data['newTitle']) || 
        !isset($data['newAuthor']) || 
        !isset($data['newQuantity']) || 
        !isset($data['newStatus']) || 
        !isset($data['newImageUrl'])) {
        throw new Exception("Missing required fields");
    }

    $originalName = $data['originalName'];
    $newTitle = $data['newTitle'];
    $newAuthor = $data['newAuthor'];
    $newQuantity = (int) $data['newQuantity'];
    $newStatus = (int) $data['newStatus'];
    $newImageUrl = $data['newImageUrl'];

    $query = "
        UPDATE livre
        SET 
            nom_livre = :newTitle,
            nom_auteur = :newAuthor,
            quantite = :newQuantity,
            etat = :newStatus,
            image_url = :newImageUrl
        WHERE nom_livre = :originalName
    ";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':newTitle', $newTitle);
    $stmt->bindParam(':newAuthor', $newAuthor);
    $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
    $stmt->bindParam(':newImageUrl', $newImageUrl);
    $stmt->bindParam(':originalName', $originalName);
    if ($stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        $errorInfo = $stmt->errorInfo();
        echo json_encode(array('success' => false, 'error' => $errorInfo[2]));
    }
} catch (Exception $e) {
    echo json_encode(array('success' => false, 'error' => $e->getMessage()));
}
?>
