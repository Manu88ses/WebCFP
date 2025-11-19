
<section class="card">
  <h1>Benvinguts</h1>
  <p>Aquesta és la pàgina d'<strong>inici</strong>.</p>
  <ul>
    <p><a class="btn btn-primary" href="<?= url('benvingua') ?>">Veure els cursos</a></p>
  </ul>
</section>

<?php

if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['BotonLogin'])){
  $login = trim($_POST['usuari']);
}
