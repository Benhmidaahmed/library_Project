<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

include '../../../includes/config.php';

try {
    $response = array();
    $subscribersQuery = "SELECT COUNT(*) AS count FROM user_form";
    $subscribersStmt = $pdo->query($subscribersQuery);
    $subscribersResult = $subscribersStmt ? $subscribersStmt->fetch(PDO::FETCH_ASSOC) : null;
    $response['subscribers'] = $subscribersResult ? intval($subscribersResult['count']) : 0;

    $reservedBooksQuery = "SELECT COUNT(*) AS count FROM livre WHERE id_user IS NOT NULL";
    $reservedBooksStmt = $pdo->query($reservedBooksQuery);
    $reservedBooksResult = $reservedBooksStmt ? $reservedBooksStmt->fetch(PDO::FETCH_ASSOC) : null;
    $response['reservedBooks'] = $reservedBooksResult ? intval($reservedBooksResult['count']) : 0;

    $returnedBooksQuery = "SELECT COUNT(*) AS count FROM livre WHERE etat = 1 AND id_user IS NULL";
    $returnedBooksStmt = $pdo->query($returnedBooksQuery);
    $returnedBooksResult = $returnedBooksStmt ? $returnedBooksStmt->fetch(PDO::FETCH_ASSOC) : null;
    $response['returnedBooks'] = $returnedBooksResult ? intval($returnedBooksResult['count']) : 0;

    $totalBooksQuery = "SELECT SUM(quantite) AS count FROM livre";
    $totalBooksStmt = $pdo->query($totalBooksQuery);
    $totalBooksResult = $totalBooksStmt ? $totalBooksStmt->fetch(PDO::FETCH_ASSOC) : null;
    $response['totalBooks'] = $totalBooksResult ? intval($totalBooksResult['count']) : 0;

    echo json_encode($response);
} catch (Exception $e) {
    $errorResponse = array('error' => 'An error occurred: ' . $e->getMessage());
    echo json_encode($errorResponse);
}
?>
