<?php

function sifre( $sifre )
{
	$cikti = md5( sha1( md5( sha1( md5( sha1( strtolower( $sifre ) ) ) ) ) ) );
	return $cikti;
}

function gyaz($icerik)
{
	$icerik = htmlspecialchars($icerik);
	return $icerik;
}

function temizletirnak($text)
{
$text = trim($text);
$search = array("'",'"');
$replace = array('','');
$new_text = str_replace($search,$replace,$text);
return $new_text;
}

function ceptel($text)
{
$search = array("(",')',' ');
$replace = array('','','');
$new_text = str_replace($search,$replace,$text);
return $new_text;
}

function temizlehtml($icerik)
{
$temizmesaj = strip_tags($icerik, '<a><p><u><i><b><br><br/><ul><li><ol><blockquote><img>');
return $temizmesaj;
}

function bosluksil($icerik){
	$icerik = str_replace(' ','',$icerik);
	return $icerik;
}

function ip()
{
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}

function tarihcevir($tarih)
{
$ytarih = explode ("-",$tarih);
return $ytarih[2].".".$ytarih[1].".".$ytarih[0];
}

function postgun($tarih)
{
$ytarih = explode ("-",$tarih);
return $ytarih[0];
}

function postay($tarih)
{
$ytarih = explode ("-",$tarih);
return $ytarih[1];
}

function postyil($tarih)
{
$ytarih = explode ("-",$tarih);
return $ytarih[2];
}

function posttarih($tarih)
{
$ytarih = explode ("-",$tarih);
return $ytarih[2]."-".$ytarih[1]."-".$ytarih[0];
}
function paragoster($veri = 0){
$veri = number_format($veri,2,",",".");
return $veri;
}
function paragosterilan($veri = 0){
$veri = number_format($veri,0,",",".");
return $veri;
}
function paratemizle($veri)
{
$veri = str_replace(".","",$veri);
$veri = str_replace(",",".",$veri);
return $veri;
}
function paybyme($veri)
{
$veri = str_replace(".","",$veri);
$veri = str_replace(",","",$veri);
return $veri;
}
function parabirimi($para)
{
	if($para==0){
	$birim = "TL";
	}
return $birim;
}

function tc_turkce_duzelt($veri){
    $bul = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü');
    $deg = array('Ç', 'Ğ', 'I', 'İ', 'Ö', 'Ş', 'Ü');
    return str_replace($bul, $deg, $veri);
}

function uzantial($dosyaAdi){
$dosyaAdi = explode(".",$dosyaAdi);
$dosyaAdi = array_reverse($dosyaAdi);
$uzanti = $dosyaAdi[0];
$uzanti = strtolower($uzanti);
$uzanti = "." . $uzanti;
return $uzanti;
}

function boyut($boyut) 
{
$sayi = 1024;
$birimler = explode(' ','B KB MB GB TB PB');
for ($i = 0; $boyut > $sayi; $i++) { 
$boyut /= $sayi;
}
return round($boyut, 2) . ' ' . $birimler[$i];
}

function seo($url){
$url = trim($url);
$find = array('', '');
$url = str_replace ($find,"", $url);
$find = array(' ', '&amp;amp;quot;', '&amp;amp;amp;', '&amp;amp;', '\r\n', '\n', '/', '\\', '+', '<', '>');
$url = str_replace ($find, '-', $url);
$find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
$url = str_replace ($find, 'e', $url);
$find = array('í', 'ý', 'ì', 'î', 'ï', 'I', 'Ý', 'Í', 'Ì', 'Î', 'Ï','İ','ı');
$url = str_replace ($find, 'i', $url);
$find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
$url = str_replace ($find, 'o', $url);
$find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
$url = str_replace ($find, 'a', $url);
$find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
$url = str_replace ($find, 'u', $url);
$find = array('ç', 'Ç');
$url = str_replace ($find, 'c', $url);
$find = array('þ', 'Þ','ş','Ş');
$url = str_replace ($find, 's', $url);
$find = array('ð', 'Ð','ğ','Ğ');
$url = str_replace ($find, 'g', $url);
$find = array('/[^A-Za-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array("", '-', "");
$url = preg_replace ($find, $repl, $url);
$url = str_replace ('–', '-', $url);
$url = strtolower($url);
return $url;
}

function sayfaresim($resim,$resimadi){
if(in_array(uzantial($resim["name"]),array(".jpg",".png",".jpeg",".gif",".JPG",".JPEG",".PNG",".GIF"))){
if($resim["size"] >8000000){
 $yuklehata = "Boyut büyük";
 }else{
$foo = new Upload($resim);
$foo->file_new_name_body = $resimadi;
$foo->Process('../upload/');
  if ($foo->processed) {
	$yuklehata = null;
	$foo->Clean();
  } else {
   $yuklehata =  $foo->error;
  }
 }
 }else{
 $yuklehata = "fotoğraf uzantısı geçersiz";
 }
return $yuklehata;
}


function yukleresim($resim,$resimadi){
if(in_array(uzantial($resim["name"]),array(".png",".jpeg",".gif",".jpg",".JPG",".JPEG",".PNG",".GIF"))){
if($resim["size"] >8000000){
 $yuklehata = "Boyut büyük";
 }else{
$foo = new Upload($resim, 'tr_TR');
$foo->image_resize = true;
$foo->image_ratio_crop = true;
$foo->image_y = 300;
$foo->image_x = 300;
$foo->file_new_name_body = $resimadi;
$foo->image_convert = 'png';
$foo->Process('skins/');
  if ($foo->processed) {
	$yuklehata = null;
	$foo->Clean();
  } else {
   $yuklehata =  $foo->error;
  }
 }
 }else{
 $yuklehata = "fotoğraf uzantısı geçersiz";
 }
return $yuklehata;
}


function mobil(){
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone"); 
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android"); 
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS"); 
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry"); 
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
if ($iphone == false && $android == false && $palmpre == false && $berry == false && $ipod == false) {
return false;
}else{
return true;
}
}
?>