<?php
session_start();
function count_article($cmd)
{
	$count = 0;
	foreach ($cmd as $ar)
		$count += $ar['quantity'];
	return ($count);
}

function count_price($cmd)
{
	$count = 0;
	foreach ($cmd as $ar)
		$count += $ar['price'];
	return ($count);
}

function get_nbr_of_article($panier)
{
	$fp = fopen("../private/article", "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$arr_art = file_get_contents("../private/article");
	flock($fp, LOCK_UN);
	fclose($fp);
	$arr_art = unserialize($arr_art);
	foreach ($panier as $article)
	{
		$cmd[$article['id']]['price'] = 0;
		$cmd[$article['id']]['quantity'] = 0;
	}
	foreach ($panier as $article)
	{
		$cmd[$article['id']]['price'] += ($arr_art[$article['id']]['price'] * $article['quantity']);
		$cmd[$article['id']]['quantity'] += $article['quantity'];
	}
	$cmd['total']['quantity'] = count_article($cmd);
	$cmd['total']['price'] = count_price($cmd);
	$cmd['total']['login'] = $_SESSION['loggued_on_user'];
	return ($cmd);
}

function get_product($id)
{
	$fp = fopen("../private/article", "r+");
	flock($fp, LOCK_EX | LOCK_SH);
	$arr_art = file_get_contents("../private/article");
	flock($fp, LOCK_UN);
	fclose($fp);
	$arr_art = unserialize($arr_art);
	if ($id !== "total")
		return $arr_art[$id]['name'];
	else
		return $id;
}
?>