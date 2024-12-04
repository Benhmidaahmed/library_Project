<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestionlivre;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['id_livre'])) {
        $id_livre = $_POST['id_livre'];
        $stmt = $pdo->prepare("UPDATE livre SET quantite = quantite - 1 WHERE id_livre = :id_livre AND quantite > 0");
        $stmt->bindParam(':id_livre', $id_livre, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
