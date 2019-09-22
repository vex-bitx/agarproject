<?error_reporting(E_ALL ^ E_NOTICE);ob_start();session_start();
require_once("dbconfig.php");if($_SESSION["kullaniciadi"]){	$bilgiler = $baglanti->altekyaz("SELECT * from uyelik WHERE kullaniciadi=?",array($_SESSION["kullaniciadi"]));	$_SESSION["uyelikonay"] = $bilgiler["onay"];}

?>
<style>
*{margin:0;padding:0;font-family:arial;}
	
	#profilresmisec > input{
		width:100%;
		position:absolute;
		top:1px;
		left:1px;
		height:100%;
		opacity:0;
	}
	.skinsecbtn{
	}
</style>
<body>
			<div id="profil">									<?php			if($bilgiler["profil"]==1){			?>			<img align="left" style="width:320px; height:280px; border-radius: 10px; margin-top: 0px; border: 0px solid rgba(255, 170, 255, .2); " class="fb-image-profile" src="skins/<?=htmlspecialchars($bilgiler['id'], ENT_QUOTES)?>.png"/>			<?php			}else{			?>			<img align="left" style="width:320px; height:280px; border-radius: 10px; margin-top: 0px; border: 0px solid rgba(255, 170, 255, .2); " class="fb-image-profile" src="img/upload.png"/>			<?php			}			?>									</div>
					<script src="js/jquery-1.11.1.min.js"></script>
					<script src="js/jquery.form.js"></script>
					<script>
						var _0xe9ec=["\x73\x75\x62\x6D\x69\x74","\x23\x70\x72\x6F\x66\x69\x6C","\x61\x6A\x61\x78\x46\x6F\x72\x6D","\x23\x73\x65\x6C\x65\x63\x74\x65\x64\x53\x6B\x69\x6E","\x63\x68\x61\x6E\x67\x65","\x23\x72\x65\x73\x69\x6D"];$(function(){$(_0xe9ec[5])[_0xe9ec[4]](function(){$(_0xe9ec[3])[_0xe9ec[2]]({target:_0xe9ec[1]})[_0xe9ec[0]]()})})
					</script>
					<center>
					<form id="selectedSkin" enctype="multipart/form-data" method="post" action="profilresim.php">
						<div id="profilresmisec">
							<input type="file" name="resim" id="resim" class="inputext"/>
							<div class="skinsecbtn">
							</div>
						</div>
						
					</form>
					</center>
				</center>
</body>