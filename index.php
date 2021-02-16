<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sumatoria de valores de facturas</title>
</head>
<body>
<?php
require_once('MyFolder/class.html2text.inc');



$filename = 'MyFolder/Resultados_4s.html';

//Instance variable to extract text from a file.
$html2text =new html2text($filename, true);

echo summary_bills($html2text);


function summary_bills($text_page){

$count=0;

$text = $text_page->get_text();

//Catch all elements from a extracted text which contains float numbers
preg_match_all('!\d*\,*\d+\.\d+!', $text, $matches);

for($position=0; $position<count($matches[0]); $position++){
	//Condition which indicates if the elements contains a comma.
	if(strpos($matches[0][$position], ',') !== false){
		$resultado = str_replace(",", "", $matches[0][$position]);
		$count=$count+$resultado;
	}
	else{
		$count=$count+$matches[0][$position];
	}
}

return $count;

}


?>
</body>
</html>