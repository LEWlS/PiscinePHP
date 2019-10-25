#!/usr/bin/php
<?PHP

function ft_is_sort($tab)
{
    $sort = $tab;
    sort($sort, SORT_STRING);
    $i = 0;
    $size = count($tab);
    $ret = true;
    while ($i < $size)
    {
        if ($sort[$i] !== $tab[$i])
        {
            $ret = false;
            return ($ret);
        }
        $i++;
    }
    return ($ret);
}

?>