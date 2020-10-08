<?php
require_once ('include/db.php');
$searchQueryParameter = $_GET['id'];
//if(isset($_POST['submit'])) {

//    $ename = $_POST['ename'];
//    $ssn = $_POST['ssn'];
//    $dept = $_POST['dept'];
//    $salary = $_POST['salary'];
//    $address = $_POST['address'];

    global $ConnectingDB;
    $sql = "DELETE FROM emp_record WHERE id='$searchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if($Execute) {
        echo '<script>window.open("view_from_database.php?id=Record DELETED Successfully", "_self");</script>';
    } else {
        echo 'error updating the record in database';
    }
//}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>
</head>
<body>
<?php
/*global $ConnectingDB;
$sql = "SELECT * FROM emp_record WHERE id='$searchQueryParameter'";
$stmt=$ConnectingDB->query($sql);
while($DataRows = $stmt->fetch()) {
    $id = $DataRows['id'];
    $EName = $DataRows['ename'];
    $SSN = $DataRows['ssn'];
    $Department = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $Homeadress = $DataRows['homeadress'];*/
//}
?>
<!--<form action="delete.php?id=<?php //echo $searchQueryParameter;?>" method="post">
    <fieldset>
        <span>Empl name</span><br>
        <input type="text" name="ename" value="<?php //echo $EName ?>"><br>
        <span>SSN:</span><br>
        <input type="text" name="ssn" value="<?php //echo $SSN ?>"><br>
        <span>Department:</span><br>
        <input type="text" name="dept" value="<?php //echo $Department ?>"><br>
        <span>Slry:</span><br>
        <input type="text" name="salary" value="<?php //echo $Salary ?>"><br>
        <span>Adress:</span><br>
        <textarea name="address" id="" cols="30" rows="10"><?php //echo $Homeadress; ?></textarea><br>
        <input type="submit" name="submit" value="delete record">
    </fieldset>
</form> -->

<?php

//echo date('m');
?>
</body>
</html>


