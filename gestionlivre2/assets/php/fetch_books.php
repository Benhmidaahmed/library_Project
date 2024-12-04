<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

include '../../../includes/config.php'; 
try {
   
    $query = "
        SELECT 
            l.nom_livre, 
            l.nom_auteur, 
            l.quantite, 
            l.etat, 
            l.image_url, 
            u.email AS rented_by 
        FROM 
            livre l
        LEFT JOIN 
            user_form u ON l.id_user = u.id
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($books as &$book) {
        if (is_null($book['rented_by'])) {
            $book['rented_by'] = 'Not Rented';
        }
    }
    echo json_encode($books);

} catch (Exception $e) {
    echo json_encode(array('error' => 'An error occurred: ' . $e->getMessage()));
}
?>
