<?php
require_once __DIR__ . '/../database/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO formations (nom, duree_mois) VALUES (:nom, :duree)");
    $stmt->execute([
        ':nom' => $_POST['nom'],
        ':duree' => $_POST['duree_mois'],
    ]);
    header("Location: index.php?msg=added");
    exit;
}

$titre = 'Ajouter une formation';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="card shadow-sm col-md-6 mx-auto">
  <div class="card-header"><h4 class="mb-0">Ajouter une formation</h4></div>
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Durée (mois)</label>
        <input type="number" name="duree_mois" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>