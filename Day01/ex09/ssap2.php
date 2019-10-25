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

if ($argc > 1)
{
    $string = array();
    $num = array();
    $rest = array();
    $i = 1;
    while($i < $argc)
    {
        $tab = ft_split($argv[$i]);
        foreach ($tab as $elem)
        {
            if (ctype_alpha($elem))
            {
                array_push($string, $elem);
            }
            else if (is_numeric($elem))
            {
                array_push($num, $elem);
            }
            else
            {
                array_push($rest, $elem);
            }
        }
        $i++;
    }
    sort($string, SORT_NATURAL | SORT_FLAG_CASE);
    sort($num, SORT_STRING);
    sort($rest, SORT_NATURAL);
    
    foreach($string as $elem)
    {
       echo($elem."\n");
    }
    foreach($num as $elem)
    {
       echo($elem."\n");
    }
    foreach($rest as $elem)
    {
        echo($elem."\n");
    }
}
?>