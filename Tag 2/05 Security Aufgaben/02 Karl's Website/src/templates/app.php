<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Karl's Website</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">Karl's Webside</a>
            <div class="nav-collapse">
              <ul class="nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?page=guestbook.php">Gästebuch</a></li>
            </ul>
            <form class="navbar-search pull-left" action="index.php?page=search.php" method="POST">
                <input type="text" name="q" class="search-query span2" placeholder="Search">
            </form>
        </div><!-- /.nav-collapse -->
    </div>
</div><!-- /navbar-inner -->
</div>
<div class="container">
    <div class="col-md-12">
        <?php include 'views/' . $view ?>
    </div>
</div>
</body>
</html>