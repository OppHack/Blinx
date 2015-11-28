<!DOCTYPE html>
<?php

    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $file_name = dirname(__FILE__);
    $whatIWant = substr($file_name ,  strlen($document_root)+1);    
    $app_name = substr($whatIWant, 0, strpos($whatIWant, '/'));    
    if($app_name != '')
    {
        $app_name = "/" . "$app_name"  ; 
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
    <link rel="stylesheet" href="<?php echo $app_name.'/assets/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo $app_name.'/assets/font-awesome/css/font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?php echo $app_name.'/assets/site/css/form-elements.css'?>">
    <link rel="stylesheet" href="<?php echo $app_name.'/assets/site/css/style.css'?>">
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

</head>

<body>

<!-- Top content -->
<div class="top-content">
    <?= $this->section('content') ?>
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
<script src="<?php echo $app_name.'/assets/site/js/jquery-1.11.1.min.js'?>"></script>
<script src="<?php echo $app_name.'/assets/bootstrap/js/bootstrap.min.js'?>"></script>
<script src="<?php echo $app_name.'/assets/site/js/jquery.backstretch.js'?>"></script>
<script src="<?php echo $app_name.'/assets/site/js/scripts.js'?>"></script>

<!--[if lt IE 10]>
<script src="<?php echo $app_name.'/assets/site/js/placeholder.js'?>"></script>
<![endif]-->

</body>

</html>
