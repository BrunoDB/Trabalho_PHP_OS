<?php

$dsn = "pgsql:host=localhost;dbname=bdb";
$usuario = "postgres";
$senha   = "masterkey";

$bd = new PDO($dsn, $usuario, $senha);