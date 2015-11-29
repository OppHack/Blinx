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
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="assets/js/typeahead.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker.js" charset="UTF-8"></script>
    <script>
    $(function(){
      $("#includedContent").load("profile.html");
    });

    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body onLoad="initialize()">


<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">

           <!-- <div class="col-sm-2"></div>-->

            <div class="row">
                <div class="col-sm-12">

                    <div class="form-box">
                        <!--<div class="form-top">
                            <div class="form-top-left">
                                <h3>List of Registrations Waiting For Approval</h3>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="" method="post" class="approve-form" action="php/approve.php">
                                <table class="table">

                                    <tbody>
                                    <thead>
                                    <tr class="active">
                                        <td>Profile</td>
                                        <td>User Name</td>
                                        <td>Proof</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tr class="active">
                                            <td><img src="assets/img/backgrounds/1.jpg" class="img-thumbnail" alt="Cinque Terre" width="200" height="500"></td>
                                        <td>Gokul KK</td>
                                        <td>PAN.pdf</td>
                                        <td><p><a href="#" class="btn btn-primary" role="button">Approve</a> <a href="#" class="btn btn-default" role="button">Decline</a></p></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </form>
                        </div>-->
                        <div class="row">
                            <div class="panel panel-primary filterable">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List of Registrations Waiting For Approval</h3>
                                    <div class="pull-right">
                                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr class="filters">
                                        <th><input type="text" class="form-control col-md-6 col-xs-6" placeholder="Username" disabled></th>
                                        <th><input type="text" class="form-control col-md-7 col-xs-7" placeholder="Proof" disabled></th>
                                        <th><input type="text" class="form-control col-md-7 col-xs-7" placeholder="Role" disabled></th>
                                        <th><input type="text" class="form-control col-md-8 col-xs-8" placeholder="Action" disabled></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                                session_start();
                                                include_once 'php/dbconnect.php';
                                                 // var_dump($_POST);
                                                //$_Zero=0;
                                                $query ="SELECT * FROM m_user WHERE verified= 0";
                                                //echo $query;    


                                        $results=mysqli_query($conn, $query);
                                        //var_dump($results);
                                        $row_count=mysqli_num_rows($results);
                                        //echo $row_count;
                                        // $row_users = mysqli_fetch_array($results);
                                        //var_dump($row_users);

                                        // echo "<table>";

                                        while ($row_users = mysqli_fetch_array($results)) {
                                                //output a row here
                                                // echo $row_users['email_id'];
                                                echo '<tr class="active">';
                                                echo '<td><a href="#" data-toggle="modal" data-target="#myModal" role="button">' . $row_users['first_name'] .'</a></td>';
                                                echo '<td><a href="' . $row_users['document_path'] . '">Document</a></td>';
                                                echo '<td>' . $row_users['user_type'] . '</td>';
                                                echo '<td><p><a href="php/moderator_action.php?action=approve&userId=' . $row_users['user_id'] . '"' . '" class="btn btn-primary" role="button">Approve</a> <a href="php/moderator_acion.php?action=reject&userId=' . $row_users['user_id'] . '"' . '" class="btn btn-default"  data-toggle="modal" data-target="#reasonModal" role="button">Decline</a></p></td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                
                                    <!--<tr class="active">
                                        &lt;!&ndash;<td><img src="assets/img/backgrounds/1.jpg" class="img-thumbnail" alt="Cinque Terre" width="200" height="500"></td>&ndash;&gt;
                                        <td><a href="#" data-toggle="modal" data-target="#myModal" role="button">Ajay Bose</a></td>>
                                        <td>PAN.pdf</td>
                                        <td>User</td>
                                        <td><p><a href="#" class="btn btn-primary" role="button">Approve</a> <a href="#" class="btn btn-default" role="button">Decline</a></p></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                    </div>



                </div>


            </div>

        </div>
    </div>

           <!-- <div class="alert alert-success">
                <strong>Success!</strong> Indicates a successful or positive action.
            </div>-->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Gokul KK Profile Details</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr >
                                <td><img src="assets/img/backgrounds/1.jpg" class="img-thumbnail" alt="Cinque Terre" width="200" height="500"></td>
                                <td>Gokul KK</td>
                            </tr>
                            <tr >
                                <td>Mobile Number</td>
                                <td>9901245453</td>
                            </tr>
                            <tr >
                                <td>Alternate Mobile Number</td>
                                <td>9901245453</td>
                            </tr>
                            <tr >
                                <td>Date of Birth</td>
                                <td>26/08/1986</td>
                            </tr>
                            <tr >
                                <td>Gender</td>
                                <td>Male</td>
                            </tr>
                            <tr >
                                <td>Qualification</td>
                                <td>BE</td>
                            </tr>
                            <tr >
                                <td>Institution</td>
                                <td>BITS</td>
                            </tr>
                            <tr >
                                <td>Occupation</td>
                                <td>Sotware Engineer</td>
                            </tr>
                            <tr >
                                <td>Address</td>
                                <td>Block 14, Heritage Apartment, MG Road, Bangalore </td>
                            </tr>
                            <tr >
                                <td>District</td>
                                <td>Bangalore</td>
                            </tr>
                            <tr >
                                <td>Geo Location</td>
                                <td>MG Road</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="reasonModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reason For Decline</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
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
    <script>
        $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
    </script>
<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>