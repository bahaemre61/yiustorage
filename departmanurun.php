<?php
include("vt.php");
session_start();
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    $kadi = $_SESSION["kadi"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    
</head>
<body>
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
<div class="container">   
        <table class="table">
            <tr>
                
                <th>Departman Adı</th>
                <th>Ürün Adı</th>
                <th>Bilgi</th>
                <th>İşlemler</th>

                
            </tr>
            <?php
            $sorgu = $baglanti->query("select * from departman INNER JOIN urunler ON departman.urunID = urunler.urunID ");  
            while ($sonuc = $sorgu->fetch_assoc()) {             
                ?>
                <tr>
                    <td><?php echo $sonuc["departmanAdi"] ?></td>
                    <td><?php echo $sonuc["urunAdi"] ?></td>
                    <td><?php echo $sonuc["bilgi"] ?></td>

                    
                    <td>
                      <a href="urunDuzenle.php?id=<?php echo $sonuc["urunID"] ?>" style="font-size: 22px;" class="edit-link"><ion-icon name="sync-outline"></ion-icon></a>
                      <a href=".php?id=<?php echo $sonuc["urunID"] ?>" style="font-size: 22px;" class="edit-link"><ion-icon name="trash-outline"></ion-icon></a>

                  </td>
                </tr>
                <?php
            }
            ?>
        </table>

    </div>
</body>
</html>