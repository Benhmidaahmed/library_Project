<?php
session_start();
if($_SESSION['user_type'] === 'user') {
    header("Location: ../gestionlivre2/Front/index1.php");
    exit;
}
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gestionlivre;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
if (isset($_POST['submit'])) {
    $nom_livre = htmlspecialchars($_POST['nom_livre']);
    $nom_auteur = htmlspecialchars($_POST['nom_auteur']);
    $nb_page = (int)$_POST['nb_page'];
    $genre = htmlspecialchars($_POST['genre']);
    $quantite = (int)$_POST['quantite'];
    $date = date('Y-m-d');
    $image_url = "";
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image_url"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extensions = array("jpg", "jpeg", "png"); 
        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
                $image_url = $target_file;
            } else {
                die("Erreur lors de l'upload de l'image.");
            }
        } else {
            die("Format d'image non supporté. Formats acceptés : JPG, JPEG, PNG.");
        }
    }
    try {
        $stmt = $pdo->prepare("
            INSERT INTO livre (nom_livre, nom_auteur, nb_page, genre, quantite, image_url, date)
            VALUES (:nom_livre, :nom_auteur, :nb_page, :genre, :quantite, :image_url, :date)
        ");
        $stmt->bindParam(':nom_livre', $nom_livre);
        $stmt->bindParam(':nom_auteur', $nom_auteur);
        $stmt->bindParam(':nb_page', $nb_page);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':date', $date);
        if ($stmt->execute()) {
            header("Location: ajout.php?message=Livre ajouté avec succès !");
            exit;
        } else {
            header("Location: ajout.php?message=Erreur lors de l'ajout du livre.");
            exit;
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
$template="ajouter";
?>
