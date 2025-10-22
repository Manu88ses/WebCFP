
<section class="card">
  <h1>Benvinguts</h1>
  <p>Aquesta és la pàgina d'<strong>inici</strong>.</p>
  <ul>
    <li><a class="btn" href="<?= url('benvingua') ?>">(demo) Enllaç trencat per veure 404</a></li>
  </ul>
</section>

<?php

if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['BotonLogin'])){
  $login = trim($_POST['usuari']);
}
