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
$firstNumber = 3;
$secondNumber = 4;
$thirdNumber = 3.5325;

echo $firstNumber + $secondNumber . '<br>';
echo $firstNumber . '<br>';
echo $secondNumber . '<br>';
echo 'ceil: ' .ceil($thirdNumber) . '<br>';
echo 'floor: ' . floor($thirdNumber) . '<br>';
echo is_integer($thirdNumber) . '<br>'; // if nothing returns = false = 0
echo is_float($thirdNumber) . '<br>'; //returns 1 = true
echo is_numeric($thirdNumber) . ' isnumeric<br>';
?>
<br>arrays<br>
<?php
$food = array("Asian"=>"Pizza", "Italian"=>"Spaghetti");
echo $food["Italian"];
?>
<pre>
    <?php
    echo print_r($food);
    ?>
</pre>
<br>arrays funcs <br>
<?php
$color=array("red","green","blue");
array_pop($color); //-1 from back
print_r($color);
array_push($color, "black", "white", "yellow");
print_r($color);
//find total numbers in array:
$numbers = array(1,2,3,4,5,6,7,8,99);
echo count($numbers) . '<br>';
echo min($numbers) . 'min number in numbers array <br>'; // min
echo max($numbers) . 'max number in numbers array <br>'; // max
echo in_array('99', $numbers) . '<br>'; // return true/false; Not sensative to num/str
echo sort($numbers);
echo print_r($numbers) . '<br>';
echo rsort($numbers);
echo print_r($numbers) . '<br>';
//implode
$quote = array('Never', 'tell', 'smth', 'to', 'someone');
echo implode($quote, ' '); //convert array to sentece; , ' ' - add spacebar between them
//explode
$quote1 = 'Never tell smth to someone';
print_r( explode(' ', $quote1) );// convert string to array; ' ' - specifies space in string
echo '<br> Numbers:';
$nums = array(1,25,33,44,55,66);
echo current($nums) . '<br>';
next($nums);
echo current($nums) . '<br>';
reset($nums);
echo $nums[0];
echo end($nums);
?>
<hr>
<br>if staements <br>

<?php
$weather = 1;

if($weather === '1') {
    echo 'OK!!!';
} else if ($weather == 'far') {
    echo 'not ok';
} else {
    echo 'nope';
}
$a=1;
$b=2;
echo '<br><br>';
$resultQ = $a<$b ? 'yes' :  'no';
echo $resultQ;
echo '<br><br>';
for($a = 1; $a <= 10; $a++) {
    echo "${a} is from for loop <br>";
}
?>
<br>while<br>
<hr>
<?php
$val1 = 15;

while($val1<=20) {
    echo "val1 is ${val1} now <br>";
    $val1++;
}
$myArr = array(1,23,5,5,23,52,3,5423,4,23,42,3,432,4,23,42,3);
foreach($myArr as $myItem) {
    echo $myItem . '<br>';
}
$foodArr = array( // associative array;
    'key_1'=>'pizza',
    'key-data-2'=>'sip',
    'key-number-3'=>'package',
    'key-echo-5'=>'Life is simple',
    'key^6'=>'PHP',
    'key num 7'=> '5325',
    'price'=> '512'
);

foreach($foodArr as $keys=>$value) {
    $Data = ucwords(str_replace("^", "<><><><><>", $keys)); //ucwords -> First Capital
    if ($keys === 'price') {
        if (is_numeric($value)) { //is_bool <- is boolean
            echo 'ok';
        } else {
            $value = 'cannot be determined';
        }

        echo "${Data} have: ${value} <br>";
    }
}

//switch

$checkWeather = ' sunny';

switch(trim($checkWeather)) {
    case "sunny":
        echo 'WTHR IS SUNNY <br>';
        break;
    case "dark":
        echo "WTHR IS DARK <br>";
        break;
    default:
        echo "Default value";
}

echo '<br><br>';
$someNames = array('name1', 'name2', 'name3', 'name4', 'name5', 'name6', 'root', 'some other');

foreach($someNames as $name) {
    if($name === 'name5') {
      break;
      //echo $name;
    }
    echo $name;
}


function wlcm() {
    echo '<br>function wlcm is ready<br>';
}
wlcm();

function addition($a = 1, $b = 2) {
//    $a=5;
//    $b=6;
   return $c=$a+$b;
    //echo '<br> addition is ' . $c;
}
$totalFunc = addition(15,25);
$totalFunc1 = addition();
echo $totalFunc1;
//echo $c;
?>

<?php
//require('fafa.php');  // without this <- will be error;

function normalVal() {
    $val1 = 2;
    echo '<br>' . $val1 . '<br>';
    $val1++;
}
normalVal();
normalVal();

function staticVar() {
    static $val1 = 4;  // static var will be changed in next function calls;
    echo '<br> static value:' . $val1 . '<br>';
    $val1++;
}
staticVar();
staticVar();

$testVar = 12345;

function goTest() {
    global $testVar; //global var
    echo $testVar;
}
goTest();

//super global 9: types: $GLOBALS $_SERVER $_REQUEST $_FILES $_SESSION $_ENV ;
// // and $_GET $_POST $_COOKIE
$x = 5;
$y = 10;
function functTestSuperGlobals() {
    return $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

functTestSuperGlobals();
echo '<br>' . $y . '<br>';
print_r($GLOBALS);
//?>

</body>
</html>