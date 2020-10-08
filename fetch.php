<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    echo 'all is ok';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form id="go">
    <input type="text" name="text" id="text">
    <input type="submit" name="submit">
</form>
<script>
    let formGo = document.querySelector('#go');
    formGo.addEventListener('submit', e => {
        e.preventDefault();
        let scriptURL = 'fetch1.php',
            currentForm = document.querySelector('#go');
        fetch(scriptURL, { method: 'POST', body: new FormData(currentForm)})
            .then(response => (response.status))
            .then(response => (console.log(response)))
            .catch(error => console.error('Error!', error.message));
        });
        // fetch(scriptURL, {method: 'POST', body: new FormData(currentForm)})
        //     .then(response => {
        //           console.log(response.text());
        //     })
        //     .catch(error => console.error(error));
</script>
</body>
</html>
