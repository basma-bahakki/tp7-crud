<?php
require_once __DIR__ . '/../database/connexion.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM etudiants WHERE id = :id");
$stmt->execute([':id' => $id]);
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$etudiant) { die("Étudiant introuvable."); }

$formations = $pdo->query("SELECT id, nom FROM formations ORDER BY nom")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "UPDATE etudiants
         SET nom = :nom, prenom = :prenom, email = :email, formation_id = :formation_id
         WHERE id = :id"
    );
    $stmt->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':email' => $_POST['email'],
        ':formation_id' => $_POST['formation_id'],
        ':id' => $id,
    ]);
    header("Location: index.php?msg=updated");
    exit;
}

$titre = 'Modifier un étudiant';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="card shadow-sm col-md-6 mx-auto">
  <div class="card-header"><h4 class="mb-0">Modifier un étudiant</h4></div>
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($etudiant['nom']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($etudiant['email']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Formation</label>
        <select name="formation_id" class="form-select" required>
          <?php foreach ($formations as $f) : ?>
            <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['formation_id'] ? 'selected' : '' ?>>
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