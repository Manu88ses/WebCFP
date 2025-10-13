
<?php
require __DIR__ . '/inc/functions.php';

$pages = [
  'inici'      => ['title' => 'Inici',      'file' => __DIR__ . '/pages/inici.php'],
  'benvinguda' => ['title' => 'Benvinguda', 'file' => __DIR__ . '/pages/benvinguda.php'],
  'secretaria' => ['title' => 'Secretaria', 'file' => __DIR__ . '/pages/secretaria.php'],
];

$slug = isset($_GET['p']) ? strtolower(trim($_GET['p'])) : 'inici';
$current = $pages[$slug] ?? null;
?>
<!doctype html>
<html lang="ca">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e(($current['title'] ?? '404') . ' — Centre de Formació') ?></title>
  <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
</head>
<body>
  <?php include __DIR__ . '/inc/header.php'; ?>
  <main class="container">
    <?php if ($current && file_exists($current['file'])): ?>
      <?php include $current['file']; ?>
    <?php else: ?>
      <section class="card">
        <h1>404 — Pàgina no trobada</h1>
        <p>La pàgina que has sol·licitat no existeix.</p>
        <p><a class="btn" href="<?= url('inici') ?>">Torna a l'inici</a></p>
      </section>
    <?php endif; ?>
  </main>
  <?php include __DIR__ . '/inc/footer.php'; ?>
  <script src="<?= asset('assets/js/app.js') ?>"></script>
</body>
</html>
