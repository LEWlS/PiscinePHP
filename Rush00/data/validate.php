<?php
include("ft_panier.php");
session_start();
if ($_SESSION["loggued_on_user"] == "")
	header("Location: panier.php?error=loguer vous avant de valider votre commande");
if ($_SESSION["loggued_on_user"] && $_SESSION['panier'])
{
    $fd = fopen("../private/commandes", "c+");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/commandes");
    $file = unserialize($file);
    array_push($file, get_nbr_of_article($_SESSION['panier']));
    $final = serialize($file);
    file_put_contents("../private/commandes", $final . "\n");
    flock($fd, LOCK_UN);
    unset($_SESSION['panier']);
}
else if(isset($_SESSION['panier']) == false)
{
    header("Location: panier.php?error=Panier vide");
}
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="../style.css">
		<style>
			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
				width: 10%;
			}

			table {
				font-family: arial, sans-serif;
				width: 10%;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
		</style>
		<title>Panier</title>
	</head>
    <body>
        <div class="bandeau">
           <a href="../index.php" class="logo"><h1>FT MINISHOP</h1></a>
		</div>
        Order registered<br /><br />
        <a  target="_parent" href="../index.php">Go back to home page<a>
        <iframe class="profile" name="logguer" src="login.php" width="15%" height="100%" ></iframe>
    </body>
</html>