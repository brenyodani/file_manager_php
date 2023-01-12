<?php 

$error="";
$msg = "";
$dir = "./dokumentumok";

?>




<!doctype html>
<html>
<head>
<title>PDF olvasas</title>
<meta charset="utf-8">
<style>
figure { float: left; }
</style>
</head>
<body>
<?php 

?>

<h1>PDF dokumentumok</h1>
<div>
<?php
try {
if (file_exists($dir)){
	$fajlok = scandir($dir);
	if (count($fajlok)>0){
		foreach ($fajlok as $fajl){
			$pdf = $dir."/".$fajl;
			if (is_file($pdf)){
				echo "<a href=\"".$pdf."\" target='_blank'>". $pdf .  "</a><br>";
			}
		}
	}else {
		echo "Nincs feltöltött pdf";
	}
} else echo "Nincs feltöltött pdf";

} catch(Exception $e) {

}
?>
</div>
</body>
</html>