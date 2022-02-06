<?php

require __DIR__."/../vendor/autoload.php";

$url = $_SERVER['PATH_INFO'];
$rotas = require __DIR__."/../config/routes.php";

if (!array_key_exists($url, $rotas)) {
    http_response_code(404);
    exit();
}

$classeControladora = $rotas[$url];
$controlador = new $classeControladora();
$controlador->processaRequisicao();