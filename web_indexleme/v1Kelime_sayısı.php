<!DOCTYPE html>
<html>
<head>
	<title>
Kelime Sayısı
	</title>
<charset mark="utf-8">
<link href="kutu.css" rel="stylesheet">  
</head>

<nav class="nav">
            <ul>
                <li><a href="http://localhost/web_indexleme/v1Kelime_Sayısı.php">Kelime Sayısı</a></li>
    			<li><a href="http://localhost/web_indexleme/v2Anahtar_Kelime.php">Anahtar Kelime</a></li>
    			<li><a href="http://localhost/web_indexleme/v3Benzerlik_Skorlama.php">Benzerlik Skorlama</a></li>
    			<li><a href="http://localhost/web_indexleme/v4İndexleme_Sıralama.php">İndexleme Ve Sıralama</a></li>
    			<li><a href="http://localhost/web_indexleme/v5Semantik_Analiz.php">Semantik Analiz</a></li> 
    			<li><a href="http://localhost/web_indexleme/v6Rapor_Sayfası.php">Rapor Sayfası</a></li> 
            </ul>
</nav>

<pre id="baslik">
	<a>
    	<h1>WEB İNDEKSLEME UYGULAMASI</h1>
    </a>
</pre>


<body>
	<div class="sayfa">  
		<form action="" method="post" class="form_set">
			<fieldset class="field_set">
				<legend><h2><b><big>URL</h2></b></big></legend>
				  <b>Url Girişi:  </b>  <br />
				  <input type="text" name="url" size="75"><br />
				  <input type="submit" name="yolla" size="20"><br />
				<footer>
				<address>
						<small><i>2021 @ created by Orkun Alkan - Yazılım Lab.II, 2020-2021 Bahar Proje I</small></i>
				<address>
				</footer>
			</fieldset>
		</form>
	</div>
</body>

</html>

<?php

$already_crawled = array();
$crawling = array();

function get_details($url) {

	// The array that we pass to stream_context_create() to modify our User Agent.
	$options = array('http'=>array('method'=>"GET", 'headers'=>"User-Agent: howBot/0.1\n"));
	// Create the stream context.
	$context = stream_context_create($options);
	// Create a new instance of PHP's DOMDocument class.
	$doc = new DOMDocument();
	// Use file_get_contents() to download the page, pass the output of file_get_contents()
	// to PHP's DOMDocument class.
	@$doc->loadHTML(@file_get_contents($url, false, $context));

	// Create an array of all of the title tags.
	$title = $doc->getElementsByTagName("title");
	// There should only be one <title> on each page, so our array should have only 1 element.
	$title = $title->item(0)->nodeValue;
	// Give $description and $keywords no value initially. We do this to prevent errors.
	$description = "";
	$keywords = "";
	// Create an array of all of the pages <meta> tags. There will probably be lots of these.
	$metas = $doc->getElementsByTagName("meta");
	// Loop through all of the <meta> tags we find.
	for ($i = 0; $i < $metas->length; $i++) {
		$meta = $metas->item($i);
		// Get the description and the keywords.
		if (strtolower($meta->getAttribute("name")) == "description")
			$description = $meta->getAttribute("content");
		if (strtolower($meta->getAttribute("name")) == "keywords")
			$keywords = $meta->getAttribute("content");

	}
	$txt = ' "Title": '.str_replace("\n","", $title).' <br /> "Description": '.str_replace("\n", "", $description).' <br /> "Keyword": '.str_replace("\n", "", $keywords).' <br /> ' ;
	// Gönder butonuna basınca ekrana çıktıyı veren yer
	return $txt;

}

function follow_links($url) {
	// Give our function access to our crawl arrays.
	global $already_crawled;
	global $crawling;
	// The array that we pass to stream_context_create() to modify our User Agent.
	$options = array('http'=>array('method'=>"GET", 'headers'=>"User-Agent: howBot/0.1\n"));
	// Create the stream context.
	$context = stream_context_create($options);
	// Create a new instance of PHP's DOMDocument class.
	$doc = new DOMDocument();
	// Use file_get_contents() to download the page, pass the output of file_get_contents()
	// to PHP's DOMDocument class.
	@$doc->loadHTML(@file_get_contents($url, false, $context));
	// Create an array of all of the links we find on the page.
	$linklist = $doc->getElementsByTagName("a");
	// Loop through all of the links we find.
	foreach ($linklist as $link) {
		$l =  $link->getAttribute("href");
		// Process all of the links we find. This is covered in part 2 and part 3 of the video series.
		if (substr($l, 0, 1) == "/" && substr($l, 0, 2) != "//") {
			$l = parse_url($url)["scheme"]."://".parse_url($url)["host"].$l;
		} else if (substr($l, 0, 2) == "//") {
			$l = parse_url($url)["scheme"].":".$l;
		} else if (substr($l, 0, 2) == "./") {
			$l = parse_url($url)["scheme"]."://".parse_url($url)["host"].dirname(parse_url($url)["path"]).substr($l, 1);
		} else if (substr($l, 0, 1) == "#") {
			$l = parse_url($url)["scheme"]."://".parse_url($url)["host"].parse_url($url)["path"].$l;
		} else if (substr($l, 0, 3) == "../") {
			$l = parse_url($url)["scheme"]."://".parse_url($url)["host"]."/".$l;
		} else if (substr($l, 0, 11) == "javascript:") {
			continue;
		} else if (substr($l, 0, 5) != "https" && substr($l, 0, 4) != "http") {
			$l = parse_url($url)["scheme"]."://".parse_url($url)["host"]."/".$l;
		}
		// If the link isn't already in our crawl array add it, otherwise ignore it.
		if (!in_array($l, $already_crawled)) {
				$already_crawled[] = $l;
				$crawling[] = $l;
				// Output the page title, descriptions, keywords and URL. This output is
				// piped off to an external file using the command line.
				

				echo get_details($l)."<br />"; 
				/* Burada farklı html kodlarının arasında bulunan metinleri yazdırıyoruz bknz. get_details fonksiyonu
				echo ile get_details fonksiyonundan dönen $txt yazdırılıyor.
				*/
		}

	}
	// Remove an item from the array after we have crawled it.
	// This prevents infinitely crawling the same page.
	array_shift($crawling);
	// Follow each link in the crawling array.
	foreach ($crawling as $site) {
		follow_links($site);
	}

}
// Begin the crawling process by crawling the starting link first.

if(isset($_POST['yolla']))
{
  $adi = $_POST['url']; //echo $adi; GİRİLEN URL'yi Fonksiyona veriyoruz.
  follow_links($adi);
}
?>
