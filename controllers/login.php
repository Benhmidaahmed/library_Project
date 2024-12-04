<?php
include '../includes/config.php';

session_start();
if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] === 'admin') {
        header("Location: ../gestionlivre2/index.php");
        exit;
    } elseif ($_SESSION['user_type'] === 'user') {
        header("Location: ../gestionlivre2/Front/index1.php");
        exit;
    }
}

$wrongpass = "";
$accinv = "";
$chvide = "";

if (isset($_POST["login"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $chvide = "Email and password cannot be empty!";
    } else {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $accinv = "Invalid email format.";
        } else {
            $stmt = $pdo->prepare("SELECT * FROM user_form WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_type'] = $user['user_type'];
                    if ($user['user_type'] == 'admin') {
                        header("Location: ../gestionlivre2/index.php");
                        exit;
                    } else {
                        header("Location: ../gestionlivre2/Front/index1.php"); 
                        exit;
                    }
                } else {
                    $wrongpass = "Incorrect password. Please try again!";
                }
            } else {
                $accinv = "No account found with this email.";
            }
        }
    }
}

$title = 'Login Page';
$content = "login";
include '../layouts/layout.phtml';
?>
