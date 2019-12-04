<?php
$title = 'SQL Injection Demo';
$view  = 'sql-injection';

$sql = 'SELECT id,name FROM user';

// limit select by given query
$query = $_GET['q'] ?? null;
if ($query) {
    $sql .= " WHERE name LIKE '%" . $query . "%'";
}

$users = $pdo->query($sql)->fetchAll();
