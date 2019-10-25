<?php
session_start();
include("ft_panier.php");
if ($_GET['vide'] === "1")
{
	$_SESSION['panier'] = [];
}
$cmd = get_nbr_of_article($_SESSION['panier']);
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
		<div class="commend">
		<?php if($cmd['total']['quantity'] != "0") {?>
		<table style="width:100%">
			<tr>
				<th>Product</th>
				<th>Quantity</th> 
				<th>Price</th>
			</tr>
			<?php
				foreach($cmd as $key => $prod)
				{
					echo  "<tr>";
						echo "<td>" . get_product($key) . "</td>";
						echo "<td>" . $prod['quantity'] . "</td>";
						echo "<td>" . $prod['price'] . "</td>";
					echo  "<tr>";
				}
			?>
		</table>
		<?php } ?>
		</div>
		<form action="panier.php" method="get">
			<input type='hidden' name='vide' value="1"/> 
			<input type="submit" value="Vider le panier">
		</form>

		<?php if($cmd['total']['quantity'] != "0") {?>
        <form action="validate.php" method="post">
			<input type="submit" value="Place order">
		</form>
		<?php } ?>
        <p><?php echo($_GET['error']); ?></p>
		<iframe class="profile" name="logguer" src="login.php" width="15%" height="100%" ></iframe>
	</body>
</html>
