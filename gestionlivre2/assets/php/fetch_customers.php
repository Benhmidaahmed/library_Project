<?php
include '../../../includes/config.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$query = "
    SELECT 
        uf.id, 
        uf.email, 
        uf.user_type
    FROM user_form uf
";
$stmt = $pdo->prepare($query);
$stmt->execute();

$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($customers as $key => $customer) {
    $customers[$key]['borrowed_books'] = 0; 
    $customers[$key]['status'] = 'No Borrowed Books'; 
}
echo json_encode($customers);
?>
