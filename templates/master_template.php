<!DOCTYPE html>
<meta charset="utf-8"/>
<html>
<head>
    <base href="<?= BASE_URL ?>">
    <title>Esileht</title>
    <link href="vendor/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/headerfooter.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="vendor/components/bootstrap/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <img src="http://www.localhost/aastategija/images/khk_logo.png" style="height:45px;" alt="logo"/>
        </div>
        <div class="navbar-form navbar-right">
            <h4></h4>
        </div>
    </div>
</nav>


<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <?php if (!file_exists("views/$controller/{$controller}_$action.php")) error_out('The view <i>views/' . $controller . '/' . $controller . '_' . $action . '.php</i> does not exist. Create that file.'); ?>
    <?php @require "views/$controller/{$controller}_$action.php"; ?>
</div>

<script src="assets/js/main.js"></script>
<!-- footer -->
<footer class="footer-default">
    <div class="footer-info">
        <p class="address">Tartu Kutsehariduskeskus <br>
            Kopli 1, 50115 Tartu</p>
        <p class="contact">E-post: info@khk.ee <br>
            Telefon: 7 361 866</p>
        <ul class="facebook">
            <li>
                <a href="http://www.facebook.com/kutseharidus">
                    <img src="http://www.localhost/aastategija/images/fb_logo.png">
                </a>
            </li>
        </ul>
    </div>
</footer>
<!-- footer end-->
</body>
</html>