<?php
require_once __DIR__ . '/../database/connexion.php';

$formations = $pdo->query("SELECT * FROM formations ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);

$messages = [
    'added'   => 'Formation ajoutée avec succès.',
    'updated' => 'Formation modifiée avec succès.',
    'deleted' => 'Formation supprimée avec succès.',
];

$titre = 'Formations';
require_once __DIR__ . '/../includes/header.php';
?>
<?php if (isset($_GET['msg']) && isset($messages[$_GET['msg']])) : ?>
  <div class="alert alert-success"><?= $messages[$_GET['msg']] ?></div>
<?php endif; ?>
<?php if (isset($_GET['erreur'])) : ?>
  <div class="alert alert-danger">Impossible de supprimer : cette formation contient encore des étudiants ou des modules.</div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Liste des formations</h4>
    <a href="create.php" class="btn btn-primary btn-sm">+ Ajouter une formation</a>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr><th>ID</th><th>Nom</th><th>Durée (mois)</th><th class="text-end">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($formations as $f) : ?>
        <tr>
          <td><?= $f['id'] ?></td>
          <td><?= htmlspecialchars($f['nom']) ?></td>
          <td><?= $f['duree_mois'] ?></td>
          <td class="text-end">
            <a href="edit.php?id=<?= $f['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="delete.php?id=<?= $f['id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Supprimer cette formation ?');">Supprimer</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>