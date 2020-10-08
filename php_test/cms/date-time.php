<?php
date_default_timezone_set('Asia/Karachi');
$currenttime = time();
//$datetime = strftime('%Y-%m-%d-%H-%M-%S', $currenttime);
$datetime = strftime('%B-%d-%Y-%H-%M-%S', $currenttime);

//echo '<br>currentTime:' . $currenttime . '<br>';
echo '<br>dateTime: ' . $datetime . '<br>';