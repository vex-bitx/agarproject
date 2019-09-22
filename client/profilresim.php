<?php
error_reporting(E_ALL ^ E_NOTICE);
ob_start();
session_start();
require("dbconfig.php");
require("upload/class.upload.php");
require("upload/fonksiyonlar.php");
if(!isset($_SESSION["kullaniciadi"])){
echo 'Üye girişi yapınız.';
exit();
}
$bilgiler = $baglanti->altekyaz("select * from uyelik where kullaniciadi=?",array($_SESSION["kullaniciadi"]));
if($bilgiler["ban"]==1){
session_destroy();
echo "Üyeliğiniz banlanmıştır.";
exit();
}

if(isset($_FILES["resim"])){
if($bilgiler["profilonay"]==1){
$onayguncelle = $baglanti->alguncelle("update uyelik set profilonay=0 where kullaniciadi=?",array($_SESSION["kullaniciadi"]));
}
if(!empty($_FILES["resim"]["name"])){
@unlink("skins/".$bilgiler["id"].".png");
}
if(!empty($bilgiler["id"])){
$resimup = yukleresim($_FILES["resim"],$bilgiler["id"]);
}
if($resimup==null){
$profilguncelle = $baglanti->alguncelle("update uyelik set profil=1 where kullaniciadi=?",array($_SESSION["kullaniciadi"]));
$bilgiler = $baglanti->altekyaz("select * from uyelik where kullaniciadi=?",array($_SESSION["kullaniciadi"]));
}else{
echo '<script>alert("'.$resimup.'");</script>';
}
}


if($bilgiler["profil"]==1){
echo '<img style="width:320px; height:280px; border-radius: 10px; margin-top: 0px; border: 0px solid rgba(255, 170, 255, .2); " src="'.$siteadresi.'skins/'.htmlspecialchars($bilgiler["id"], ENT_QUOTES).'.png?time='.time().'">'; 
}else{
echo '<img style="width:320px; height:280px; border-radius: 10px; margin-top: 0px; border: 0px solid rgba(255, 170, 255, .2); " src="'.$siteadresi.'img/upload.png">';
}
?>