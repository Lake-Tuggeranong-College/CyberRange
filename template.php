<?php require_once 'config.php'; ?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/Logo2.jpg" alt="" width="100" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <?php
                $accessLevel = 2;
                if (isset($_SESSION["username"])) {
                    echo '<li class="nav-item"><a class="nav-link" href="moduleList.php">Module Display</a> </li>';

                    if ($_SESSION["access_level"] == $accessLevel) {

                        echo '<li class="nav-item"><a class="nav-link" href="registerESP32.php">ESP32 Registration</a> </li>';

                        echo '<li class="nav-item"><a class="nav-link" href="userSearch.php">User Search</a> </li>';
                    }
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a> </li>';
                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a> </li>';


                }
                ?>
            </ul>
        </div>
        <?php
        if (isset($_SESSION["username"])) {
            echo "<div class='alert alert-success d-flex'><span>Welcome, " . $_SESSION["username"] . "<br><a href='logout.php'>Logout</a></span></div>";
        }
        ?>
    </div>
</nav>

<script src="js/bootstrap.bundle.js"></script>
<?php
function sanitise_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function outputFooter()
{
    date_default_timezone_set('Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "<footer>This page was last modified: " . date("F d Y H:i:s.", filemtime($filename)) . "</footer>";
    return $footer;
}

?>

<!-- <p style=" position: absolute; bottom: 0; left: 0; width: 100%; text-align: center;">This will stick at the bottom no matter what :).</p>