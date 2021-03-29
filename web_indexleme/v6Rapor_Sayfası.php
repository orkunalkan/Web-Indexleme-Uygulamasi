<!DOCTYPE html>
<html>
<head>
    <title>
Kelime Sayısı
    </title>
<charset mark="utf-8">
<link href="kutu.css" rel="stylesheet">  
</head>
<style>
  
</style>
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
  <div class="container">
    <div class="box-1">
    <h4 class="baslik">  Oğuz Can Varol 180201057  </h4>
    <h2> 1-)Projenin Tanımı</h2>
      <p>Bu kısım sadece projenin açıklaması okuyup edindiğimiz ön bilgiye göre yazılmıştır.Bu projede bizden istenen bir nakliye
         firmasının nakliyelerini ulaştırılması gereken şehirlere en az maliyetle ulaştırabilmesi için bulunduğu şehirden başlayarak 
         her şehire sadece bir kez uğradıktan sonra başladığı şehre dönebilmesi için en kısa yolu bulan ve bu yolu bir harita üzerinde
         gösteren bir uygulamadır. Bu kısım sadece projenin açıklaması okuyup edindiğimiz ön bilgiye göre yazılmıştır.Projede projeyi 
         yapan kişiler için veri yapıları ve veri modellerini anlamak, graf yapısının kullanılması ve algoritma mantığını kullanarak 
         bir probleme çözüm sağlayabilmesi amaçlanmaktadır.
      </p>
      <h2> 2-)Yapım Aşaması</h2>
      <p>Bu kısım proje öncesi ve sonrası araştırmaları ve de projenin yapım aşamasındaki sıkıntıları ve çözümleri içermektedir.
Özet kısmında açıkladığımız gibi bu projede bizden harita verileri üstünde bağlı liste kullanarak temel işlevlerin yapılması istendi.
Projenin nasıl yapılacağı konusunda bize e-destek üzerinden verilen bilgilendirmeleri ve isterleri okuyup fikir edindik.


Projemizde veri yapılarını, veri modellerini anlamak ve komşuluk matrisi kullanımı belirtildiği için en kısa yol algoritmalarına yöneldik.
En kısa yol algoritmaları olan Bellman Ford, Dijkstra ve Floyd-Warshall algoritmalarını incelemeye başladık.
Bize en uygun olanın komşuluk matrisini alıp her şehrin her şehire en az maliyetini veren Floyd-Warshall algoritmasının olduğunu gördük.
Floyd-Warshall algoritmasını kullamak için matrisimizde komşuluk olmayan değerlerin çok yüksek bir değer girilmesi gerekiyordu.
Komşuluk olan indexlerin aradaki mesafe olduğu kalan boşlukların 0 olduğu bir txt dosyası hazırladık.
Bu dosyadan verileri alıp verilerMatriks adlı iki boyutlu bir matrise atan ve bu iki boyutlu matrisi döndüren sehirVerileri() metodunu yazdık.
Sonra Floyd-Warshall algoritmasını kullanabilmek için bu metodu çağırıp komşuluk bulunmayan şehirlerin değerini yüksek bir değere eşitleyen ve iki boyutlu matris geri döndüren KomşuDuzenleme () metodunu yazdık.
Verilen şehirlerden hangi sırayla gidilceğini bulmak için girilen tüm şehirlerin olası tüm sıralamalarının işimize yarayacağını düşündük.

Permute() ve swap() fonksiyonlarının yardımı ile girilen tüm şehirlerin tüm olası sıralamalarının başında ve sonunda 41 olacak şekilde permutations iki boyutlu matrisine atmayı başardık.
Tüm olası yolları alan permutations ve komşuluk matrisimiz olan SehirListesini alan EnKısaYol metodumuzu yazdık.
EnKısaYol metodumuz SehirListesi matrisini (metoddaki hali ile matris isimli matris)Floyd-Warshall algoritması ile  komşu olsa da olmasa da her şehirin her şehire en kısa mesafesini veren haline getirdi.
EnKısaYol metodumuz permutations matrisindeki olası yolları teker teker tarayıp SehirListesi matrisi sayesinde toplam maliyetlerini bulup minimum maliyetli olan yolun permutationsdaki satır değerini integer değerinde geri döndericek hali aldı.
Bu satır değerini kullanarak olası en kısa yolu sırayla şehir ve sonraki şehir olmak üzere EnKısa() metoduna gönderdik.
EnKısa() Metodunda gönderilen iki şehir Floyd-Warshall algoritmasının biraz oynanmış hali ile arasındaki en kısa maliyetli şehiri alan ve bunu  EnKısa(ilk,AraSehir) EnKısa(AraSehir,son) şeklinde tekrar EnKısa metoduna gönderip her döndüğünde belirli koşullarla tanımladığım IlkNode graf yapısına eklendi.
IlkNode graf yapısı MatriseAtma()  metodu ile iki boyutlu FinalMatris matrisine atandı.</p>
<h2> 1-)Projenin Tanımı</h2>   
<p>Bu kısım proje öncesi ve sonrası araştırmaları ve de projenin yapım aşamasındaki sıkıntıları ve çözümleri içermektedir.
Özet kısmında açıkladığımız gibi bu projede bizden harita verileri üstünde bağlı liste kullanarak temel işlevlerin yapılması istendi.
Projenin nasıl yapılacağı konusunda bize e-destek üzerinden verilen bilgilendirmeleri ve isterleri okuyup fikir edindik.


Projemizde veri yapılarını, veri modellerini anlamak ve komşuluk matrisi kullanımı belirtildiği için en kısa yol algoritmalarına yöneldik.
En kısa yol algoritmaları olan Bellman Ford, Dijkstra ve Floyd-Warshall algoritmalarını incelemeye başladık.
Bize en uygun olanın komşuluk matrisini alıp her şehrin her şehire en az maliyetini veren Floyd-Warshall algoritmasının olduğunu gördük.
Floyd-Warshall algoritmasını kullamak için matrisimizde komşuluk olmayan değerlerin çok yüksek bir değer girilmesi gerekiyordu.
Komşuluk olan indexlerin aradaki mesafe olduğu kalan boşlukların 0 olduğu bir txt dosyası hazırladık.
Bu dosyadan verileri alıp verilerMatriks adlı iki boyutlu bir matrise atan ve bu iki boyutlu matrisi döndüren sehirVerileri() metodunu yazdık.
Sonra Floyd-Warshall algoritmasını kullanabilmek için bu metodu çağırıp komşuluk bulunmayan şehirlerin değerini yüksek bir değere eşitleyen ve iki boyutlu matris geri döndüren KomşuDuzenleme () metodunu yazdık.
Verilen şehirlerden hangi sırayla gidilceğini bulmak için girilen tüm şehirlerin olası tüm sıralamalarının işimize yarayacağını düşündük.

Permute() ve swap() fonksiyonlarının yardımı ile girilen tüm şehirlerin tüm olası sıralamalarının başında ve sonunda 41 olacak şekilde permutations iki boyutlu matrisine atmayı başardık.
Tüm olası yolları alan permutations ve komşuluk matrisimiz olan SehirListesini alan EnKısaYol metodumuzu yazdık.
EnKısaYol metodumuz SehirListesi matrisini (metoddaki hali ile matris isimli matris)Floyd-Warshall algoritması ile  komşu olsa da olmasa da her şehirin her şehire en kısa mesafesini veren haline getirdi.
EnKısaYol metodumuz permutations matrisindeki olası yolları teker teker tarayıp SehirListesi matrisi sayesinde toplam maliyetlerini bulup minimum maliyetli olan yolun permutationsdaki satır değerini integer değerinde geri döndericek hali aldı.
Bu satır değerini kullanarak olası en kısa yolu sırayla şehir ve sonraki şehir olmak üzere EnKısa() metoduna gönderdik.
EnKısa() Metodunda gönderilen iki şehir Floyd-Warshall algoritmasının biraz oynanmış hali ile arasındaki en kısa maliyetli şehiri alan ve bunu  EnKısa(ilk,AraSehir) EnKısa(AraSehir,son) şeklinde tekrar EnKısa metoduna gönderip her döndüğünde belirli koşullarla tanımladığım IlkNode graf yapısına eklendi.
IlkNode graf yapısı MatriseAtma()  metodu ile iki boyutlu FinalMatris matrisine atandı.</p>




</div>
  </div>
</body>