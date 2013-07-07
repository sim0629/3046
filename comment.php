<?php
header("Content-Type: text/javascript; charset=utf-8");

$comments = array();
$num_comments = 0;

$fp = fopen("./comments/data", "r");
while (($buffer = fgets($fp, 4096)) !== false)
{
	$buffer = trim($buffer);
	if ($buffer !== "")
	{
		$comments[] = $buffer;
		$num_comments++;
	}
}
fclose($fp);

mt_srand((double)microtime() * 1000000);
$rand = mt_rand(0, $num_comments - 1);

echo "
	$(document).ready(function(){
		$('form#CommentWriteForm input[name=content]').val('".$comments[$rand]."');
	});
";

?>
