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
<?php ?>
<?php
$web="ggl link";
$search="some & search";
//1st part rawurlencode   ; 2nd part Search query urlencode;
$result = "https://" . rawurlencode($web) . "?Search=" . urlencode($search);
echo $result;
?>
</body>
</html>