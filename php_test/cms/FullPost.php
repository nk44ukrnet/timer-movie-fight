<?php require_once('includes/db.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Full post</title>
</head>
<body>
<!--NAV-->
<div style="height: 10px; background-color: #27aae1;"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="#!" class="navbar-brand">site.name</a>
        <button class="navbar-toggle navbar-dark bg-dark" data-toggle="collapse" data-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="Blog.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About us</a>
                </li>
                <li class="nav-item">
                    <a href="Blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Features</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <form class="form-inline d-none d-sm-block" action="Blog.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control mr-2" name="Search" placeholder="search here">
                            <button type="submit" class="btn btn-primary" name="SearchButton">Go</button>

                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div style="height: 10px; background-color: #27aae1;"></div>
<!--NAV END-->
<!--HEADER-->
<div class="container">
    <div class="row my-2">
        <div class="col-sm-8">
            <h1>Some text</h1>
            <h1 class="lead">public info</h1>
            <?php
            echo ErrorMessage();
            echo SuccessMessage();
            ?>
            <?php
            global $ConnectingDB;
            if(isset($_GET['SearchButton'])) {
                $Search = $_GET['Search'];
                $sql = "SELECT * FROM posts WHERE datetime LIKE :search OR category LIKE :search OR post LIKE :search";
                $stmt = $ConnectingDB->prepare($sql);
                $stmt->bindValue(':search', '%'.$Search.'%');
                $stmt->execute();
            } else {
                global $ConnectingDB;
                $PostIdFromUrl = $_GET['id'];
                if(!isset($PostIdFromUrl)) {
                    $_SESSION['ErrorMessage']="Bad request !";
                    redirect_to('Blog.php');
                }
                $sql = "SELECT * FROM posts WHERE id='$PostIdFromUrl'";
                $stmt = $ConnectingDB->query($sql);
            }
            while($DataRows = $stmt->fetch()) {
                $PostId = $DataRows['id'];
                $DateTime = $DataRows['datetime'];
                $PostTitle = $DataRows['title'];
                $Category = $DataRows['category'];
                $Admin = $DataRows['author'];
                $Image = $DataRows['image'];
                $PostDescription = $DataRows['post'];
                ?>

                <div class="card">
                    <div class="card-body">
                        <img src="uploads/<?php echo htmlentities($Image); ?>" alt="img" style="max-height: 450px;" class="img-fluid card-img-top">
                        <h4 class="card-title"><?php echo  htmlentities($PostTitle); ?></h4>
                        <small class="text-muted">Written by <?php echo $Admin; ?> On <?php echo  htmlentities($DateTime); ?></small>
                        <span style="float:right;" class="badge badge-dark text-light">Comments 20</span>
                        <hr>
                        <p class="card-text">
                            <?php
                            echo $PostDescription;
                            ?>
                        </p>
                    </div>
                </div>
                <?php
            } // end of the while loop
            ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<br>
<!--FOOTER-->
<footer class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="lead text-center">Theme by site.name &copy; <span id="year"></span>----all rights reserved</p>
                <p class="text-center small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, beatae commodi corporis culpa dolorem dolorum eveniet excepturi id in ipsa itaque iure laborum provident, quas ratione, repellendus tempora ut voluptates.</p>
            </div>
        </div>
    </div>
</footer>
<div style="height: 10px; background-color: #27aae1;"></div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $('#year').text(new Date().getFullYear());
</script>
</body>
</html>