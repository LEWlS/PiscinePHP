<?php
session_start();
include("ft_panier.php");
function is_suspended($login)
{
    $fd = fopen("../private/passwd", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    flock($fd, LOCK_UN);
    foreach($file as $key => $elem)
    {
        if($elem['login'] === $login)
        {
            return ($file[$key]['suspend']);
        }
    }
}
if ($_SESSION['loggued_on_user'] == '')
	header("Location: login.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <h1>Profile</h1>
        <h2>Welcome <?php echo $_SESSION["loggued_on_user"]; ?></h2>
    </head>
    <body>
        <div class="footer">
            <?php if(is_suspended($_SESSION['loggued_on_user'])):?>
                Account is Suspended. <br />
                <a href="suspended.php">Enable your account</a><br />
            <?php else: ?>
                <a href="modif.html">Change password</a>
                <br />
                <a href="delete.php">Delete User</a>
                <br />
                <?php if($_SESSION['loggued_as_admin']):?>
                <br /><a href='create.html'>Add a user</a><br />
                    <a href='add_admin.php'>Add an admin</a><br />
                    <a href='destroy_user.php'>Destroy a User</a><br />
                    <a href='add_product.php'>Add a product</a><br />
                    <a href='edit_product.php'>Edit a product</a><br />
                    <a href='del_product.php'>Delete a product</a><br />
                	<a href="all_comands.php">Voir toutes les commandes</a><br />
                <?php endif; ?>
                <br />
                <a href="suspend.php">Suspendre</a><br />
                <a href="my_comands.php">Mes commandes</a><br /><br />
			    <?php
                ?>
            <?php endif;?>
            <a href="logout.php">Logout</a>
            <br />
            <br />
            <br />
			<?php
			if (is_suspended($_SESSION['loggued_on_user']) == false)
			{
				$cmd = get_nbr_of_article($_SESSION['panier']);
			?>
			<a target="_parrent" href='panier.php'>Panier</a><br />
			<p><?php echo $cmd['total']['quantity']?> article</p>
			<p><?php echo $cmd['total']['price']?>$</p>
			<p><?php echo $_GET['error']; ?></p><br />
			<?php
			}
			?>
        </div>
    </body>
</html>