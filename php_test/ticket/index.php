<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p:target {
            background-color: coral;
        }
    </style>
</head>
<body>


<?php include('db.php'); ?>
<form>
    <label for="inp">Знайти квиток на цій сторінці:</label> <br>
    <input type="text" placeholder="введіть номер квитка" id="inp">
    <a href="#50001" id="find" style="border: 1px solid black; display: inline-block; padding: 5px;">Знайти квиток</a>
    <br>
    <hr>
    <label for="inp">Перейти на сторінку з квитком:</label> <br>
    <input type="text" placeholder="введіть номер квитка" id="inp2">
    <a href="ticket.php?num=50001" id="goToTicket" style="border: 1px solid black; display: inline-block; padding: 5px;">Перейти</a>

</form>

<div style="max-width: 500px; max-height: 600px; overflow: scroll;">
    <p> Список квитків: </p>

    <?php
    $sql = "SELECT * FROM tickets";
    $res_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res_data)){
        ?>
        <p id="<?php echo $row["num"] ?>">Квиток: <b> <?php echo $row["num"] ?> </b> / Валідовано: <b>
                <?php echo $row["val"] ?></b> </p>

        <?php
    }
    mysqli_close($conn);
    ?>
</div>
<script>
    let inp = document.querySelector('#inp'),
        find = document.querySelector('#find'),
        inp2 = document.querySelector('#inp2'),
        goTo = document.querySelector('#goTo');


    inp.addEventListener('input', function (e) {
        let inpValue = inp.value;
        find.href = `#${inpValue}`;
    });
    inp2.addEventListener('input', function (e) {
        let inpValue = inp2.value;
        goTo.href= `ticket.php?num=${inpValue}`;
    });


</script>
</body>
</html>
