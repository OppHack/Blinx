<?php
session_start();
include_once 'dbconnect.php';

if (isset($_POST['form-username'])) {

    $userName = mysql_real_escape_string($_POST["form-username"]);
    $upass = mysql_real_escape_string($_POST["form-password"]);

    if ($userName == 'moderator' && $upass == 'moderator') {
        header("Location: ../moderator-approve.php");
    } else {

        // var_dump($_POST);
        $query = "SELECT * FROM m_user WHERE email_id='" . $userName . "'";


        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
        if (strcmp($row['pwd'], $upass) == 0) {
            $_SESSION['user'] = $userName;
            if ($row['verified'] == 1) {
                header("Location: /profile.php");
            } else {
                header("Location: /unverified.html");
            }
        } else {
            ?>
            <script>alert('wrong details');</script>
            <?php
        }
    }
}
?>