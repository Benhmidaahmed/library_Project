<?php
include '../../../includes/config.php';
try {
    $stmt = $pdo->query('SELECT 1');
    echo 'Database connection is working!';
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}
?>
