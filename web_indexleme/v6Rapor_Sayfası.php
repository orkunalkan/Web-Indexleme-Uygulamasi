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
  <div class="container";>
    <div class="box-1";>
    
    <h2 class="baslik";>Kocaeli Üniversitesi </h2>
    <h2 class="baslik";>Bilgisayar Mühendisliği Bölümü </h2>
    <h4 > Oğuz Can Varol 180201057 &emsp; Orkun Alkan 180201045 </h4>
    <h4 > oguzcan.varoll@gmail.com &emsp; orkunalkan98@gmail.com</h4>
    <pre>

    </pre>
<h2> 1-)PROJENİN TANIMI</h2>
      
      <p>Bu kısım sadece projenin açıklamasını okuyup edindiğimiz ön bilgiye göre yazılmıştır.</p>
      <p>Bu projedeki amaç verilen bir URL’deki web sayfasının içeriğine göre diğer birden fazla web sayfasını benzerlik bakımından indeksleyip sıralayan web tabanlı bir uygulama geliştirmektir. Böylece bu proje sayesinde web indeksleme yöntemleri hakkında bilgi edinilmesi, web tabanlı uygulama yazma deneyimi ve web tabanlı uygulama yazma becerisinin geliştirilmesi amaçlanmaktadır.</p>

<h2>2-)GİRİŞ </h2>
      
      <p>Özet kısmında açıkladığımız gibi bu projede bizden projede bulunan web tabanlı uygulamaların kod olarak yazımı konusunda tecrübe kazanmamız ve mantığını kavramamız beklenmektedir. </p>
      <p>Projenin nasıl yapılacağı konusunda zoom üzerinden yapılan sunumu dinledik, bize e-destek üzerinden verilen bilgilendirmeleri ve isterleri okuyup fikir edindik. </p>
      <p>Projeye ilk olarak hangi dilde yazmamız gerektiğine karar verdikten sonra kullanıcıdan URL'leri hangi kütüphane ile değişkene atayabileceğimizi araştırmaya başladık. </p>
      <p>Uygun kütüphaneyi bulduktan sonra ilk aşamada bizden istenen kullanıcıdan aldığımız URL'lerin içerisindeki "text" bölümlerini değişkene atayıp bu değişken içerisinde kelimelerin frekansını bulan işlemleri yaparak ilk aşamayı bitirdik. <p>
      <p>İkinci aşamaya geçtikten sonra ikinci aşamada bulunan anahtar kelime bulma isterini kendi oluşturduğumuz anahtar kelime seçme formulüne göre 5'er tane anahtar kelime seçtik ve bunları ekranda gösterdik.</p>
      <p>Üçüncü aşamada kullanıcının girdiği 2 farklı URL'den 1.sinin anahtar kelimelerini bulup ekrana yazdırdıktan sonra 1. ve 2.URL arasındaki benzerliği kendi geliştirdiğimiz benzerli puanlama yöntemi ile skoru yazdırdık</p>
      <p>Dördüncü aşamada kullanıcının girdiği bir web sitesi kümesi ve farklı bir URL için bizden web sitesinin içerinide bulunan URL'lerin ve onların içinde bulunan URL'lerin yani web sitesinin birinci ikinci ve üçüncü derinliklerinin bize verilen farklı URL'nin anahtar kelimelerine göre benzerlik skorlamalarını yaptık. </p>
      <p>Beşinci aşamada bulduğumuz anahtar kelimelerin semantik analizini yapmak için kelimelerin eş anlamlısının yani "synonym"lerinin bulunduğu veri setini internetten indirip projeye dahil ettik. Daha sonra beşinci aşamayı tamamlamak için alakalı anahtar kelimeleri skorlamaya dahil etmeye çalıştık. </p>

<h2>4-)KARŞILAŞILAN HATALAR </h2>   
      
      <p>Projeye başlamadan önce ve başladıktan sonra karşılaştığımız sıkıntılar :</p>
      <p>Projeye ilk başladığımızda HTML ve CSS yapısını oluşturduktan sonra kullanıcıdan aldığımız URL'nin içerisinden text kısmını nasıl çekeceğimiz ve nasıl değişkene atabileceğimiz konusunda birden fazla fonksiyon ve kütüphaneyi denememize rağmen projede web sitesinden çekmemiz istenen metnin ne olduğu konusunda kararsız kaldık.</p>
      <p>Dördüncü aşamada bize verilen web sitesindeki URL'lerin ve onların içinde bulunan web sayfalarının çok fazla olmasından dolayı yapılan işlem gerektiğinden fazla zaman alıyordu. Bu yüzden de web kümesinden alınacak olan derinliklerin sayısına sınırlama getirdik.</p>
      <p>Beşinci aşamada projeye dahil ettiğimiz data setinden eş anlamlı (synonym) kelimeleri çekerken indexlerinde kayma meydana geldiğinden dolayı aldığımız sonuçlarda küçük bir farklılık gözlemledik.</p>
      <p>Genel olarak yaşadığımız bir sıkıntı olan konu da kullandığımız web sayfalarının bazıları içerisinden veri çekmesini engellediğinden dolayı her web sitesiyle bu işlem gerçekleştirilememektedir.</p>
      
<h2>5-)KAYNAKÇA</h2> 
      <p>1-) http://bilgisayarkavramlari.sadievrenseker.com </p>
      <p>2-) https://stackoverflow.com</p>
      <p>3-) https://www.w3schools.com/php/default.asp</p>
      <p>4-) https://www.w3schools.com/cssref/default.asp</p>
      <p>5-) https://www.php.net/docs.php</p>
      <p>6-) https://www.geeksforgeeks.org</p>
      <p>7-) https://www.tutorialspoint.com/php/index.htm</p>
      <p>8-) https://simplehtmldom.sourceforge.io/</p>


    </div>
  </div>
</body>