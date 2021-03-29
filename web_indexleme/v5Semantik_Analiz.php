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
                <li><a href="http://localhost/web_indexleme/v23Anahtar_Kelime.php">Anahtar Kelime</a></li>
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
                <footer>
                <address>
                        <small><i>2021 @ created by Orkun Alkan - Yazılım Lab.II, 2020-2021 Bahar Proje I</small></i>
                <address>
                </footer>
            </fieldset>
       
        <br/>
        <footer class="field_set">
            <b>Web Kümesi Giriniz : (Her bir Url'den sonra enter'a basınız!)</b>
        </footer>
        <fieldset class="field_set">
    <textarea id="contact_list" name="contact_list" rows="20" cols="79"></textarea>
    <input type="submit" name="yolla" value="Gönder" id="yolla" size="25"/>
    </fieldset>
     </form>
</div>
</body>

<?php
//--------------------------------------------------
// 1. URL ANAHTAR KELİMELERİ YAZDIRMA
//--------------------------------------------------
//include('simple_html_dom.php');
include_once('simple_html_dom.php');

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

echo "<br /><b><h4>---URL ANAHTAR KELİMELER---</h4></b>";
echo "<b>&nbsp&nbsp URL : </b>".$adi."<br/><br/>";
foreach($keywords as $key => $value) {
   echo "<b>"."&nbsp&nbsp&nbsp&nbsp".$keywords[$key]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$words_frequency[$value]."</b>";
   echo "<br />";
}

$fgc = file_get_contents("A.txt");

$syn_index = array();
$relevant_key_index = array();
$json = json_decode($fgc);
$inx=0;
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($fgc, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val) && $key != 'MEANINGS' && $key != 'ANTONYMS' && $key != 'SYNONYMS' && $key >9999999999  ) {
        //echo "$key\n<br/>";
        array_push($syn_index, $key);
    } 
}
implode(" ", $syn_index);


for ($i=0; $i < count($syn_index); $i++) { 
        foreach ($keywords as $key => $value) {
          if (strcmp($syn_index[$i], strtoupper($keywords[$key]))==0) {
                    //echo $syn_index[$i]."<br/>";
                    array_push($relevant_key_index, ($i+1));
                    //print_r($relevant_key_index);
                }
        }    
}
echo "<b><h4><br/>---ALAKALI ANAHTAR KELİMELER---<br/></h4></b>";
foreach ($json as $key => &$value) {

     if (in_array($inx,$relevant_key_index)){
    echo "<b>".$syn_index[$inx-1]."<br />"."</b>";
    }
    
    
    for ($i=0; $i <count($value->SYNONYMS) ; $i++) { 
        if (isset($value->SYNONYMS[$i]) && in_array($inx,$relevant_key_index)) {
            echo "<b>"."&nbsp&nbsp&nbsp&nbsp".$value->SYNONYMS[$i];
            

        }

    }
    if (in_array($inx-1,$relevant_key_index)){
    echo "<br />";
    }
    $inx++;


}

function getValidUrlsFrompage($source)
  {
    $links = [];
    $sayac = 0;
    $content = file_get_html($source);
    $content = strip_tags($content, "<a>");
    $subString = preg_split("/<\/a>/", $content);
    foreach ($subString as $val) {
      if (strpos($val, "<a href=") !== FALSE) {
        $val = preg_replace("/.*<a\s+href=\"/sm", "", $val);
        $val = preg_replace("/\".*/", "", $val);
        $val = trim($val);
      }
      if (strlen($val) > 0 && filter_var($val, FILTER_VALIDATE_URL) && $sayac <5 ) {
        if (!in_array($val, $links)) {
          $links[] = $val;
          $sayac++;
        }
      }
    }
    return $links;
  }

$urls = array();
$urls = htmlspecialchars($_POST['contact_list']);
$urls = explode("\n", $urls);
$i=1;
$skor = 0;
$benzerlik_say = 0;
$anahtar_say = 0;
$link_border = 0;
$link_border2 = 0;
///////////////////////////////////////////////////
    foreach ($urls as $key => $value) {
        
        $htmls = file_get_html($urls[$key]);
        $url1= $urls[$key];
        $htmlsPtext2 = $htmls->plaintext;
        

         
       echo "<b><br/>---2.DERİNLİK SEVİYESİ---<br/></b>"; 
//////////////////////////////////////////////////////////////
        $links2 = getValidUrlsFrompage($urls[$key]);               
        foreach ($links2 as $key => $value) {
            echo "<b>2.",($link_border+1),"</b>URL",$links2[$key],"<br/>";                    
            $htmls2 = file_get_html($links2[$key]);
            $htmls2Ptext2 = $htmls2->plaintext;
            $link_border++;
               foreach ($keywords as $key => $value) {
            $benzerlik_say += $words_frequency[$value]*substr_count($htmls2Ptext2,$keywords[$key]);
            $anahtar_say += substr_count($htmls2Ptext2,$keywords[$key]);
            echo "<br/><b>ANAHTAR:&nbsp",$keywords[$key],"&nbsp frekansı :",substr_count($htmls2Ptext2,$keywords[$key])," </b><br/>";
            }
          
            $links3 = getValidUrlsFrompage($links2[$key]); 
            echo "<b><br/>---3.DERİNLİK SEVİYESİ---<br/></b>";          
            foreach ($links3 as $key => $value) { 
                echo "3.",($link_border2+1),"URL",$links3[$key],"<br/>";                    
                $htmls3 = file_get_html($links3[$key]);
                $htmls3Ptext3 = $htmls3->plaintext;
                $link_border2++;
                foreach ($keywords as $key => $value) {
                $benzerlik_say += $words_frequency[$value]*substr_count($htmls3Ptext3,$keywords[$key]);
                $anahtar_say += substr_count($htmls3Ptext3,$keywords[$key]);
                echo "<br/><b>ANAHTAR:&nbsp",$keywords[$key],"&nbsp frekansı :",substr_count($htmls3Ptext3,$keywords[$key])," </b><br/>";
                }
                
            }
            
        }
                                                            
        //////////////////////////////////////////////////////////////
         echo "<h4><b>---".$i.".URL :</b>".$url1."<br/></h4>"; 
        echo "<b><br/>---1.DERİNLİK SEVİYESİ---<br/></b>"; 
         foreach ($keywords as $key => $value) {
        $benzerlik_say += $words_frequency[$value]*substr_count($htmlsPtext2,$keywords[$key]);
        $anahtar_say += substr_count($htmlsPtext2,$keywords[$key]);
        echo "<br/><b>ANAHTAR:&nbsp",$keywords[$key],"&nbsp frekansı :",substr_count($htmlsPtext2,$keywords[$key])," </b><br/>";
        }



        if($anahtar_say>=0){
        $skor += $benzerlik_say/$anahtar_say;
        echo "<b><br /> &nbsp&nbsp Skor : ",$skor,"<br /></b>";
        }
        else{
            echo "<b><br /> &nbsp&nbsp  Benzerlik Skoru : 0 <br /></b>"; 
        }
        $i++;



    }

}
?>