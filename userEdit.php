
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="styles/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
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
session_start();
include("vt.php"); 


if (!isset($_SESSION["Oturum"]) || $_SESSION["Oturum"] != "6789") {
    header("location:login.php");
}


$id = (int)$_GET["id"];
$sorgu = $baglanti->query("select * from kullanici where kullaniciID=$id");
$sonuc = $sorgu->fetch_assoc();
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
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="search-outline"></ion-icon>
        </div>
        <span class="link-text">Search</span>
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
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="pie-chart-outline"></ion-icon>
        </div>
        <span class="link-text">Dashboard</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="userControl.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <span class="link-text">Kullanıcı</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        <span class="link-text">Support</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="settings-outline"></ion-icon>
        </div>
        <span class="link-text">Settings</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="logout.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
        <ion-icon name="exit-outline"></ion-icon>
        </div>
        <span class="link-text">Logout</span>
      </a>
    </li>
  </ul>
</nav>          

<form id="form1" method="post">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
        <div class ="container">
            <h3 class="text-center">Kullanıcı düzenle</h3>
            <table class="table">
                <tr>
                    <td>
                        <input type="text" ID="txtKadi" name="txtKadi" class="form-control" placeholder="Kullanıcı adı" value='<?php echo $sonuc['kullaniciAdi'] ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParola" name="txtParola" class="form-control" placeholder="Parola"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParolaTekrar" name="txtParolaTekrar" class="form-control" placeholder="Parola Tekrar"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php                   
                        if ($_POST) {       
                            $txtKadi = $_POST["txtKadi"]; 
                            $txtParola = $_POST["txtParola"]; 
                            $txtParolaTekrar = $_POST["txtParolaTekrar"]; 
                            if ($txtParola == $txtParolaTekrar && $txtParola != '' && $txtKadi != '') {

                                $txtParola = md5('56' . $txtParola . '23');
                                if ($sorgu2 = $baglanti->query("UPDATE kullanici SET kullaniciAdi='$txtKadi', kullaniciSifre='$txtParola' WHERE  kullaniciID=$id")) {
                                    echo "Kullanıcı bilgileri güncellendi."; 
                                } else {
                                    echo 'Bir hata oldu tekrar deneyin';
                                }
                            } else {
                                echo "Alanları düzgün doldurunuz";
                            }
                        }
                        ?>
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