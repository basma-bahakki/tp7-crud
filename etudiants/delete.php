<?php
require_once __DIR__ . '/../database/connexion.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: index.php?msg=deleted");
exit;