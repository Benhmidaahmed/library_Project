<?php
include '../includes/config.php';

$pwderror = "";
$emailexist = "";
$regsucc = "";
$regerror = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'], $_POST['cpassword'])) 
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    
    if ($password!==$cpassword) {
        $pwderror = "Passwords do not match!";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM user_form WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $emailexist = "Email already registered.";
            } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO user_form (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    $regsucc = "Registration successful.";
                } else {
                    $regerror = "Error occurred during registration.";
                        }
                    }
            }
}

$title = 'Register Page';
$content = "register";
include '../layouts/layout.phtml';
?>
