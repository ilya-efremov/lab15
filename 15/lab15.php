<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php 
preg_match_all("/\b(\d+\.*)+\b|([0-9a-z]+:)+[0-9a-z]+/i", $file_text, $matches);
$file_text = file_get_contents("ip.txt");
$file = fopen("ip.txt", "w");
foreach ($matches[0] as $elem){
	if (preg_match_all("/^(25[0-5]\.|2[0-4]\d\.|1\d\d\.|[1-9]\d\.|\d\.){3}(25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)$/", $elem)){
		fwrite($file, "{$elem} - Верный ip4");
	}
	else if (preg_match_all("/^([0-9a-f]{4}:){7}[0-9a-f]{4}$/i", $elem)){
		fwrite($file, "{$elem} - Верный ip6");
	}
	else{
		fwrite($file, "{$elem} - Некорректный ip-адрес.");
	}
}
fclose($file);
?>
</body>
</html>