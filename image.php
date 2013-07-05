<?php

$files = array();
$num_files = 0;

$dir = "./images/";
$dh = opendir($dir);
while ($file = readdir($dh))
{
	if (stripos($file, "jpg"))
	{
		$files[] = $file;
		$num_files++;
	}
}
closedir($dh);

mt_srand((double)microtime() * 1000000);
$rand = mt_rand(0, $num_files - 1);
$file = $dir.$files[$rand];

header("Content-Type: image/jpeg");
$fp = fopen($file, "rb");
print fread($fp, filesize($file));
fclose($fp);

?>
