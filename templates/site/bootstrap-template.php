<!DOCTYPE html>
<?php
$app_context = $_SERVER['app_context'];
if (!$app_context) {
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $file_name = dirname(__FILE__);
    $whatIWant = substr($file_name, strlen($document_root) + 1);
    $app_context = substr($whatIWant, 0, strpos($whatIWant, '/'));
    if ($app_context != '') {
        $app_context = "/" . "$app_context";
    }
} else {
    $app_context = "";
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo $app_context . '/assets/bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo $app_context . '/assets/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?php echo $app_context . '/assets/site/css/form-elements.css' ?>">
    <link rel="stylesheet" href="<?php echo $app_context . '/assets/site/css/style.css' ?>">
    <!--link rel="stylesheet" href="/assets/site/css/bootstrap-accessibility.css"-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  &lt;!&ndash; Favicon and touch icons &ndash;&gt;
      <link rel="shortcut icon" href="/assets/ico/favicon.png">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">-->
    <style>
        .navbar-brand {
            font-weight: 700 !important;
            font-size: 24px !important;
        }
    </style>
</head>

<body>

<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="inner-bg">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header ">
                        <img class="navbar-brand" style="height: 69px;"
                             src="<?php echo $app_context . '/assets/site/img/blinx_logo2.png' ?>"/>
                        <a class="navbar-brand" href="<?php echo $app_context ?>">
                            <h4><strong>Blinx</strong></h4>
                        </a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav ">
                            <!-- <li class="active"><a href="profile.html"><h3><strong>Home</strong></h3></a></li>-->
                            <li><a href="#"><strong><h4>Request Service</h4></strong></a></li>
                            <li><a href="#"><strong><h4>Search Services</h4></strong></a></li>
                            <li><a href="#"><strong><h4>Rate the Volunteer</h4></strong></a></li>
                            <li><a href="#"><strong><h4>History</h4></strong></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($_SESSION['loggedIn']): ?>
                                <li><a href="<?php echo $app_context . '/logout.php' ?>"><strong><h4>Sign Out</h4>
                                        </strong> </a></li>
                            <?php else: ?>
                                <li><a href="#"><strong><h4>Sign In</h4><strong></a></li>
                            <?php endif ?>

                        </ul>
                    </div>
                </div>
            </nav>
            <?= $this->section('content') ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <div class="footer-border"></div>
                <p>Contact Us</i></p>
            </div>

        </div>
    </div>
</footer>

<!-- Javascript -->
<script src="<?php echo $app_context . '/assets/site/js/jquery-1.11.1.min.js' ?>"></script>
<script src="<?php echo $app_context . '/assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo $app_context . '/assets/site/js/jquery.backstretch.js' ?>"></script>
<script src="<?php echo $app_context . '/assets/site/js/scripts.js' ?>"></script>

<!--[if lt IE 10]>
<script src="<?php echo $app_context.'/assets/site/js/placeholder.js'?>"></script>
<![endif]-->
<script type="text/javascript">
    jQuery(document).ready(function () {
        $.backstretch("<?php echo $app_context.'/assets/site/img/backgrounds/1.jpg'?>");
    });
</script>
</body>

</html>
