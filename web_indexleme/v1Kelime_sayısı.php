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
include('simple_html_dom.php');

if(isset($_POST['yolla']))
{
  $adi = $_POST['url'];

$html = file_get_html($adi);

$htmlPtext = $html->plaintext;


$words = str_word_count($htmlPtext,1);
foreach ($words as $key=>&$value) {
    if (strlen($value) < 3) {
        unset($words[$key]);
    }
}
$words_frequency = array_count_values($words);
$words = array_unique($words);
arsort($words_frequency);
	
echo "<b>"."&nbsp&nbsp&nbsp&nbsp Kelime &nbsp&nbsp Frekans "."</b>"."<br/>";
foreach($words as $index => $value) {
   echo "<b>"."&nbsp&nbsp&nbsp&nbsp".$words[$index]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	".$words_frequency[$value]."</b>";
   echo "<br />";
}
}
?>