<?php
require_once __DIR__ . '/../database/connexion.php';

$sql = "SELECT e.id, e.nom, e.prenom, e.email, f.nom AS formation
        FROM etudiants e
        JOIN formations f ON e.formation_id = f.id
        ORDER BY e.id";
$etudiants = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$messages = [
    'added'   => 'Étudiant ajouté avec succès.',
    'updated' => 'Étudiant modifié avec succès.',
    'deleted' => 'Étudiant supprimé avec succès.',
];

$titre = 'Étudiants';
require_once __DIR__ . '/../includes/header.php';
?>
<?php if (isset($_GET['msg']) && isset($messages[$_GET['msg']])) : ?>
  <div class="alert alert-success"><?= $messages[$_GET['msg']] ?></div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Liste des étudiants</h4>
    <a href="create.php" class="btn btn-primary btn-sm">+ Ajouter un étudiant</a>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Formation</th><th class="text-end">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($etudiants as $e) : ?>
        <tr>
          <td><?= $e['id'] ?></td>
          <td><?= htmlspecialchars($e['nom']) ?></td>
          <td><?= htmlspecialchars($e['prenom']) ?></td>
          <td><?= htmlspecialchars($e['email']) ?></td>
          <td><span class="badge bg-info text-dark"><?= htmlspecialchars($e['formation']) ?></span></td>
          <td class="text-end">
            <a href="edit.php?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="delete.php?id=<?= $e['id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Supprimer cet étudiant ?');">Supprimer</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>