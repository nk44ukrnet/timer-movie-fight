<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];

    echo 'All went good!';
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
<form id="go">
    <input type="text" name="text" id="text">
    <input type="submit" name="submit">
</form>


<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    go.addEventListener('submit', function (e) {
        e.preventDefault();
        let thisForm = document.querySelector('#go');
        let thisText = document.querySelector('#text');
        let thisTextVal = thisText.value;
        let jj = new FormData(thisForm);
       let req = $.ajax({
            type: "POST",
            url: 'fetch2.php',
            data: thisTextVal,
            dataType: 'html'
        });
       req.done(function( msg ) {
           // ajax response
           console.log('Success', msg);
       });

    });
</script>
</body>
</html>