<?php
$title = 'SQL Injection Demo [FIXED]';
$view  = 'sql-injection';

$sql = 'SELECT id,name FROM user';
$params = [];

// limit select by given query
$query = $_GET['q'] ?? null;
if ($query) {
    $sql .= " WHERE name LIKE ?";
    $params[] = '%' . $query . '%';
}

// prepare SQL statement on DB without arguments
$statement = $pdo->prepare($sql);

// send arguments separately (safely)
$statement->execute($params);

// execute as normal
$users = $statement->fetchAll();
