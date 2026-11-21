<?php
require_once __DIR__ . '/../database/connexion.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM formations WHERE id = :id");
$stmt->execute([':id' => $id]);
$formation = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$formation) { die("Formation introuvable."); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE formations SET nom = :nom, duree_mois = :duree WHERE id = :id");
    $stmt->execute([
        ':nom' => $_POST['nom'],
        ':duree' => $_POST['duree_mois'],
        ':id' => $id,
    ]);
    header("Location: index.php?msg=updated");
    exit;
}

$titre = 'Modifier une formation';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="card shadow-sm col-md-6 mx-auto">
  <div class="card-header"><h4 class="mb-0">Modifier une formation</h4></div>
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($formation['nom']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Durée (mois)</label>
        <input type="number" name="duree_mois" class="form-control" value="<?= $formation['duree_mois'] ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
      <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>