<?php $base = '/tp7-crud'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titre ?? 'Centre de formation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?= $base ?>/index.php">Centre de formation</a>
    <div class="navbar-nav">
      <a class="nav-link" href="<?= $base ?>/formations/index.php">Formations</a>
      <a class="nav-link" href="<?= $base ?>/etudiants/index.php">Étudiants</a>
      <a class="nav-link" href="<?= $base ?>/modules/index.php">Modules</a>
    </div>
  </div>
</nav>
<div class="container">