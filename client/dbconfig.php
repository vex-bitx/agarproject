<?php
error_reporting(E_ALL ^ E_NOTICE);
ob_start();
session_start();
class baglan
{
	const host = 'localhost';
    const user = 'root';
    const pass = '123456';
    const data = 'agarlove';
    public $conn; 

	public function __construct()
    {
		try{
            $this->conn = new PDO("mysql:dbname=".self::data.";host=".self::host, self::user, self::pass);
            $this->conn->query("SET NAMES 'utf8_general_ci'");
            $this->conn->query("SET CHARACTER SET utf8_general_ci");
            $this->conn->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
        }catch(PDOException $e){
             die("HATA : ".$e->getMessage());
        }
		header( "Content-type: text/html; charset=utf-8" );
    }
	
	public function sonkayit(){
        return $this->conn->lastInsertId();
    }
		
    public function say($sql){
        $say = $this->conn->prepare($sql);
        $say->execute();
        return $say->fetchColumn();
    }

    public function alsay($sql,$array){
        $say = $this->conn->prepare($sql);
        $say->execute($array);
        return $say->fetchColumn();
    }

	public function tekyaz($sql){
        $veriler = $this->conn->prepare($sql);
        $veriler->execute();
        return $veriler->fetch(PDO::FETCH_ASSOC);
    }

	public function altekyaz($sql,$array){
        $veriler = $this->conn->prepare($sql);
        $veriler->execute($array);
        return $veriler->fetch(PDO::FETCH_ASSOC);
    }
	
	public function yaz($sql){
        $veriler = $this->conn->prepare($sql);
        $veriler->execute();
        return $veriler->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function alyaz($sql,$array){
        $veriler = $this->conn->prepare($sql);
        $veriler->execute($array);
        return $veriler->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function sor($sql){
        return $this->conn->query($sql);
    }
	
	public function kaydet($sql){ 
		$kaydet = $this->conn->prepare($sql);
		return $kaydet->execute();
	}
	
	public function alkaydet($sql,$array){ 
		$kaydet = $this->conn->prepare($sql);
		return $kaydet->execute($array);
	}
	
	public function guncelle($sql){ 
		$guncelle = $this->conn->prepare($sql);
		return $guncelle->execute();
	}
	
	public function alguncelle($sql,$array){ 
		$guncelle = $this->conn->prepare($sql);
		return $guncelle->execute($array);
	}
	
	public function sil($sql){ 
		$sil = $this->conn->prepare($sql);
		return $sil->execute();
	}
	
	public function alsil($sql,$array){ 
		$sil = $this->conn->prepare($sql);
		return $sil->execute($array);
	}
	
	 public function __destruct(){
        $this->conn = null;
    }
	
}

if($_GET['lang']=='en')
{
	$_SESSION['lang']="en";
}else if($_GET['lang']=='tr')
{
	$_SESSION['lang']="tr";
}
if($_SESSION['lang']=='en')
{
	require_once("lang/en.php");
}
else
{
	require_once("lang/tr.php");	
}

$baglanti = new baglan;
$config = ['site' => 'http://127.0.0.1/','api' => 'http://127.0.0.1/','host' => '127.0.0.1',];

?>