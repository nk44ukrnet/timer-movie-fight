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

define("Value_of_pi", 'sd');  // DEFINE CONST 1 - name, 2

echo Value_of_pi;  //call a const

echo '<br><br>';


//concatinate Variables via "."

$color = 'red';
$text = 'The color is ';

$concat = $text.$color;

echo $concat;

 // DObule quotation "" vs single quotations ''  - in singe quotes '$color' <- output //$color;
// in double quotes "" -> "$color" outputs "RED"; can be used string func "{$color} some txt";

$phrase1 = 'phrase 1';
$phrase2 = 'phrase 2';

echo '<br>'. $phrase1 . ' <- and -> ' . $phrase2 . '<br>';

$combine = $phrase1;
$combine .= $phrase2;

echo $combine;


?>
<hr>

Uppercase first letter: <?php echo ucfirst($phrase1) ?> <br>
uppercase first word: <?php echo ucwords($phrase1) ?> <br>
lowercase: <?php echo strtolower($phrase1) ?> <br>
uppercase: <?php echo strtoupper($phrase1) ?> <br>

<hr>

Repeat: <?php echo str_repeat($phrase1, 3) ?> <br>
Make substring from one point to another: <?php echo substr($phrase1, 5, 10) ?> <br>
Find position of the string: <?php echo strpos($phrase1, 'rase') ?> <br>
Find character: <?php echo strchr($phrase1, 'p') ?> <br>

<hr>

total length of a string: <?php echo strlen($phrase1); ?> <br>
trim <?php echo "A" . trim(" _B C D E_ ") . "F"; ?> <br>
find specific and show after: <?php echo strstr($combine, "1"); ?> <br>
Replace word with new: <?php echo str_replace("phr", "TOP", $combine); ?> <br>


</body>
</html>