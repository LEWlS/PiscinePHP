<?php
session_start();
session_unset();
session_destroy();
?>

<html><body>
    Loggued out, <br />
    <a  target="_parent" href="../index.php">Go back to home page<a>
</body></html>