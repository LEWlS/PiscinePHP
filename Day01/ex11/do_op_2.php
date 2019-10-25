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
    $one_op = 0;
    $i = 0;
    $error = TRUE;
    $a = 0;
    $b = 0;
    $cap = TRUE;
    $tab = str_split($argv[1]);
    foreach($tab as $cursor)
    {
        if ($cursor == " " || $cursor == "\t") 
        {
            unset($tab[$i]);           
        }       
        $i++;
    }
    foreach($tab as $cursor)
    {
        if ($cursor == "+" || $cursor == "-" || $cursor == "*" || $cursor == "/" || $cursor == "%")
        {
            $one_op++;
            $op = $cursor;
            $cap = FALSE;
        }
        else if($cap)
        {
            if(is_numeric($cursor))
            {
                $a = $a * 10;
                $a = $a + $cursor;
            }
            else
            {
                $error = FALSE;              
            }
        }
        else if(!$cap)
        {
            if(is_numeric($cursor))
            {
                $b = $b * 10;
                $b = $b + $cursor;
            }
            else
            {
                $error = FALSE;              
            }
        }
    }
    if ($one_op == 1 && !$cap && $error)
    {
        if($op == "+")
        {
            echo($a + $b."\n");
        }
        else if($op == "-")
        {
            echo($a - $b."\n");
        }
        else if($op == "*")
        {
            echo($a * $b."\n");
        }
        else if($op == "/")
        {
            echo($a / $b."\n");
        }
        else if($op == "%")
        {
            echo($a % $b."\n");
        }
        else
        {
            echo("Abort\n");        }
    }
    else
    {
        echo("Syntax Error\n");    }
}
else
{
    echo("Incorrect Parameters\n");
}
?>