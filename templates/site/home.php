<?php
$google_auth_url = '';
$loginUrl = '';
if (is_null($_SESSION['fb_access_token'])) {

    $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');
    $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $_SERVER['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;
    $baseURL = $protocol . '://' . $host;

    $fb = new Facebook\Facebook([
        'app_id' => '427329234142944',
        'app_secret' => '71ecf083975587c1e511762d6f2001ea',
        'default_graph_version' => 'v2.4',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'public_profile']; // Optional permissions
    $loginUrl = $helper->getLoginUrl($baseURL.$app_context.'/fb-callback.php', $permissions);

    $client = new Google_Client();
    $client->setAuthConfigFile('private/client_secrets.json');
    $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/Blinx/oauth2callback.php');
    $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
    $google_auth_url = $client->createAuthUrl();
} else {
    $url = 'location: success.php';
    header($url);
}

$this->layout('bootstrap-template', ['title' => 'Blinx - Home'])
?>


<?php ?>

<div class="content">
    <div class="container">

        <!-- </div>-->
        <div class="row">
            <div class="col-sm-5">

                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>

                            <p>Enter username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" method="post" class="login-form" action="form-1/php/signin.php">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="form-username" placeholder="Username..."
                                       class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="form-password" placeholder="Password..."
                                       class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Login in!</button>
                            <div class="social-login-buttons">
                                <a class="btn btn-link-1 btn-link-1-facebook" href=<?= $loginUrl ?>
                                <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                                <a class="btn btn-link-1 btn-link-1-google-plus" href=<?= $google_auth_url ?>
                                <i class="fa fa-google-plus"></i> Google+
                                </a>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Sign up now</h3>

                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <table style="width:100%">
                            <tr>
                                <td width="30%">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Volunteer</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">User</label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <form role="form" method="post" class="registration-form"
                              action="php/basicsignup.php">
                            <div class="form-group">
                                <label class="sr-only" for="form-first-name">First name</label>
                                <input type="text" name="form-first-name" placeholder="First name..."
                                       class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Last name</label>
                                <input type="text" name="form-last-name" placeholder="Last name..."
                                       class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="text" name="form-email" placeholder="Email..."
                                       class="form-email form-control" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="text" name="form-password" placeholder="Password..."
                                       class="form-password form-control" id="form-new-password">
                            </div>
                            <button type="submit" class="btn_signin" name="btn_signin">Sign me up!</button>
                        </form>


                        <div class="social-login">
                            <h3>...or Sign Up with:</h3>

                            <div class="social-login-buttons">
                                <a class="btn btn-link-1 btn-link-1-facebook" href=<?= $loginUrl ?>
                                <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                                <a class="btn btn-link-1 btn-link-1-google-plus" href=<?= $google_auth_url ?>
                                <i class="fa fa-google-plus"></i> Google Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
