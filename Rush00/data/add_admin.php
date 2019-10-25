<?php
session_start();
if ($_POST["submit"] === "OK" && $_SESSION["loggued_as_admin"])
{
    $FOUND = FALSE;
    $fd = fopen("../private/passwd", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    foreach($file as $key => $elem)
    {
        if($elem['login'] === $_POST['user'])
        {    
            $file[$key]['admin'] = TRUE;
            $FOUND = TRUE;
        }
    }
    $final = serialize($file);
    file_put_contents("../private/passwd", $final . "\n");
    flock($fd, LOCK_UN);
    if($FOUND)
        header('Location: profile.php?error=Administrator added');
    else
    {
        header('Location: add_admin.php?error=User doesn\'t exist');
    }
}
else if (isset($_POST['user']) )
{
    header('Location: add_admin.php?error=Something went wrong...');
}
?>
<html><body>
    <form method="post" action="add_admin.php">
        Utilisateur à passer administrateur: <br />
        <input type="text" name="user" required><br />
        <input type="submit" name="submit" value="OK"/><br />
        <a href='profile.php'>Retour</a><br />
        <p><?php echo $_GET['error']; ?></p>
    </form>
</body></html>