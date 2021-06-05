
<?php
include '../lib/session.php';
include_once '../lib/database.php';
Session::checkSession();
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
    header("Location: login.php");
}
?>