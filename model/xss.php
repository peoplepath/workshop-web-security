<?php
$title = 'XSS demo';
$desc  = 'Outputting user input unescaped';
$view  = 'xss';

if (isset($_POST['name'])) {
    $sql  = 'INSERT INTO pledge (name, comment, ccn) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['comment'], $_POST['ccn']]);

    // just for better experience during presentation
    header('Location: ?');
    exit;
}

// select all pledges, you don't have to prepare statement if there's no user input
$sql = 'SELECT * FROM pledge';

$pledges = $pdo->query($sql)->fetchAll();
