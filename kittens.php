<?php if ($_GET['show_me_kittens'] ?? false) { ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Red_Kitten_01.jpg/320px-Red_Kitten_01.jpg">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Cute_grey_kitten.jpg/320px-Cute_grey_kitten.jpg">
    <img src="http://127.0.0.1:8080/csrf?address=Univerzitn%C3%AD+8&dish=Chicken+Vindaloo">
</body>
</html>
<?php return;} ?>
<h2>Hi Alice, checkout those lovely kittens. Click <a href="?show_me_kittens=1">here</a>.</h2>
