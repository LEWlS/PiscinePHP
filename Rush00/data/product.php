<?php
session_start();
$fp = fopen("../private/article", "r+");
flock($fp, LOCK_EX | LOCK_SH);
$article = file_get_contents("../private/article");
flock($fp, LOCK_UN);
fclose($fp);
$article = unserialize($article);
$i = $_GET['id'];
if (empty($article[$i]))
	header("Location: ../index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $article[$i]['name']?></title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
        <div class="bandeau">
           <a href="../index.php" class="logo"><h1>FT MINISHOP</h1></a>
        </div>
		<div id=product>

		<?php
			if (strncmp($article[$i]['img'], "link:", 5) == 0)
				$path = substr($article[$i]['img'], 5);
			else
				$path = "../image/" . $article[$i]['img'];
		?>
			<img width=50% id="prod_img" src="<?php echo $path?>" alt="<?php echo $article[$i]['name']?>">
			<p id="name" ><?php echo $article[$i]['name']?></p>
			<p id="price" ><?php echo $article[$i]['price']?></p>
			<p id="info" ><?php echo $article[$i]['info']?></p>
            <?php
                foreach($article[$i]['categorie'] as $elem)
                    echo(" / ".$elem);
                echo(" / ");
            ?>
			<form action="../index.php" method="Post">
				<select name="quantity">
					<?php
						for ($ind = 1; $ind < 10; $ind++)
							echo '<option value="' . $ind .'">' . $ind .'</option>';
					?>
				</select>
				<input type='hidden' name='id' value='<?php echo "$i";?>'/> 
				<input type="submit">
			</form>
		</div>
			<iframe class="profile" name="logguer" src="login.php" width="15%" height="100%" ></iframe>
	</body>
</html>