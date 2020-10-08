<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {

    $email = $_POST['email'];
    $email = htmlentities($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        $headers[] = 'From:  <info@inventor.com.ua>';

        $to = $email;

        $subject = 'STEM-школа INVENTOR. Ви зареєструвалися на пробне заняття. Ваш подарунок всередині листа';

        $body = '
            <!doctype html>
            <html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STEM-школа INVENTOR. Ви зареєструвалися на пробне заняття. Ваш подарунок всередині листа</title>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body style="max-width:600px; margin: 0 auto; font-family: sans-serif;">
<h1 class="text-center">Привіт-привіт!</h1>
<p>
    Вітаємо з успішною реєстрацією на пробне заняття курсу «Програмування зі SPIKE Prime».
    <br>
    Невдовзі з вами зв’яжеться адміністраторка і допоможе підібрати найзручніший розклад та відповість на ваші
    запитання.
    <br><br>
    А поки, давайте ще раз познайомимося!
    <br><br>
    Ми – <strong>STEM-школа INVENTOR</strong> – інноваційна мережа навчальних закладів, де успішно впроваджені новітні
    STEM-технології у
    навчання дітей від 3 до 16 років.
    <br><br>
    Наші учні та учениці навчаються за унікальними авторськими програмами курсів і опановують технічні та інженерні
    науки за допомогою навчальних конструкторів LEGO Education та навчальної платформи на основі гри Minecraft.
    <br><br>
    Ми допоможемо вашій дитині:
    <br>
</p>
<ul>
    <li>засвоїти базові навички програмування та запрограмувати власного робота</li>
    <li>здійснити мрію та сконструювати LEGO-винахід</li>
    <li>опанувати технічні та інженерні науки</li>
    <li>конструювати хитромудрі механізми</li>
    <li>оволодіти важливими hard і soft skills</li>
    <li>цікаво підготуватися до школи</li>
</ul>
<h2 class="text-center">Ексклюзивний подарунок для вас!</h2>
<p>Даруємо запис нашого вебінару  "Як розвивати Soft skills та Hard skills за допомогою дистанційної освіти".
    <br><br>
    Дивитися вебінар:
    <br>
    <a href="https://www.youtube.com/watch?v=eJ5TJAfA9wQ"
       target="_blank">https://www.youtube.com/watch?v=eJ5TJAfA9wQ</a>
    <br><br>
    До зустрічі на занятті!
    <br><br>
</p>
<hr>
<p>
    STEM-школа INVENTOR <br>
    Телефон: <a href="tel:+380444909080">0444909080</a> <br>
    Сайт: <a href="https://inventor.com.ua/" target="_blank">https://inventor.com.ua/</a> <br>
</p>
</body>
</html>
        ';

        mail($to, $subject, $body, implode("\r\n", $headers));
        echo 'Email was successfully sent';
    } else {
        echo 'Wrong Email Format';
    }
}
?>




<script>
    const allForms = document.querySelectorAll('form');

    for (let itemForm of allForms) {
        formToGGL.addEventListener('submit', function (e) {
            e.preventDefault();
            //send email to user, if possible
            fetch('/email.php', {method: 'POST', body: new FormData(formToGGL)})
                .then((success) => {
                    console.log('Success: ', success);
                    return success.text();
                })
                .then((success) => (console.log(success)))
                .catch((error) => {
                    console.error('Error: ', error);
                    return error.text();
                }).catch((error) => (console.log('Error message: ', error)));
        })
    }

</script>



