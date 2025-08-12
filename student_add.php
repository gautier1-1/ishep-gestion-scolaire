<?php
require __DIR__ . '/../src/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $matricule = $_POST['matricule'] ?? '';
  $nom = $_POST['nom'] ?? '';
  $prenoms = $_POST['prenoms'] ?? '';
  $filiere = $_POST['filiere'] ?? '';
  $niveau = $_POST['niveau'] ?? '';

  $stmt = $pdo->prepare("INSERT INTO students (matricule, nom, prenoms, filiere, niveau) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$matricule, $nom, $prenoms, $filiere, $niveau]);

  header('Location: students.php');
  exit;
}

include __DIR__ . '/inc/header.php';
?>
<section>
  <h2>Ajouter un étudiant</h2>
  <form method="post" style="max-width:600px;">
    <label>Matricule:<br><input name="matricule" required></label><br><br>
    <label>Nom:<br><input name="nom" required></label><br><br>
    <label>Prénoms:<br><input name="prenoms"></label><br><br>
    <label>Filière:<br><input name="filiere"></label><br><br>
    <label>Niveau:<br><input name="niveau"></label><br><br>
    <button class="btn" type="submit">Ajouter</button>
  </form>
</section>
<?php include __DIR__ . '/inc/footer.php'; ?>
