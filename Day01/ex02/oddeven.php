#!/usr/bin/php
<?PHP
$continue = true;
while($continue)
{
    echo("Entrez un nombre: ");
    $handle = fopen ("php://stdin","r");
    $nb = fgets($handle);
    if ($nb == NULL || $nb > 2147483647)
    {
        echo("Undefined\n");
        break;
    }
    $tab = str_split($nb, 1);
    $is_nb = true;
    foreach ($tab as $elem)
    {
        if (($elem != "\n") && ($elem != "0") && ($elem != "1") && ($elem != "2") && ($elem != "3") && ($elem != "4") && ($elem != "5") && ($elem != "6") && ($elem != "7") && ($elem != "8") && ($elem != "9"))
        {
            $is_nb = false;
        }
    }
    if ($is_nb == false || $tab[0] == "\n")
    {
        $nb = rtrim($nb, "\n");
        print("'".$nb."'"." n'est pas un chiffre\n");
    }
    else
    {
        $nb = $nb + 1 - 1;
        if($nb % 2 == 0)
        {
            echo("Le chiffre ".$nb." est Pair\n");
        }
        else
        {
            echo("Le chiffre ".$nb." est Impair\n");
        }
    }
}
?>