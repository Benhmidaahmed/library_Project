<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestionlivre;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM livre WHERE etat = 1");
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($books);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
