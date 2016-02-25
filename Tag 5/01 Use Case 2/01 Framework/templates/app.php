<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Template</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
    <div class="wrapper">
        <?php include view($view); ?>
    </div>

    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="assets/app.js"></script>
</body>
</html>