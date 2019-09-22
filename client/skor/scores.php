<?
session_start();
include("../dbconfig.php");

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

} else {
    die("Bu Sayfa Anana Girsin...");
}

$oyuncuadi=htmlspecialchars(strip_tags($_POST['oyuncuadi']));
$skor=htmlspecialchars(strip_tags($_POST['skor']));

function cleanString($a) {
    $reg_exUrl = "/(((http(s?)(:\/\/))?([w]{3}\.)?)([a-z|0-9])+\.(com(\.au)?|org|me|net|ly|be|gl|info|(co(\.))?uk|ca|nz|tv|fr)((\/[^\s]+)*)+)/";
    return preg_replace($reg_exUrl, '', $a);
}

	if ($oyuncuadi!='' && $oyuncuadi!='null')
	{
	$hesapla = $baglanti->alsay("SELECT count(*) from skor WHERE oyuncuadi=?",array($oyuncuadi));
	if ($hesapla>0)
	{
	$sorgu_oyuncuadi = $baglanti->alyaz("SELECT * from skor WHERE oyuncuadi=?",array($oyuncuadi));
	foreach($sorgu_oyuncuadi as $guncelskor)
	{
	
	if ($guncelskor['skor']<$skor)
	{
		$baglanti->alguncelle("UPDATE skor SET skor=? WHERE oyuncuadi=?",array($skor, $oyuncuadi));
	}	
	}
		
		
	}
	else
	{
		$baglanti->alkaydet("INSERT INTO skor (oyuncuadi,skor) VALUES (?,?)",array($oyuncuadi, $skor));
	}}

?>