<?php
// настройки локальной машины
$path_local = __DIR__ . '/bootstrap.local.php';
if(file_exists($path_local)) {
    require $path_local;
}