<?php

//Haal de configuratie op
require_once  'config.php';

//Met behulp van PDO zetten we de connectie op, waarna we met setAttribute de manier van errormeldingen weergeven bepalen.
$conn = new PDO("mysql:host=$dbHost;port=3306;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
