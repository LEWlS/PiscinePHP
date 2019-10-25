<?php
session_start();
if ($_POST["submit"] === "OK" && $_SESSION["loggued_as_admin"] && isset($_POST['id']))
{
    $fd = fopen("../private/article", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/article");
    $file = unserialize($file);
    foreach($file as $key => $elem)
    {
        if($key == $_POST['id'])
        {
           unset($file[$key]);
        }
    }
    array_values($file);
    array_filter($file, 'empty');
    $final = serialize($file);
    file_put_contents("../private/article", $final . "\n");
    flock($fd, LOCK_UN);
    header('Location: del_product.php?error=Product deleted, feel free to refresh');
}
else if(isset($_POST['info']))
{
    header('Location: edit_product.php?error=Something went wrong...');
}
?>
<html>
    <head>
    </head>
<body>
    <form method="post" action="del_product.php">
        Id of the product you want to delete: <br />
        <input type="text" name="id" required><br />
        <input type="submit" name="submit" value="OK"/><br />
        
        <a href='profile.php'>Retour</a><br />
        
        <p><?php echo $_GET['error']; ?></p>
    </form>
</body></html>