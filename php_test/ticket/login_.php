<?php
require('db.php');

if (isset($_POST['Username']) and isset($_POST['Password'])){

// Assigning POST values to variables.
    $username = $_POST['Username'];
    $password = $_POST['Password'];

// CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `admin` WHERE name='$username' and pass='$password'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    if ($count == 1){

//echo "Login Credentials verified";
        echo "<p>Вхід виконано</p>";
        //echo session_status();
        $_SESSION['login'] = true;
        //$session_login = session_name('login');
        //echo $session_login;
        if($_SESSION['login']) {
            echo '<a href="index.php"> Переглянути список квитків <br><br>';
            echo '<a href="ticket.php?num=50001"> Сторінка з тестовим квитком <br><br>';
        }

    }else{
        header('Location: https://robotica.in.ua/wp-content/uploads/2020/02/dates_pg.jpg');
//echo "Invalid Login Credentials";
    }
} else {
    header('location: https://robotica.in.ua/fest-schedule/');
}
?>