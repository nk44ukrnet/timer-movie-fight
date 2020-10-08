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
$name = 'qlex more';
$position = 'sprt coordinator & mngr';
?>

<a href="get_chapter2.php?name=<?php echo $name; ?>">click</a>
<a href="get_chapter2.php?position=<?php echo $position; ?>">click2</a>
<a href="get_chapter2.php?name=<?php echo $name; ?>&position=<?php echo rawurlencode($position); ?>">click3</a>

</body>
</html>