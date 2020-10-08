<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        input, select {
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
<?php include("db.php"); ?>
<?php
if($_SESSION['login']) {
    $num = $_GET['num'];
    $sql1 = "select * from tickets where num=$num";
    $res_data = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_array($res_data)) {

        ?>

        <h1> КВИТОК: <?php echo $row["num"]; ?> </h1>
        <h2 id="h2Color"> Валідовано: <span id="validationState"><?php echo $row["val"] ?></span></h2>


        <form action="update.php" method="POST" name="update">
            <input type="text" name="num" placeholder="Номер квитка" value="<?php echo $row["num"]; ?>"
                   style="font-size: 50px; width: 130px;">
            <!--        <input type="text" name="val" placeholder="Валідація" value="--><?php //echo $row["val"]
            ?><!--" style="font-size: 50px; width: 40px;">-->
            <select name="val" id="val" style="font-size: 50px;">
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <input type="submit" name="submitq" value="Валідувати" style="font-size: 50px">
        </form>

        <br><br>
        <a href="ticket.php?logout=true" id="logout">LOGOUT</a>
        <?php
    }
    mysqli_close($conn);

} else {
    header('Location: https://robotica.in.ua/wp-content/uploads/2020/02/dates_pg.jpg');
}
?>

<?php
function logout() {
    $_SESSION['login'] = false;
    header('Location: login.php');
}
if (isset($_GET['logout'])) {
    logout();
}
?>

<script>
    const validationState = document.querySelector('#validationState'),
        h2Color = document.querySelector('#h2Color'),
        logout = document.querySelector('#logout');
    let content = validationState.innerText;
    console.log(content);
    if(content === '0') {
        h2Color.style.backgroundColor = 'rgba(0,255,0, 0.5)';
    } else {
        h2Color.style.backgroundColor = 'rgba(255, 0 ,0, 0.5)';
    }

    //logout.addEventListener('click', function (e) {
    //    <?php //header('location: login.php'); ?>
    //});

</script>
</body>
</html>