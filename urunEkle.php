<?php

use LDAP\Result;

session_start();
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    $kadi = $_SESSION["kadi"];
} else {
    header("location:login.php");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/bootstrap.min.css" rel="stylesheet"/>
    <link href="styles/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    
    <title>Giriş</title>
    <style>
        .kutu {
            margin-top: 40px
        }
    </style>
</head>
<body>

<?php
include("vt.php"); 
{
  $sql = "Select * from turler";
  $sonuc = $baglanti->query($sql);
}
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<nav id="navbar">
  <ul class="navbar-items flexbox-col">
    <li class="navbar-logo flexbox-left">
      <a class="navbar-item-inner flexbox">    
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href = "index.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <span class="link-text">Ana Sayfa</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href = "urunler.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="folder-open-outline"></ion-icon>
        </div>
        <span class="link-text">Urunler</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="userControl.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <span class="link-text">Kullanıcılar</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        <span class="link-text">Destek</span>
      </a>
    </li>
    <li style="padding-top: 50px;" class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="logout.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
        <ion-icon name="exit-outline"></ion-icon>
        </div>
        <span class="link-text">Çıkış</span>
      </a>
    </li>
  </ul>
</nav>          


<form id="form1" method="post" action="ekle.php">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
        <div class ="container">
            <h3 class="text-center">Ürün Ekle</h3>
            <table class="table">
                <tr>
                    <td>
                        <input type="text" ID="urunAdi" name="urunAdi" class="form-control" placeholder="Ürün Adı" value='<?php echo @$urunAdi ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" ID="urunMiktari" name="urunMiktari" class="form-control" placeholder="Ürün Miktarı"/>
                    </td>
                </tr>
                <tr>
                    <td>
                      <select name="turID" ID="turID" class="form-control">
                         <?php

                         $sorgu1 = $baglanti->query("Select * from turler");

                         if($sorgu1->num_rows >0 ){

                          while($row=$sorgu1->fetch_assoc()){
                            echo "<option value='" .$row ['turID'] . "'>" . $row['turAdi'] . "</option>";
                          }}
                          else
                          {
                            echo "<option value =''>Tür bulunamadı </option>";
                          }                                               
                         ?>
                         </select>
                    </td>
                </tr>                                
                <tr>
                    <td class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" ID="btnGiris" value="Kaydet"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
</div>
</body>
</html>