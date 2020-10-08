<?php
require_once ('include/db.php');
if(isset($_POST['submit'])) {
    if(!empty($_POST['ename'])
    && !empty($_POST['ssn'])
    ){
        $ename = $_POST['ename'];
        $ssn = $_POST['ssn'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];

        global $ConnectingDB;
        $sql = "INSERT INTO emp_record(ename, ssn, dept, salary, homeadress)
                VALUES (:enamE, :ssN, :depT, :salarY, :homeadresS)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':enamE', $ename);
        $stmt->bindValue(':ssN', $ssn);
        $stmt->bindValue(':depT', $dept);
        $stmt->bindValue(':salarY', $salary);
        $stmt->bindValue(':homeadresS', $address);
        $Execute = $stmt->execute();
        if($Execute) {
            echo 'Record has been added successfully';
        } else {
            echo 'error adding to the database';
        }
    } else {
        echo 'Please, insert at least name and ssn';
    }
}
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

<form action="insert_into_database.php" method="post">
<fieldset>
    <span>Empl name</span><br>
    <input type="text" name="ename"><br>
    <span>SSN:</span><br>
    <input type="text" name="ssn"><br>
    <span>Department:</span><br>
    <input type="text" name="dept"><br>
    <span>Slry:</span><br>
    <input type="text" name="salary"><br>
    <span>Adress:</span><br>
    <textarea name="address" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" name="submit" value="send">
</fieldset>
</form>

<?php
echo date('m');
?>
</body>
</html>


