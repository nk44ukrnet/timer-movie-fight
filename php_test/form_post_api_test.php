<?php
$nameError = '';
$emailError = '';
$genderError = '';
$urlError = '';
function testUserInput ($data) {
    return $data;
}
if(isset($_POST['send'])) {
    if(empty($_POST['name'])) {
        $nameError = 'name is required';
    } else {
        $name = testUserInput($_POST["name"]);
        if(!preg_match("/^[A-Za-z . ]*$/", $name)) {
            $nameError = 'Only letters and whitespaces are allowed';
        }
        //echo 'ELSE';
    }
    if(empty($_POST['email'])) {
        $emailError = 'email is required';
    } else {
        $email = testUserInput($_POST['email']);
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)) {
            $emailError = 'Wrong email format!';
        }
    }
    if(empty($_POST['gender'])) {
        $genderError = 'gender pick is required';
    } else {
        $gender = testUserInput($_POST['gender']);
    }
    if(empty($_POST['url'])) {
        $urlError = 'url is required';
    } else {
        $url = testUserInput($_POST['url']);
        if(!preg_match("/(http:|ftp:|https:)\/\/[a-zA-Z0-9-_%\$?#\~!`]+\.[a-zA-Z0-9-_%\$?#\~!`]*+\.[a-zA-Z0-9-_%\$?#\~!`]*/", $url)) {
            $urlError = 'Wrong url format!';
        }
    }
    $msg = testUserInput($_POST['msg']);
    if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["gender"])
    && !empty($_POST["url"])) {
        if((preg_match("/^[A-Za-z . ]*$/", $name)) == true
            &&
            preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email) == true
            &&
            preg_match("/(http:|ftp:|https:)\/\/[a-zA-Z0-9-_%\$?#\~!`]+\.[a-zA-Z0-9-_%\$?#\~!`]*+\.[a-zA-Z0-9-_%\$?#\~!`]*/", $url) == true
        )  {
echo '<h2> Your submit info </h2>';
    echo 'Name input: ' . $name;
    echo '<br>Email input ' . $email;
    echo '<br>radio input ' . $gender;
    echo '<br>url input ' . $url;
    echo '<br>Comment input ' . $msg;
        } else {
            echo 'Please Complete and correct your Form again';
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
    <title>Document</title>
</head>
<body>
<fieldset>
    <legend>form</legend>

    <form action="form_post_api_test.php" method="post">
        <label for="name">Name* <?php echo $nameError ?></label><br>
        <input type="text" name="name" id="name"><br>
        <label for="email">E-mail* <?php echo $emailError ?></label><br>
        <input type="text" name="email" id="email"><br>
        <p>Btns*: <?php echo $genderError; ?></p>
        <label for="radio1">radio1</label>
        <input type="radio" name="gender" id="radio1" value="gen1">
        <label for="radio2">radio2</label>
        <input type="radio" name="gender" id="radio2" value="gen2"><br>
        <label for="url">URL* <?php echo $urlError; ?></p></label><br>
        <input type="text" name="url" id="url"><br>
        <label for="msg">MSG</label><br>
        <textarea name="msg" id="msg" cols="30" rows="10"></textarea><br>
        <input type="submit" name="send" value="send">
    </form>
</fieldset>
</body>
</html>