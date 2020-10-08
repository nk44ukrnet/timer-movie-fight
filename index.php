<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>basic popup</title>
    <style>
        body {
            position: relative;
            margin: 0;
            padding: 0;
            ov
        }
        .modal {
            position: absolute;
            background-color: pink;
            width: 300px;
            height: 150px;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            margin: 0 auto;
            z-index: 2;
            /*overflow: hidden;*/
            margin-top: 30vh;
        }
        .bg {
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,.25);
            top: 0;
            /*left: 50%;*/
            /*transform: translateX(-50%);*/
            position: absolute;
            z-index: 1;
            display: none;
        }
        .active {
            display: block;
        }
        #close {
            float: right;
            font-family: sans-serif;
            font-size: 25px;
        }
    </style>
</head>
<body>
<span id="currentYear"></span>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button>input</button>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div class="bg">
    <div class="modal">
        <div id="close">&times;</div>
    </div>
</div>


<script>
    const bg = document.querySelector('.bg'),
        modal = document.querySelector('.modal'),
        btn = document.querySelector('button'),
        close = document.querySelector('#close');

    btn.addEventListener('click', function (e) {
        bg.classList.add('active');
        modal.style.top = pageYOffset + 'px';
        document.body.style.overflow = 'hidden';
        console.log(e.clientY);
    });

    close.addEventListener('click', function (e) {
        bg.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

    onmousemove = function(e) {
        // console.log(e.clientY);
    }

let getCurrentYear = new Date().getFullYear();
    currentYear.innerText = getCurrentYear;
</script>
</body>
</html>