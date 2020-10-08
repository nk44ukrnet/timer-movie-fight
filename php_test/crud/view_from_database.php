<?php
require_once ('include/db.php');

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
<h2 style="text-align: center;"><?php echo @$_GET['id']; ?></h2>
<fieldset style="text-align: center">
    <form action="view_from_database.php" method="get">
        <input type="text" placeholder="search by name and ssn" name="search">
        <input type="submit" name="searchme" value="search">
    </form>
</fieldset>
<?php
if(isset($_GET['searchme'])) {
    global $ConnectingDB;
$search = $_GET['search'];
$sql = "SELECT * FROM emp_record WHERE ename='$search' OR ssn='$search'";
$stmt=$ConnectingDB->prepare($sql);
$stmt->bindValue(':search', $search);
$stmt->execute();
while($DataRows = $stmt->fetch()) {
    $id = $DataRows['id'];
    $EName = $DataRows['ename'];
    $SSN = $DataRows['ssn'];
    $Department = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $Homeadress = $DataRows['homeadress'];
    ?>
  <table border="1" align="center" style="margin-bottom: 10px;">
      <caption>Search results:</caption>
      <tr>
          <th>id</th>
          <th>name</th>
          <th>ssn</th>
          <th>department</th>
          <th>salary</th>
          <th>home adress</th>
          <th>search again</th>
      </tr>
      <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $EName; ?></td>
          <td><?php echo $SSN; ?></td>
          <td><?php echo $Department; ?></td>
          <td><?php echo $Salary; ?></td>
          <td><?php echo $Homeadress; ?></td>
          <td><a href="view_from_database.php">Search again</a></td>
      </tr>
  </table>
    <?php
} // end of while search loop
} // end of submit search
?>
<table width="1000" border="5" align="center">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>SSN</th>
        <th>DEPT</th>
        <th>SLRY</th>
        <th>HMDRSS</th>
        <th>Update</th>
        <th>delete</th>
    </tr>
    <?php
    global $ConnectingDB;
    $sql = "SELECT * FROM emp_record";
    $stmt = $ConnectingDB->query($sql);
    while($DataRows = $stmt->fetch()) {
        $id = $DataRows['id'];
        $EName = $DataRows['ename'];
        $SSN = $DataRows['ssn'];
        $Department = $DataRows['dept'];
        $Salary = $DataRows['salary'];
        $Homeadress = $DataRows['homeadress'];
    ?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $EName; ?></td>
        <td><?php echo $SSN; ?></td>
        <td><?php echo $Department; ?></td>
        <td><?php echo $Salary; ?></td>
        <td><?php echo $Homeadress; ?></td>
        <td><a href="update.php?id=<?php echo $id; ?>">update</a></td>
        <td><a href="delete.php?id=<?php echo $id; ?>">delete</a></td>

    </tr>
    <?php }?>
</table>
<?php ?>

</body>
</html>