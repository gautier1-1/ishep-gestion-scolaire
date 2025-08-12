<?php
require __DIR__ . '/../src/config.php';
include __DIR__ . '/inc/header.php';

$stmt = $pdo->query("SELECT id, matricule, nom, prenoms, filiere, niveau FROM students ORDER BY id DESC");
$students = $stmt->fetchAll();
?>

<section>
  <h2>Étudiants</h2>
  <p><a class="btn" href="student_add.php">Ajouter un étudiant</a></p>

  <table aria-label="Liste des étudiants">
    <thead><tr><th>Matricule</th><th>Nom</th><th>Filière</th><th>Niveau</th><th>Actions</th></tr></thead>
    <tbody>
      <?php foreach($students as $s): ?>
      <tr>
        <td><?= htmlspecialchars($s['matricule']) ?></td>
        <td><?= htmlspecialchars($s['nom'].' '.$s['prenoms']) ?></td>
        <td><?= htmlspecialchars($s['filiere']) ?></td>
        <td><?= htmlspecialchars($s['niveau']) ?></td>
        <td>
          <a href="student_edit.php?id=<?= $s['id'] ?>">Éditer</a> |
          <a href="student_delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
