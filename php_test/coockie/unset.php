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
//unset
$expiretime_unset = time() - 86400;
setcookie("name", "IVAN", $expiretime_unset);
setcookie("name", null);
setcookie("name", "", $expiretime_unset);

if(isset($_COOKIE['name'])) {
    echo 'cookie is set with a name of ' . $_COOKIE['name'];
} else {
    echo 'Cookie is not set';
}
?>
</body>
</html>