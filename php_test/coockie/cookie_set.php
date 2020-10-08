<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$expiretime = time() + 86400;
//echo 'time is: ' . $expiretime;
setcookie("name", "IVAN", $expiretime);
setcookie("age", "24", $expiretime);
print_r($_COOKIE);
//echo $_COOKIE["name"];

echo '<br>name in cookie is: ' . $_COOKIE["name"] . ' cookie will expire in ms: ' . $expiretime;
echo '<br>age in cookie is: ' . $_COOKIE["age"] . ' cookie will expire in ms: ' . $expiretime;
?>
</body>
</html>