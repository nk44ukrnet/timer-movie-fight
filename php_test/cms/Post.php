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

    <title>POSTS</title>
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
                <h1> <i class="fas fa-blog" style="color:#27aae1;"></i> BLOG</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="AddNewPost.php" class="btn btn-primary btn-block">
                    <i class="fas fa-edit">Add New Post</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Categories.php" class="btn btn-info btn-block">
                    <i class="fas fa-folder-plus">Add New Category</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Admin.php" class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus">Add New Admin</i>
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php" class="btn btn-success btn-block">
                    <i class="fas fa-check">Approve Comments</i>
                </a>
            </div>
        </div>
    </div>
</header>
<br>
<!--MAIN AREA -->
<section class="container mb-4 py-2">
    <div class="row">
      <div class="col-lg-12">
          <?php
          echo SuccessMessage();
          echo ErrorMessage();
          ?>
          <table class="table table-striped table-hover">
              <thead class="thead-dark">
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Date&Time</th>
                      <th>Author</th>
                      <th>Banner</th>
                      <th>Comments</th>
                      <th>Action</th>
                      <th>Live Preview</th>
                  </tr>
              </thead>
             <tbody>
                  <?php
                  global $ConnectingDB;
                  $sql = 'SELECT * FROM posts';
                  $stmt = $ConnectingDB->query($sql);
                  $sr = 0;
                  while ($DataRows = $stmt->fetch()) {
                      $Id = $DataRows['id'];
                      $PostTitle = $DataRows['title'];
                      $Category = $DataRows['category'];
                      $DateTime = $DataRows['datetime'];
                      $Admin = $DataRows['author'];
                      $Image = $DataRows['image'];
                      $PostText = $DataRows['post'];
                      $sr++;
                      ?>

                  <tr>
                      <td><?php echo $sr; ?></td>
                      <td>
                          <?php
                          if(strlen($PostTitle) > 15) {
                              $PostTitle= substr($PostTitle, 0, 14) . '..';
                          }
                           echo $PostTitle; ?></td>
                      <td><?php
                          if(strlen($Category) > 8) {
                              $Category = substr($Category, 0, 7) . '..';
                          }
                          echo $Category; ?></td>
                      <td><?php
                          if(strlen($DateTime) > 11) {
                              $DateTime = substr($DateTime, 0, 11) . '..';
                          }
                          echo $DateTime; ?></td>
                      <td><?php
                          if(strlen($Admin) > 7) {
                              $Admin= substr($Admin, 0, 6) . '..';
                          }
                          echo $Admin; ?></td>
                      <td><img src="uploads/<?php echo $Image; ?>" alt="img" width="100" height="50"></td>
                      <td>comments</td>
                      <td><a href="EditPost.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
                          <a href="DeletePost.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a></td>
                      <td><a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live preview</span></a></td>
                  </tr>
              <?php
              }
              ?>
             </tbody>
          </table>
      </div>
    </div>
</section>
<!-- END OF MAIN AREA -->
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