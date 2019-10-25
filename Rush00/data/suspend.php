<?php
include('auth.php');
session_start();
if ($_POST["submit"] === "OK" && (auth($_SESSION['loggued_on_user'], $_POST['passwd']) == 'admin' || auth($_SESSION['loggued_on_user'], $_POST['passwd']) == 'connected'))
{
    $fd = fopen("../private/passwd", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    foreach($file as $key => $elem)
    {
        if($elem['login'] === $_SESSION['loggued_on_user'])
        {
            $file[$key]['suspend'] = TRUE;
        }
    }
    $final = serialize($file);
    file_put_contents("../private/passwd", $final . "\n");
    flock($fd, LOCK_UN);
    header('Location: suspended.php?error=User suspended');
}
else if (isset($_POST['passwd']) )
{
    header('Location: suspend.php?error=Something went wrong...');
}
?>
<html><body>
    <form method="post" action="suspend.php">
        Suspend your account:<br />
        Password: <br />
        <input type="password" name="passwd" required><br />
        <input type="submit" name="submit" value="OK"/><br />
        <a href='profile.php'>Retour</a><br />
        <p><?php echo $_GET['error']; ?></p>
    </form>
</body></html>