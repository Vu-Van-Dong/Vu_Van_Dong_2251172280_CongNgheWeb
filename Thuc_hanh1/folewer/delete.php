<?php
include 'save.php';

$flowers = loadFlowers();
$id = $_GET['id'] ?? null;

if ($id !== null && isset($flowers[$id])) {
    unset($flowers[$id]);
    $flowers = array_values($flowers); // reset index
    saveFlowers($flowers);
}

header("Location: index.php?mode=admin");
exit;
