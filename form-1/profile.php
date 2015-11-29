<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLINX</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-accessibility.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>

    <?php
        session_start();
        include_once 'php/dbconnect.php';
         // var_dump($_POST);
        $query ="SELECT * FROM m_user WHERE email_id='".$_SESSION['user']."'";
        $res=mysqli_query($conn, $query);
        $row=mysqli_fetch_array($res);
    ?>

<!-- Top content -->
<div class="top-content" id="includedContent">

    <div class="inner-bg">
        <div class="container">

            <div class="col-sm-3"></div>

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3><?php echo $row['first_name'] . ' ' .$row['last_name']; ?> Details</h3>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <table class="table table-striped">
                                <tbody>
                                <tr >
                                    <td><img src="<?php echo $row['picture_path'];?>" class="img-thumbnail" alt="Cinque Terre" width="200" height="500"></td>
                                    <td><?php echo $row['first_name'] . ' ' .$row['last_name'];?></td>
                                </tr>
                                <tr >
                                    <td>Mobile Number</td>
                                    <td><?php echo $row['mobile_number'];?></td>
                                </tr>
                                <tr >
                                    <td>Alternate Mobile Number</td>
                                    <td><?php echo $row['alternative_mobile_number'];?></td>
                                </tr>
                                <tr >
                                    <td>Date of Birth</td>
                                    <td><?php echo $row['date_of_birth'];?></td>
                                </tr>
                                <tr >
                                    <td>Gender</td>
                                    <td><?php echo $row['gender'];?></td>
                                </tr>
                                <tr >
                                    <td>Qualification</td>
                                    <td><?php echo $row['qualification'];?></td>
                                </tr>
                                <tr >
                                    <td>Institution</td>
                                    <td><?php echo $row['institution'];?></td>
                                </tr>
                                <tr >
                                    <td>Occupation</td>
                                    <td><?php echo $row['occupation'];?></td>
                                </tr>
                                <tr >
                                    <td>Address</td>
                                    <td><?php echo $row['address'];?></td>
                                </tr>
                                <tr >
                                    <td>District</td>
                                    <td><?php echo $row['address'];?></td>
                                </tr>
                                <tr >
                                    <td>Geo Location</td>
                                    <td><?php echo $row['location'];?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>


            </div>

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
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>