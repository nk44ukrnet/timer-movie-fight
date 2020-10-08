<?php
session_start();
?>
<?php
$_SESSION['name'] = 'session1';
$_SESSION['age'] = 24;
$name = $_SESSION['name'];
$age = $_SESSION['age'];

echo $name;
echo $age;
?>
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

</body>
</html>