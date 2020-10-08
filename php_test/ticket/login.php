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
<?php require_once('db.php'); ?>
<?php //require_once('functions.php'); ?>
<?php //require_once('sessions.php'); ?>

<?php

//if(isset($_POST['submit'])) {
//$Username = $_POST["Username"];
//$Password = $_POST["Password"];
// if(empty($Username)||empty($Password)) {
//     $_SESSION["ErrorMessage"] = "All fields must be filled out";
//     header('Location: login.php');
// } else {
//     global $conn;
////    $sql = "SELECT * FROM admin WHERE name=:userName AND pass=:passWord LIMIT 1";
//    $sql = "SELECT * FROM admin WHERE name=$Username AND pass=$Password LIMIT 1";
//    $stmt = $conn->prepare($sql);
//    $stmt = mysqli_query($conn, $sql);
////    $stmt->bindValue(":userName", $Username);
////    $stmt->bindValue(":passWord", $Password);
////    $stmt->execute();
//     $Result = $stmt->rowcount();
////     if($Result==1) {
////         echo '+++';
////     } else {
////         echo '---';
////     }
//     echo $stmt;
// }
//}
?>

<input type="text" id="storage">

<form action="login_.php" name="login" method="post" id="form">
    <input type="text" name="Username" id="Username" value=""><br>
    <input type="text" name="Password" value=""><br>
    <input type="submit" name="submit" value="send">
</form>


<script>
    form.style.display = 'none';

    storage.addEventListener('input', function (e) {
        if(storage.value === 'login') {
            form.style.display = 'block';
            this.style.display = 'none';
            Username.select();
        }
    });
</script>
</body>
</html>