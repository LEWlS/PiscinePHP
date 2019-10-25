<?php
//DECOMENTER POUR LE RENDU
/* header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');  */
session_start();
function get_all_categories($article)
{
	$result = [];
	foreach($article as $element)
	{
		foreach($element['categorie'] as $cate)
		{
			if (in_array($cate, $result) == false)
				array_push($result, $cate);
		}
	}
	return $result;
}

function print_article($article, $i)
{
    echo '<div style="float: left;text-align:center;border-width:1px;
    border-style:solid;
	border-color:black;" class="product">';
	if (strncmp($article[$i]['img'], "link:", 5) == 0)
		$path = substr($article[$i]['img'], 5);
	else
		$path = "../image/" . $article[$i]['img'];
		echo '<a target="_parent" href="product.php?id=' . $i . ' "><img height="250px"
			width="300px" src="' . $path . '" alt="' . $article[$i]['name'] . '"></a>';
    echo("<br />");
	echo '<a target="_parent" href="product.php?id=' . $i . ' ">' . $article[$i]['name'] . '</a>';
	echo '</div>';
}

if (file_exists("../private/article") == false)
{
	echo "ERROR\n";
	exit ;
}
$fp = fopen("../private/article", "r+");
flock($fp, LOCK_EX | LOCK_SH);
$article = file_get_contents("../private/article");
flock($fp, LOCK_UN);
fclose($fp);
$article = unserialize($article);
$categories = get_all_categories($article);
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form action="article.php" method="POST">
			<select name="categories">
				<option value="">All</option>
				<?php
					foreach($categories as $cat)
						echo '<option value="' . $cat .'">' . $cat .'</option>';
				?>
			</select>
			<input type="submit" value="OK">
		</form>
        <?php
        echo("<br />");
		if (isset($_POST['categories']) == false || $_POST['categories'] === "")
		{
            foreach($article as $key => $elem)
            {    
				print_article($article, $key);
            }
        }
		else
		{
			for ($i = 0; $i < count($article); $i++)
			{
				if (in_array($_POST['categories'], $article[$i]['categorie']) == true)
					print_article($article, $i);
			}
		}
		?>
	</body>
</html>