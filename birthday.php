<?php
header("Content-Type: text/javascript; charset=utf-8");

$timestamp = time();
$current_month = date('n', $timestamp);
$current_day = date('j', $timestamp);

echo "
document.write('<div class=\"Widget\" style=\"width:610px;\">');
document.write('<div class=\"WidgetHeader\"><div class=\"WidgetTitle\">생일 (".$current_month."월 ".$current_day."일)</div></div>');
document.write('<div class=\"WidgetContent\" style=\"display:block\"><div class=\"WidgetView\">');
document.write('<ul class=\"WidgetBirthdayList\">');
";

$fp = fopen("./birthdays/".$current_month, "r");
while (!feof($fp))
{
	list($day, $name, $title) = fscanf($fp, "%s %s %s");
	if ($day == $current_day)
	{
		$name = str_replace("_", " ", $name);
		$title = str_replace("_", " ", $title);
		echo "
		document.write('<li><span class=\"WidgetBirthdayBsNumber\">[".$title."]</span> ');
		document.write('<span class=\"WidgetBirthdayName\">".$name."</span></li>');
		";
	}
}
fclose($fp);

echo "
document.write('</ul>');
document.write('</div></div></div>');
";

?>
