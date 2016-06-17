<?php

$dsn = "pgsql:host=localhost;dbname=trab_ads_132";
$usuario = "postgres";
$senha   = "masterkey";

$bd = new PDO($dsn, $usuario, $senha);