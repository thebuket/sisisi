<?php

## Veritabanına bağlantı kuralım...
## Veritabanına bağlantı kuralım...
$host     = "localhost";
$user     = "root";
$password = "root";
$database = "YEMEKLER";
$DB = mysqli_connect( $host, $user, $password, $database );
if( mysqli_connect_error() ) die("Veritabanına bağlanılamadı...");
$temp = mysqli_query($DB, "set names 'utf8'"); // Türkçe karakterlerle ilgili sorun yaşamamak için



function Temizle($DB, $val) {
  $val = mysqli_real_escape_string($DB, $val);
  return $val;
}

## Veritabanına kayıt ekleme
## Veritabanına kayıt ekleme
$val1 = "AAA";

// SQL içine konulacak değişkenlere MUTLAKA bu işlem uygulanmalıdır.
// Bunun sebebi GÜVENLİK'tir.
$val1 = Temizle($DB, $val1);

//$SQL = "INSERT INTO araclar (marka, model, fiyat) VALUES ( '$val1', '$val2', '$val3' )";
$SQL = "INSERT INTO copy_kategoriler SET
            kategoriadi = '$val1'";
$rows = mysqli_query($DB, $SQL);
$EklenenID = mysqli_insert_id($DB);
echo "Yeni kategori, tabloya $EklenenID kayıt numarası ile eklenmiştir.";

