<?php
declare(strict_types=1);

/**
 * e()
 * ———
 * Tracta caràcters especials de text per mostrar-lo amb seguretat a HTML.
 * Evitem injeccions amb JS.
 * Exemple:
 *   <h1><?= e($page['title']) ?></h1>
 */
function e(string $v): string
{
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

/**
 * base_path()
 * ——————————
 * Retorna el "subdirectori base" on corre l’app dins del servidor web.
 * És útil si el projecte NO està desplegat a l’arrel (p. ex. /, sinó /centre).
 *
 * Exemples:
 *   Si el teu script és: http://localhost/centre/public/index.php
 *     -> base_path() torna "/centre/public"
 *   Si el teu script és: http://localhost/index.php
 *     -> base_path() torna "" (cadena buida)
 */
function base_path(): string
{
    static $cached = null;
    if ($cached !== null) return $cached;

    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    // dirname('/centre/public/index.php') => '/centre/public'
    $dir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

    // Si el resultat és "/" volem retornar cadena buida per evitar "//"
    $cached = ($dir === '/' ? '' : $dir);
    return $cached;
}

/**
 * asset()
 * ———————
 * Construeix una URL relativa cap a un recurs estàtic (css/js/img/…),
 * respectant el subdirectori base.
 *
 * Exemples:
 *   <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
 *   <img src="<?= asset('/assets/img/logo.png') ?>">
 */
function asset(string $path = ''): string
{
    // Ens assegurem de no duplicar slashes
    $path = '/' . ltrim($path, '/');
    return base_path() . $path;
}

/**
 * url()
 * —————
 * Crea una URL interna de l’app (ruta "bonica") i, opcionalment, afegeix query params.
 * És neutral respecte al domini/esquema: genera camins relatius (ideal per a
 * apps servides per Apache/Nginx o pel built-in server de PHP).
 *
 * Paràmetres:
 *   - $path: ruta interna com "admin/pages" o "/admin/pages"
 *   - $params: array associatiu de query-string (['q' => 'text', 'page' => 2])
 *
 * Exemples:
 *   <a href="<?= url('/') ?>">Inici</a>
 *   <a href="<?= url('admin/pages') ?>">Pàgines</a>
 *   <a href="<?= url('cerca', ['q' => 'matrícula', 'page' => 2]) ?>">Cerca</a>
 */
function url(string $path = '', array $params = []): string
{
    // Normalitzem la ruta: sempre començant per "/"
    $path = '/?p=' . ltrim($path, '/?p=');

    $queryString = '';
    if (!empty($params)) {
        $queryString = '?p=' . http_build_query($params);
    }

    return base_path() . $path . $queryString;
}
