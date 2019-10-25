<?php
session_start();
if ($_POST["submit"] === "OK" && $_SESSION["loggued_as_admin"] && isset($_POST['user']))
{
    $fd = fopen("../private/passwd", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    foreach($file as $key => $elem)
    {
        if($elem['login'] == $_POST['user'])
        {
           unset($file[$key]);
        }
    }
    array_values($file);
    array_filter($file, 'empty');
    $final = serialize($file);
    file_put_contents("../private/passwd", $final . "\n");
    flock($fd, LOCK_UN);
    header('Location: profile.php?error=User deleted');
}
else if(isset($_POST['user']))
{
    header('Location: destroy_user.php?error=Something went wrong...');
}
?>
<html><body>
    <form method="post" action="destroy_user.php">
        Login you want to delete: <br />
        <input type="text" name="user" required><br />
        <input type="submit" name="submit" value="OK"/><br />
        
        <a href='profile.php'>Retour</a><br />
        
        <p><?php echo $_GET['error']; ?></p>
    </form>
</body></html>