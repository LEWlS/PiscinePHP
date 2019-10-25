#!/usr/bin/php
<?PHP
 if ($argc >= 2)
    {
        $regex = preg_replace('/\s+/', ' ', trim($argv[1]));
        echo "$regex\n";
    }
?>