#!/usr/bin/php
<?PHP 

$file = file_get_contents($argv[1]);
$tab = explode("<a h", $file);
$i = 0;
foreach($tab as $line)
{
    if (strstr($line, "ref=http://"))
    {
        preg_match_all('/(".*"|>[\w ]+<)/', $line, $liens);
        foreach($liens[0] as $match)
        {
            $replace = strtoupper($match);
            $tab[$i] = str_replace($match, $replace, $tab[$i]);
        }
    }
    $i++;
}
$file = implode("<a h", $tab);
print_r($file);
?>