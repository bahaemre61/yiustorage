<?php
include("vt.php"); 


function function_alert($message){
  echo "<script>alert('$message');</script>";
}

if ($_POST) {
    $urunAdi = $_POST["urunAdi"]; 
    $urunMiktari = $_POST["urunMiktari"]; 
    $turid =  $_POST['turID'];
}                                
          $sorgu = "INSERT INTO urunler (urunAdi,urunMiktari,turID) VALUES ('$urunAdi', '$urunMiktari','$turid')";
        
          if($baglanti->query($sorgu) === TRUE){
            function_alert("Ürün Başarıyla Eklenmiştir.");
            echo "<script>
            window.location = 'urunler.php';
            </script>";
          }
          else{
            echo "Hata:". $baglanti->error;
          }
 ?>                                
 