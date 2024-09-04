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


$sorgu=$baglanti->query("delete from departman where departID=$id");
echo "<script> alert('Departmandan Ürün Silinmiştir.')
location.href='urunler.php'
</script>"; 
}
?>