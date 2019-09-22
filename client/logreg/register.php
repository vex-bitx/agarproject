<?php
if(isset($bilgiler)){
	if(isset($_POST["guncelleoyuncuadi"])){
			if ($_POST["guncelleoyuncuadi"]=="") {
				$uyeguncellehata = $lang_oyuncuadinialamazsiniz;
			}else{
				$yasaklikontrol = $baglanti->alsay("select count(*) from yasakli where adi=?",array($_POST["guncelleoyuncuadi"]));
				if ($yasaklikontrol>0) {
					$uyeguncellehata = $lang_oyuncuadinialamazsiniz;
				}else{
					$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE oyuncuadi=? and oyuncuadi<>?",array($_POST["guncelleoyuncuadi"],$bilgiler["oyuncuadi"]));
					if ($hesapla>0){
						$uyeguncellehata = $lang_oyuncuadikullaniliyor;
					}else{
						if (!filter_var($_POST["guncellemail"], FILTER_VALIDATE_EMAIL)) {
							$uyeguncellehata = $lang_gecersizepostaadresi;
						}else{
							$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE mail=? and mail<>?",array($_POST["guncellemail"],$bilgiler["mail"]));
							if ($hesapla>0){
								$uyeguncellehata = $lang_epostaadresikullaniliyor;
							}else{
								$baglanti->alguncelle("UPDATE uyelik SET oyuncuadi=? ,mail=? WHERE kullaniciadi=?",array($_POST["guncelleoyuncuadi"], $_POST["guncellemail"], $bilgiler["kullaniciadi"]));
								if(($_POST["guncellesifre"]!="" and $_POST["guncellesifretekrar"]!="") and ($_POST["guncellesifre"]==$_POST["guncellesifretekrar"])){
									$baglanti->alguncelle("UPDATE uyelik SET sifre=? WHERE kullaniciadi=?",array($_POST["guncellesifre"], $bilgiler["kullaniciadi"]));
								}
								header("location:{$siteadresi}{$canonical}");
							}
						}
					}
				}
			}
	}
?>

<?php
}else{
	if(isset($_POST["login_username"])){
		$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE kullaniciadi=? and sifre=?",array($_POST["login_username"], $_POST["login_password"]));
		if($hesapla>0)
		{
			$uyebilgi = $baglanti->altekyaz("SELECT ban,onay from uyelik WHERE kullaniciadi=? and sifre=?",array($_POST["login_username"], $_POST["login_password"]));
			if($uyebilgi["ban"]==1){
				$girishata = $lang_uyelikbanlanmis;
			}else{
				$_SESSION["kullaniciadi"] = $_POST["login_username"];
				$_SESSION["uyelikonay"] = $uyebilgi["onay"];
				header("location:$siteadresi");
			}
		}else{
			$girishata = $lang_kullaniciadisifreyanlis;
		}
	}
	if(isset($_POST["oyuncuadi"])){
		if(empty($_POST["oyuncuadi"]) or empty($_POST["kullaniciadi"]) or empty($_POST["sifre"]) or empty($_POST["sifretekrar"]) or empty($_POST["eposta"])){
			$uyeolhata = $lang_lutfenbosalanbirakmayiniz;
		}else{
			if (!filter_var($_POST["eposta"], FILTER_VALIDATE_EMAIL)) {
				$uyeolhata = $lang_gecersizepostaadresi;
			}else{
				$yasaklikontrol = $baglanti->alsay("select count(*) from yasakli where adi=?",array($_POST["oyuncuadi"]));
				if($yasaklikontrol>0){
					$uyeolhata = $lang_oyuncuadinialamazsiniz;
				}else{
					$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE kullaniciadi=?",array($_POST["kullaniciadi"]));
					if ($hesapla>0){
						$uyeolhata = $lang_kullaniciadikullaniliyor;
					}else{
						$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE oyuncuadi=?",array($_POST["oyuncuadi"]));
						if ($hesapla>0){
							$uyeolhata = $lang_oyuncuadikullaniliyor;
						}else{
							$hesapla = $baglanti->alsay("SELECT count(*) from uyelik WHERE mail=?",array($_POST["eposta"]));
							if ($hesapla>0){
								$uyeolhata = $lang_epostaadresikullaniliyor;
							}else{
							
								$baglanti->alkaydet("INSERT INTO uyelik (kullaniciadi,oyuncuadi,sifre,mail) VALUES (?,?,?,?)",array($_POST["kullaniciadi"], $_POST["oyuncuadi"], $_POST["sifre"], $_POST["eposta"]));
								$_SESSION["kullaniciadi"] = $_POST["kullaniciadi"];
								$_SESSION["uyelikonay"] = 0;
								header("location:$siteadresi");
								exit();
							}
						}
					}
				}
			}
		}
	}
?>
				
							<div class="panel-content">
							
							<div style="color: #fff" >
								<center><h4>REGiSTER</h4></center>
							</div>
								<form action="<?=$siteadresi?><?=$canonical?>" method="post">
										<?php
										if(isset($uyeolhata))
										{
										?>
											<p>
												<center><span class="the-error-msg" style="margin:0px 0px 10px 0px;color:#ffff00;"><i class="fa fa-warning"></i><?=$uyeolhata?></span></center>
											</p>
										<?php
										}
										?>
										<center>
										<input id="login_username" class="form-control" style="border-radius: 10px; margin-top: 10px; width: auto%; height: 34px;background: rgba(0, 0, 0, .4);color: #ffaaff" name="oyuncuadi" placeholder="Player Name" maxlength="12" value='<?=$_POST["oyuncuadi"]?>'>
										<input id="login_username" class="form-control" style="border-radius: 10px; margin-top: 10px; width: auto%; height: 34px;background: rgba(0, 0, 0, .4);color: #ffaaff" name="kullaniciadi" placeholder="User Name" maxlength="12" value='<?=$_POST["kullaniciadi"]?>'>
										<input type="password" id="login_password" class="form-control" style="border-radius: 10px; margin-top: 10px; width: auto%; height: 34px;background: rgba(0, 0, 0, .4);color: #ffaaff" name="sifre" placeholder="Password" maxlength="20" >
										<input type="password" id="login_password" class="form-control" style="border-radius: 10px; margin-top: 10px; width: auto%; height: 34px;background: rgba(0, 0, 0, .4);color: #ffaaff" name="sifretekrar" placeholder="Password" maxlength="20" >
										<input id="login_username" class="form-control" style="border-radius: 10px; margin-top: 10px; width: auto%; height: 34px;background: rgba(0, 0, 0, .4);color: #ffaaff" name="eposta" placeholder="E-Posta" maxlength="40" value='<?=$_POST["eposta"]?>'>
										<input type="submit" style="width:100%;border-radius: 10px;margin-top: 10px;background: rgba(0, 0, 0, .4);color: #fff" class="btn btn-success btn-md login-btn" name="login_submit" id="login_submit" value="Register">
									</center>
									
								</form>		
							</div>
						
<?php
}
?>
