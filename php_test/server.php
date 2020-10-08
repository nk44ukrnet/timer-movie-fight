<?php
/**
 * Created by PhpStorm.
 * User: v.kovtun
 * Date: 27.02.2020
 * Time: 17:36
 */
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
<?php
echo 'SERVER NAME : ' . $_SERVER['SERVER_NAME'] . '<br>';
echo 'SERVER ADDR : ' . $_SERVER['SERVER_ADDR'] . '<br>';
echo 'SERVER PORT : ' . $_SERVER['SERVER_PORT'] . '<br>';
echo 'DOCUMENT ROOT : ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
echo 'page details <br>';
echo 'PHP SELF : ' . $_SERVER['PHP_SELF'] . '<br>';
echo 'SCRIPT FILENAME : ' . $_SERVER['SCRIPT_FILENAME'] . '<br>';
//echo 'SCRIPT FILENAME : ' . $_SERVER['SCRIPT_FILENAME'] . '<br>';
echo 'request details <br>';
echo 'REMOTE ADDR ' . $_SERVER['REMOTE_ADDR'] . '<br>';
echo 'REMOTE PORT ' . $_SERVER['REMOTE_PORT'] . '<br>';
//echo 'REMOTE URI ' . $_SERVER['REMOTE_URI'] . '<br>';
echo 'REQUEST_URI ' . $_SERVER['REQUEST_URI'] . '<br>';
echo 'QUERY STRING ' . $_SERVER['QUERY_STRING'] . '<br>';
echo 'REQUEST METHOD ' . $_SERVER['REQUEST_METHOD'] . '<br>';
echo 'REQUEST TIME ' . $_SERVER['REQUEST_TIME'] . '<br>';
?>
</body>
</html>
