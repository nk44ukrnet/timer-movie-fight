<?php

print_r($_POST);

$name = $_POST['Username'];
$pass = $_POST['Password'];
$submit = $_POST['submit'];
if(isset($_POST['submit'])) {
    echo 'Login' . '<br>';
    echo 'Welcome, ' . $name;
}

if(isset($name) && !empty($name)) {
    echo '<br>name is ' . $name;
} else {
    echo '<br>No username detected<br>';
}
if(isset($pass) && !empty($pass)) {
    echo '<br>pass is ' . $pass;
} else {
    echo '<br>No pass detected<br>';
}

?>