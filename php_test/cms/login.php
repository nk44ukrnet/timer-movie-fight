<?php require_once('includes/db.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php
if(isset($_POST['submit'])) {
    $Uname = $_POST['Uname'];
    $Upassword = $_POST['Upassword'];
    if(empty($Uname)||empty($Upassword)) {
        $_SESSION['ErrorMessage'] = 'ALL FIELDS MUST BE FILLED OUT';
    } else {
        $Found_Account = Login_Attempt($Uname, $Upassword);
        if($Found_Account) {
            //print_r($Found_Account);
            $_SESSION['User_ID'] = $Found_Account['id'];
            $_SESSION['User_Name'] = $Found_Account['name'];
            $_SESSION['SuccessMessage'] = 'Welcome, ' . $_SESSION['User_Name'];
        } else {
            $_SESSION['ErrorMessage'] = 'Wrong Username/Password';
        }
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
    <style>
        input   {
            margin:5px;
            padding:3px;
        }
    </style>
    <title>login</title>
</head>
<body>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>
<div class="form-group">
    <form action="login.php" method="post">
        <div class="form-control mb-2">
            <input type="text" placeholder="login" name="Uname">
        </div>
        <div class="form-control mb-2">
            <input type="password" placeholder="password" name="Upassword">
        </div>
        <div class="form-control mb-2">
            <input type="submit" class="btn btn-success" name="submit" value="send">
        </div>

    </form>
</div>

</body>
</html>
