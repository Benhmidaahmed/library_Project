<?php
header('Content-Type: application/json');
session_start();

try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=gestionlivre;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'ID du livre est envoyé et si l'utilisateur est connecté
    if (isset($_POST['id_livre']) && isset($_SESSION['user_id'])) {
        $id_livre = $_POST['id_livre'];
        $id_user = $_SESSION['user_id']; // Récupérer l'ID de l'utilisateur connecté

        // Préparer la requête pour vérifier la disponibilité du livre et effectuer les mises à jour
        $stmt = $pdo->prepare("UPDATE livre 
                               SET quantite = quantite - 1, id_user = :id_user 
                               WHERE id_livre = :id_livre AND quantite > 0");
        $stmt->bindParam(':id_livre', $id_livre, PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si une ligne a été modifiée
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'The book has been successfully borrowed.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'This book is out of stock or invalid ID.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Book ID or user session is missing.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
}
?>
