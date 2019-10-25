<?php
if(key_exists("action", $_GET) && key_exists("name", $_GET) && key_exists("value", $_GET))
    if($_GET["action"] === "set")
        setcookie($_GET["name"], $_GET["value"]);
if (key_exists("action", $_GET) && key_exists("name", $_GET))
{
    if($_GET["action"] === "get")
        echo($_COOKIE[$_GET["name"]]);
    if($_GET["action"] === "del")
        setcookie($_GET["name"], '', time() - 3600);
}
?>