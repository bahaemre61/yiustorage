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


$sorgu=$baglanti->query("delete from urunler where urunID=$id");
echo "<script> alert('Ürün Silinmiştir.')
location.href='urunler.php'
</script>"; 
}
?>