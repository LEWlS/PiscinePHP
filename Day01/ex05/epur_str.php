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
if ($argc == 2)
{
    $tab = ft_split($argv[1]);
    foreach($tab as $elem)
    {
        echo($elem." ");
    }
    echo("\n");
}
?>