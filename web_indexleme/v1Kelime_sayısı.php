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
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


if(isset($_POST['yolla']))
{
  $adi = $_POST['url']; //echo $adi; GİRİLEN URL'yi Fonksiyona veriyoruz.
  $oku = file_get_contents($adi); 
  $dizi = multiexplode(array(" ",".",'\n','\r',":",";","[","]","-","_","|",'}','"','{'),$oku);
  $foo = False;
  $dizi2 = implode(" ", $dizi);
  print_r($dizi);
  echo " <br />"; 
  for ($i = 0; $i < count($dizi); $i++) {
        $temp = $dizi[$i];
        $count = substr_count(implode(" ", $dizi), " ".$temp." ");

        print_r($dizi[$i]. " : ".$count."<br />  ");
    }
  //echo $oku;
}
?>