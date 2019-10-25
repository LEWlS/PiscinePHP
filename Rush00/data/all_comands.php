<?php
include("ft_panier.php");
$fp = fopen("../private/commandes", "c+");
flock($fp, LOCK_EX | LOCK_SH);
$file = file_get_contents("../private/commandes");
flock($fp, LOCK_UN);
fclose($fp);
$file = unserialize($file);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Comandes</title>
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
	</head>
	<body>
		<div class="commend">
			<?php
				foreach($file as $i => $cmd)
				{
					if ($i != 0)
					{ 
						echo $cmd['total']['login'];
						?>
						<table style="width:100%">
							<tr>
								<th>Product</th>
								<th>Quantity</th> 
								<th>Price</th>
							</tr>
						<?php
						foreach($cmd as $key => $prod )
						{
							echo  "<tr>";
								echo "<td>" . get_product($key) . "</td>";
								echo "<td>" . $prod['quantity'] . "</td>";
								echo "<td>" . $prod['price'] . "</td>";
							echo  "<tr>";
						}
					}
					?>
				</table>
				<br />
				<br />
				<br />
				<?php
				}
			?>
        	<a href='profile.php'>Profile</a><br />
		</div>
		

	</body>
</html>