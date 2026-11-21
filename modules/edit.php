<?php
require_once __DIR__ . '/../database/connexion.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM modules WHERE id = :id");
$stmt->execute([':id' => $id]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$module) { die("Module introuvable."); }

$formations = $pdo->query("SELECT id, nom FROM formations ORDER BY nom")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE modules SET titre = :titre, heures = :heures, formation_id = :formation_id WHERE id = :id");
    $stmt->execute([
        ':titre' => $_POST['titre'],
        ':heures' => $_POST['heures'],
        ':formation_id' => $_POST['formation_id'],
        ':id' => $id,
    ]);
    header("Location: index.php?msg=updated");
    exit;
}

$titre = 'Modifier un module';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="card shadow-sm col-md-6 mx-auto">
  <div class="card-header"><h4 class="mb-0">Modifier un module</h4></div>
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($module['titre']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Heures</label>
        <input type="number" name="heures" class="form-control" value="<?= $module['heures'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Formation</label>
        <select name="formation_id" class="form-select" required>
          <?php foreach ($formations as $f) : ?>
            <option value="<?= $f['id'] ?>" <?= $f['id'] == $module['formation_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($f['nom']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
      <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>