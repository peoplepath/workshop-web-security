<?php
// initialize database
$pdo = new PDO('sqlite:db.sq3');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// naïve MVC
$url = parse_url($_SERVER['REQUEST_URI']);
if (file_exists($model = __DIR__ . '/model' . $url['path'] . '.php')) {
    include $model;
} else {
    $title = 'Most common attacks';
    $view  = 'index';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="/">home</a>
        <div class="jumbotron">
            <h1 class="display-4"><?= $title ?></h1>
            <p class="lead"><?= $desc ?? '' ?></p>
            <hr class="my-4">
            <?php include __DIR__ . '/view/' . $view . '.php'; ?>
        </div>
    </div>
</body>
</html>
