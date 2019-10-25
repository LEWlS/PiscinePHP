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
    array_values($tab);
    sort($tab);
    return ($tab);
}
print_r(ft_split($argv[1]));
?>