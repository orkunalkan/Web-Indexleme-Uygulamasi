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
                <legend><h2><b><big>1.URL</h2></b></big></legend>
                  <b>Url Girişi:  </b>  <br />
                  <input type="text" name="url" size="75"><br />
                  <b>Url Girişi:  </b>  <br />
                  <input type="text" name="url2" size="75"><br />
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
//--------------------------------------------------
// 1. URL ANAHTAR KELİMELERİ YAZDIRMA
//--------------------------------------------------
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
 


$keywords = array();

$border = 0;
foreach ($words as $key=>&$value) {
    if (strlen($value) > 4 && $border!=5 && $words_frequency[$value] > 20) {
        array_push($keywords, $words[$key]);
        $border++;
    }
    else if (strlen($value) > 4 && $border!=5 && $words_frequency[$value] > 10) {
        array_push($keywords, $words[$key]);
        $border++;
    }
     else if (strlen($value) > 4 && $border!=5 && $words_frequency[$value] > 5) {
        array_push($keywords, $words[$key]);
        $border++;
    }
   
}

echo "<br />1.URL ANAHTAR KELİMELER<br />";

foreach($keywords as $key => $value) {
   echo "<b>"."&nbsp&nbsp&nbsp&nbsp".$keywords[$key]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$words_frequency[$value]."</b>";
   echo "<br />";
}

//--------------------------------------------------
// 2. URL ANAHTAR KELİME ALMA
//--------------------------------------------------

  $adi2 = $_POST['url2'];

$html2 = file_get_html($adi2);

$htmlPtext2 = $html2->plaintext;


$words2 = str_word_count($htmlPtext2,1);
foreach ($words2 as $key=>&$value) {
    if (strlen($value) < 3) {
        unset($words2[$key]);
    }
}


$words_frequency2 = array_count_values($words2);
$words2 = array_unique($words2);
arsort($words_frequency2);
 
$keywords2 = array();

$border2 = 0;
foreach ($words2 as $key=>&$value) {
    if (strlen($value) > 4 && $border2!=5 && $words_frequency2[$value] > 20) {
        array_push($keywords2, $words2[$key]);
        $border2++;
    }
    else if (strlen($value) > 4 && $border2!=5 && $words_frequency2[$value] > 10) {
        array_push($keywords2, $words2[$key]);
        $border2++;
    }
     else if (strlen($value) > 4 && $border2!=5 && $words_frequency2[$value] > 5) {
        array_push($keywords2, $words2[$key]);
        $border2++;
    }
   
}

echo "<br />2.URL ANAHTAR KELİMELER<br />";

foreach($keywords2 as $key => $value) {
   echo "<b>"."&nbsp&nbsp&nbsp&nbsp".$keywords2[$key]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$words_frequency2[$value]."</b>";
   echo "<br />";
}
$skor = 0;
$benzerlik_say = 0;
$anahtar_say = 0;
foreach ($keywords as $key => $value) {
$benzerlik_say += $words_frequency[$value]*substr_count($htmlPtext2,$keywords[$key]);
$anahtar_say += substr_count($htmlPtext2,$keywords[$key]);
}
$skor += $benzerlik_say/$anahtar_say;
echo "<br /> Skor : ",$skor,"<br />";

}
?>