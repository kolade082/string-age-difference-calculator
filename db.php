<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=xtremepush', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Could not connect to the database xtremepush :' . $e->getMessage());
}

