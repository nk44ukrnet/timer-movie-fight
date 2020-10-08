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


if(isset($_POST['submitq'])) {
    include ('db.php');
 $num = $_POST['num'];
 $val = $_POST['val'];

 echo $num . '<br>';
 echo $val . '<br>';
    $sql = "UPDATE tickets SET val=$val WHERE num=$num";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

} else {
echo '<img src="https://robotica.in.ua/wp-content/uploads/2020/02/dates_pg.jpg" alt="Robotica">';
}

?>




</body>
</html>