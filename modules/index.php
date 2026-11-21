<?php
require_once __DIR__ . '/../database/connexion.php';

$sql = "SELECT m.id, m.titre, m.heures, f.nom AS formation
        FROM modules m
        JOIN formations f ON m.formation_id = f.id
        ORDER BY m.id";
$modules = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$messages = [
    'added'   => 'Module ajouté avec succès.',
    'updated' => 'Module modifié avec succès.',
    'deleted' => 'Module supprimé avec succès.',
];

$titre = 'Modules';
require_once __DIR__ . '/../includes/header.php';
?>
<?php if (isset($_GET['msg']) && isset($messages[$_GET['msg']])) : ?>
  <div class="alert alert-success"><?= $messages[$_GET['msg']] ?></div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Liste des modules</h4>
    <a href="create.php" class="btn btn-primary btn-sm">+ Ajouter un module</a>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr><th>ID</th><th>Titre</th><th>Heures</th><th>Formation</th><th class="text-end">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($modules as $m) : ?>
        <tr>
          <td><?= $m['id'] ?></td>
          <td><?= htmlspecialchars($m['titre']) ?></td>
          <td><?= $m['heures'] ?> h</td>
          <td><?= htmlspecialchars($m['formation']) ?></td>
          <td class="text-end">
            <a href="edit.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="delete.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Supprimer ce module ?');">Supprimer</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>