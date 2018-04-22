<?php
    session_start();

    if (array_key_exists('auth', $_SESSION) && $_SESSION['auth'])
        header('Location: admin.php');

    // No XSS pl0x
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_error = '';
    $password_error = '';

    if ($username === 'Webmaster' && $password === 'runninginthe90s') {
        $_SESSION['auth'] = true;
        header('Location: admin.php');
    }

    if ($username !== 'Webmaster')
        $username_error = 'Invalid username!';
    if ($password !== 'runninginthe90s')
        $password_error = 'Invalid password!';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The Boeing Fanclub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="top" class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">


<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="">Geo</a>
            <div class="nav-collapse" id="main-menu">
                <ul class="nav" id="main-menu-left">
                    <li class="dropdown" id="preview-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Download <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a>Topic</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Item</a></li>
                </ul>
                <ul class="nav pull-right" id="main-menu-right">
                    <!--<li><a>Free-->
                    <!--Static Web Hosting</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 50px;">

    <form class="form-horizontal well" method="POST">
        <fieldset>
            <legend>Webmaster Login</legend>
            <div class="control-group">
                <label class="control-label" for="username-input">Username</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="username-input" name="username">
                    <?php
                        if ($username_error) {
                            ?>
                            <p><?= $username_error ?></p>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password-input">Password</label>
                <div class="controls">
                    <input type="password" class="input-xlarge" id="password-input" name="password">
                    <?php
                        if ($password_error) {
                            ?>
                            <p><?= $password_error ?></p>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Log Me In</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>


<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/bootstrap-affix.js"></script>


</body>
</html>
