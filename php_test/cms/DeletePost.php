<?php require_once('includes/db.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php
$SearchQueryParameter = $_GET['id'];
if(isset($_POST['Submit'])) {
        //query Delete POST to db
        global $ConnectingDB;
        $sql = "DELETE FROM posts WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB->query($sql);
//        $stmt = $ConnectingDB->prepare($sql);
        $Execute = $stmt->execute();
//        var_dump($Execute);
        if($Execute) {
            $_SESSION["SuccessMessage"] = "Post with id: " . $ConnectingDB->lastInsertId() . " DELETED Successfully";
            Redirect_to("Posts.php");
        } else {
            $_SESSION['ErrorMessage'] = 'Something went wrong. Try again';
            Redirect_to("Posts.php");
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

    <title>Delete post</title>
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
                <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Delete post</h1>
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
            //fetching existing content according to our
            global $ConnectingDB;

            $sql = "SELECT * FROM posts WHERE id='$SearchQueryParameter'";
            $stmt = $ConnectingDB->query($sql);
            while($DataRows = $stmt->fetch()) {
                $TitleToBeUpdated = $DataRows['title'];
                $CategoryToBeUpdated = $DataRows['category'];
                $ImageToBeUpdated = $DataRows['image'];
                $PostToBeUpdated = $DataRows['post'];
            }
            ?>
            <form action="DeletePost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
                <div class="card bg-secondary text-light mb-3">
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <label for="title"><span class="fieldinfo">Post Title</span></label>
                            <input class="form-control" type="text" id="title" name="PostTitle" placeholder="type title here" value="<?php echo $TitleToBeUpdated; ?>" disabled>
                        </div>

                        <div class="form-group">
                            <span class="fieldinfo">Existing Image:    </span>
                            <img class="mb-2" src="uploads/<?php echo $ImageToBeUpdated; ?>" alt="existing image" width="100">
                            <br>

                        </div>
                        <div class="form-group">
                            <label for="Post"><span class="fieldinfo">Post:</span></label>
                            <textarea class="form-control" name="PostDescription" id="Post" cols="80" rows="8" disabled>
                                <?php echo $PostToBeUpdated; ?>
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <button type="submit" name="Submit" class="btn btn-danger btn-block">
                                    <i class="fas fa-crash"></i>Delete
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