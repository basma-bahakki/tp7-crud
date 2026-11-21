<?php
$titre = 'Accueil';
require_once __DIR__ . '/includes/header.php';
?>
<div class="text-center mb-5">
  <h1 class="fw-bold">Gestion du centre de formation</h1>
  <p class="text-muted">Choisissez un espace de gestion</p>
</div>

<div class="row g-4">
  <div class="col-md-4">
    <div class="card shadow-sm h-100 text-center">
      <div class="card-body">
        <h4 class="card-title">Formations</h4>
        <p class="card-text">Gérer les formations proposées par le centre.</p>
        <a href="formations/index.php" class="btn btn-primary">Ouvrir</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm h-100 text-center">
      <div class="card-body">
        <h4 class="card-title">Étudiants</h4>
        <p class="card-text">Gérer les étudiants et leur formation.</p>
        <a href="etudiants/index.php" class="btn btn-primary">Ouvrir</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm h-100 text-center">
      <div class="card-body">
        <h4 class="card-title">Modules</h4>
        <p class="card-text">Gérer les modules de chaque formation.</p>
        <a href="modules/index.php" class="btn btn-primary">Ouvrir</a>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>