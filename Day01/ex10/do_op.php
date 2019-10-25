#!/usr/bin/php
<?PHP

function ft_split($str)
{
    $i = 0;
    $tab = explode(" ", $str);
    foreach($tab as $elem)
    {
        if ($elem == NULL)
            unset($tab[$i]);
        $i++;
    }
    return (array_values($tab));
}

if ($argc == 4)
{
    $tab = ft_split($argv[1]);
    $a = $tab[0];
    $tab = ft_split($argv[2]);
    $op = $tab[0];
    $tab = ft_split($argv[3]);
    $b = $tab[0];

    if($op == "+")
    {
        echo($a + $b."\n");
    }
    if($op == "-")
    {
        echo($a - $b."\n");
    }
    if($op == "*")
    {
        echo($a * $b."\n");
    }
    if($op == "/")
    {
        echo($a / $b."\n");
    }
    if($op == "%")
    {
        echo($a % $b."\n");
    }
}
else
{
    echo("Incorrect Parameters\n");
}

?>
