<?php
session_start();
if($_SESSION['user_type'] === 'user') {
    header("Location: ../gestionlivre2/Front/index1.php");
    exit;
}


error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
include '../../../includes/config.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['bookName'])) {
    echo json_encode(array('success' => false, 'error' => 'Missing book name'));
    exit;
}
$bookName = $data['bookName'];
try {
    $query = "DELETE FROM livre WHERE nom_livre = :bookName";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array('bookName' => $bookName));
    echo json_encode(array('success' => true));
    } catch (Exception $e) {
    echo json_encode(array('success' => false, 'error' => $e->getMessage()));
}
?>
