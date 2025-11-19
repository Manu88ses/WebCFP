
<?php
require __DIR__ . '/inc/functions.php';
session_start();

$pages = [
  'inici'      => ['title' => 'Inici',      'file' => __DIR__ . '/pages/inici.php'],
  'benvinguda' => ['title' => 'Benvinguda', 'file' => __DIR__ . '/pages/benvinguda.php'],
  'secretaria' => ['title' => 'Secretaria', 'file' => __DIR__ . '/pages/secretaria.php'],
  'creacio_cursos' => ['title' => 'Creació de cursos', 'file' => __DIR__ . '/pages/creacio_cursos.php'],

];

$slug = isset($_GET['p']) ? strtolower(trim($_GET['p'])) : 'inici';
$current = $pages[$slug] ?? null;
?>
<!doctype html>
<html lang="ca">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e(($current['title'] ?? '404') . ' — Centre de Formació Professional') ?></title>
  <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
</head>
<body>
  <?php include __DIR__ . '/inc/header.php'; ?>
  <main class="container">
    <?php 
      if ($current && file_exists($current['file'])) {
        include $current['file'];
      } else { ?>
      <section class="card">
        <h1>Cursos del Centre de Formació Professional</h1>
        <p>Aquí trobarás tots els cursos del centre</p>
        <table id="taulaCursos" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
        <p><a class="btn btn-primary" href="<?= url('inici') ?>">Torna a l'inici</a></p>
      </section>
    <?php } ?>
  </main>
  <?php include __DIR__ . '/inc/footer.php'; ?>
  <script src="<?= asset('assets/js/app.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>"></script>
</body>
</html>
