<?php


$fgc = file_get_contents("A.txt");

$sayac=0;

foreach ($json as $key => &$value) {

	for ($i=0; $i <count($value->SYNONYMS) ; $i++) { 
		if (isset($value->SYNONYMS[$i]) && $sayac==) {
			//echo $value->SYNONYMS[$i]."&nbsp&nbsp&nbsp&nbsp";
			//echo get_class($value->MEANINGS);
			echo $json->next;

		}

	}
	$sayac++;
	//echo count($value->SYNONYMS);
	echo "<br/>";
}

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($fgc, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val) && $key != 'MEANINGS' && $key != 'ANTONYMS' && $key != 'SYNONYMS' && $key >100  ) {
        echo "$key:\n<br/>";
    } else {
        //echo "$key => $val\n";
    }
}
?>