#!/usr/bin/php
<?PHP

function check_format($str)
{
	if (preg_match("/(^[Ll]undi|^[Mm]ardi|^[Mm]ercredi|^[Jj]eudi|^[Vv]endredi|^[Ss]amedi|^[Dd]imanche) {1}[0-3][0-9] {1}([Jj]anvier|[Ff][ée]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) {1}([0-9]{4}) {1}[0-2][0-9]:[0-9][0-9]:[0-9][0-9]$/", $str))
        return(FALSE);
    else
    {
        return(TRUE);
    }
}

function monther($str)
{
    if ($str === "janvier")
        return("01");
    if ($str === "fevrier" || $str === "février")
		return("02");
	if ($str === "mars")
        return("03");
	if ($str === "avril")
        return("04");
	if ($str === "mai")
		return("05");
	if ($str === "juin")
		return("06");
	if ($str === "juillet")
		return("07");
	if ($str === "aout" || $str === "août")
		return("08");
	if ($str === "septembre")
		return("09");
	if ($str === "octobre")
		return("10");
	if ($str === "novembre")
		return("11");
	if ($str === "decembre" || $str == "décembre")
		return("12");	
	return("error");
}

if ($argc == 2)
{
	if (check_format($argv[1]))
	{
		echo("Wrong Format\n");
	}
	else
	{
        date_default_timezone_set("Europe/Paris");
        preg_match("/[0-9]{2}/",$argv[1] ,$day);
        preg_match("/([Jj]anvier|[Ff][ée]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre)/",$argv[1] ,$month);
		$month[0] = strtolower($month[0]);
		preg_match("/([0-9]{4})/",$argv[1] ,$year);
        preg_match("/[0-2][0-9]:/",$argv[1] ,$hour);
        $hour[0] = str_replace(":", "", $hour[0]);
        preg_match("/:[0-9][0-9]:/",$argv[1] ,$minute);
        $minute[0] = str_replace(":", "", $minute[0]);
        preg_match("/:[0-9][0-9]$/",$argv[1] ,$second);
		$second[0] = str_replace(":", "", $second[0]);
		$format = $year[0].":".monther($month[0]).":".$day[0]." ".$hour[0].":".$minute[0].":".$second[0];
		$timestamp = strtotime($format);
        print($timestamp);
        echo("\n");
	}
}
?>