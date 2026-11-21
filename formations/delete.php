<?php
require_once __DIR__ . '/../database/connexion.php';

$id = (int)($_GET['id'] ?? 0);

try {
    $stmt = $pdo->prepare("DELETE FROM formations WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: index.php?msg=deleted");
} catch (PDOException $e) {
    header("Location: index.php?erreur=lie");
}
exit;