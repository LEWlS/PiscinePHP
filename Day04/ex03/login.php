<?php
include("auth.php");
session_start();

if (auth($_POST['login'], $_POST['passwd']) && $_POST['submit'] === "OK")
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    echo "OK\n";
}
else if (auth($_GET['login'], $_GET['passwd']))
{
    $_SESSION['loggued_on_user'] = $_GET['login'];
    echo "OK\n";
}
else
{
    $_SESSION['loggued_on_user'] = "";
    echo "ERROR\n";
}

?>