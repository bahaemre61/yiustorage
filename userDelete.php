<?php
session_start();
if(!isset($_SESSION["Oturum"]) || $_SESSION["Oturum"]!="6789")
{
	header("location:login.php");
}
if($_GET)
{
include("vt.php");
$id=(int)$_GET["id"]; 


$sorgu=$baglanti->query("delete from kullanici where kullaniciID=$id");
echo " <script> alert('Kullanıcı Silinmiştir.')
location.href='userControl.php'
</script>"; 
}
?>