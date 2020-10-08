<?php require_once('includes/db.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php
if(isset($_POST['Submit'])) {
$Category = $_POST['CategoryTitle'];
$Admin = 'Jazeb';
    date_default_timezone_set('Asia/Karachi');
    $currenttime = time();
    $datetime = strftime('%B-%d-%Y-%H-%M-%S', $currenttime);
if(empty($Category)) {
$_SESSION['ErrorMessage'] = 'all fields must be filled out';
    Redirect_to('Categories.php');
} elseif (strlen($Category) < 3) {
    Redirect_to('Categories.php');
    $_SESSION['ErrorMessage'] = 'Category title should be more than 3 characters';
}  elseif (strlen($Category) > 49) {
    Redirect_to('Categories.php');
    $_SESSION['ErrorMessage'] = 'Category should be up to 50 characters';
} else {
    //query insert data to db
    global $ConnectingDB;
    $sql = 'INSERT INTO category(title, author, datetime)';
    $sql .= "VALUES(:categoryName, :adminName, :dateTime)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':categoryName', $Category);
    $stmt->bindValue(':adminName', $Admin);
    $stmt->bindValue(':dateTime', $datetime);
    $Execute = $stmt->execute();
    if($Execute) {
        $_SESSION["SuccessMessage"] = "Category with id: " . $ConnectingDB->lastInsertId() . " Added Successfully";
        Redirect_to("Categories.php");
    } else {
        $_SESSION['ErrorMessage'] = 'Something went wrong. Try again';
        Redirect_to("Categories.php");
    }
}
}
?>
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

    <title>Categories</title>
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
                    <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i> My profile</a>
                </li>
                <li class="nav-item">
                    <a href="Dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="Post.php" class="nav-link">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="Categories.php" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="Admins.php" class="nav-link">Manage admins</a>
                </li>
                <li class="nav-item">
                    <a href="Comments.php" class="nav-link">Comments</a>
                </li>
                <li class="nav-item">
                    <a href="Blog.php?page=1" class="nav-link">Live blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="Logout.php" class="nav-link text-danger"> <i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div style="height: 10px; background-color: #27aae1;"></div>
<!--NAV END-->
<!--HEADER-->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Manage Categories</h1>
            </div>
        </div>
    </div>
</header>
<!--MAIN AREA -->
<section class="container py-2 mb-4">
<div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <form action="Categories.php" method="post">
            <div class="card bg-secondary text-light mb-3">
                <div class="car-header">
                    <h2>Add new Category</h2>
                </div>
                <div class="card-body bg-dark">
                    <div class="form-group">
                        <label for="title"><span class="fieldinfo">Category Title</span></label>
                        <input class="form-control" type="text" id="title" name="CategoryTitle" placeholder="type title here">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <button type="submit" name="Submit" class="btn btn-success btn-block">
                                <i class="fas fa-check"></i>Publish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<!--MAIN AREA END-->
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