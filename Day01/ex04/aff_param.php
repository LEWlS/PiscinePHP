#!/usr/bin/php
<?PHP
$go = false;
foreach($argv as $elem)
{
    if ($go)
    {
        echo($elem."\n");
    }
    $go = true;
}
?>