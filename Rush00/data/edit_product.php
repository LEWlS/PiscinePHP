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
            print_r($file[$key]);
            if($_POST['name'])
                $file[$key]['name'] = $_POST['name'];
            if($_POST['price'])
                $file[$key]['price'] = $_POST['price'];
            if($_POST['categorie'])
                $file[$key]['categorie'] = explode("/", $_POST['categorie']);
            if($_POST['img'])
                $file[$key]['img'] = $_POST['img'];
            if($_POST['info'])
                $file[$key]['info'] = $_POST['info'];
        }
    }
    $final = serialize($file);
    file_put_contents("../private/article", $final . "\n");
    flock($fd, LOCK_UN);
    header('Location: edit_product.php?error=Product edited, feel free to refresh');
}
else if(isset($_POST['name']) || isset($_POST['price']) || isset($_POST['categorie']) || isset($_POST['img']) || isset($_POST['info']))
{
    header('Location: edit_product.php?error=Something went wrong...');
}
?>
<html><body>
    <form method="post" action="edit_product.php">
        Id: <br />
        <input type="text" name="id" required><br />
        Name: <br />
        <input type="text" name="name" ><br />
        Price: <br />
        <input type="text" name="price" ><br />
        Categorie: <br />
        <input type="text" name="categorie" ><br />
        Image: <br />
        <input type="text" name="img" ><br />
        Informations: <br />
        <input type="text" name="info" ><br />

        <input type="submit" name="submit" value="OK"/><br />
        
        <a href='profile.php'>Retour</a><br />
        
        <p><?php echo $_GET['error']; ?></p>
    </form>
</body></html>