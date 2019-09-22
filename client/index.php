<?
error_reporting(E_ALL ^ E_NOTICE);
ob_start();
session_start();
require_once("dbconfig.php");
if($_SESSION["kullaniciadi"])
{
	$bilgiler = $baglanti->altekyaz("SELECT * from uyelik WHERE kullaniciadi=?",array($_SESSION["kullaniciadi"]));
	$_SESSION["uyelikonay"] = $bilgiler["onay"];
}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Agario Private Server. agarzo best agarz pvp. Agario is an great 2d MMO Game. Agarzo Play modes, TeamPlay, Clans, Rainbow, Speed,">
<meta http-equiv="content-language" content="en">
<meta name="keywords" content="agarz, agarzo, oyna, agario, agar io, agar.io, agarlove, agariopvp, agario bis, agario private server, agario unblocked, agario skins, agario at school, агарио, agario chat, agario fantasy, agario experimental, agario ffa, agario game modes, agario gameplay, agario videos, agario pictures, agario how to play, agario game, game agario, play agario, agario play, agario speedy, agario news, united states, united kingdom, france, australia, canada, new zealand, denmark,">
<meta name="robots" content="index, follow">
<meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="Propellerads" content="814b63a004a7654f612fc4a9829ff82e">
<title>AgarLove Script v2</title>
<script type="text/javascript">
var _0x4e5a=["\x3C\x3F\x70\x68\x70\x20\x65\x63\x68\x6F\x20\x24\x63\x6F\x6E\x66\x69\x67\x5B","\x5D\x3B\x20\x3F\x3E"];var AGARIO_SERVER_HOST=_0x4e5a[0];host;_0x4e5a[1];var AGARIO_SERVER_URL=_0x4e5a[0];site;_0x4e5a[1];var AGARIO_SERVER_API=_0x4e5a[0];api;_0x4e5a[1]
</script>
<link id="favicon" rel="icon" type="image/png" href="img/favicon-32x32.png"/>
<link href="css/btsp.css?v=1.1.2" rel="stylesheet">
<link href="css/gscl.css?v=1.1.2" rel="stylesheet">
<link href="css/sty.css?v=1.1.8" rel="stylesheet">
<script src="https://apis.google.com/js/platform.js"></script>
<script type="text/javascript" src="js/jq.js?v=1.1.2"></script>
<script type="text/javascript" src="js/btsp.js?v=1.1.2"></script>
<script type="text/javascript" src="js/lg.js?v=1.1.2"></script>
</head>

<body>

<div id="overlays" style="display:none; position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 200;">
<div id="helloContainer" data-logged-in="0" data-has-account-data="0" data-party-state="0" data-results-state="0" data-gamemode="">

<div class="side-container">
<div class="warball-sol agario-side-panel">
<div class="clearfix" style="margin-bottom: 16px;">	
<center>
<?php if ($_SESSION['kullaniciadi']): ?>
<br>
<div class="form-group">
<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fragezonedotcom%2F&tabs=timeline&width=270&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=951628164954345" width="270" height="440" style="border-radius: 20px;border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>				
<?php else: ?>		
<?php
include("logreg/login.php");
include("logreg/register.php");
?>

<!--<div class="forregister">
Skin Upload For Register
</div>-->

<?php endif ?>
</center>	
</div>
</div>
</div>


<div id="mainPanel" class="warball-panel">
<form role="form">
<div class="form-group clearfix">

<center><h3>AgarLove Script v2</h3></center>

</div>

<div class="fb-profile">
<div class="form-group clearfix">

<li><a class="round green" onclick="setNick(document.getElementById('nick').value,document.getElementById('skin').value); return false;" align="left">PLAY<span class="round">PLAY</span></a></li>

<input id="nick" class="form-control" style="border-radius: 10px; margin-top: 10px; width: 65%; float:right;" placeholder="Nick" maxlength="12" <?php if(isset($bilgiler)){echo "disabled ";} ?>value='<?php if(isset($bilgiler)){ echo htmlspecialchars($bilgiler["oyuncuadi"], ENT_QUOTES);}?>'/>
<select onchange="setGameMode($(this).val());" class="btn btn-danger" style="border-radius: 10px; margin-top: -40px; width: 65%; float:right;background: rgba(0, 0, 0, .4);"id="gamemode">
<option value=':s1'>TEST SERVER</option>
</select>
</div>	

</div>


<?php if ($_SESSION['kullaniciadi']): ?>
<button id="spectateBtn" style="width:49%;background: rgba(0, 0, 0, .4);" onclick="spectate(); return false;" class="btn btn-warning">Spectate</button>				
<a href="logreg/logout.php" style="width:49%;background: rgba(0, 0, 0, .4);" class="btn btn-primary" title="agario" role="button">Exit</a>
<?php else: ?>		
<input type="submit" style="width:49%;background: rgba(0, 0, 0, .4);" onclick="ascii(); return false;" class="btn btn-primary" value="Fantasy" name="submit">
<button id="spectateBtn" style="width:49%;background: rgba(0, 0, 0, .4);" onclick="spectate(); return false;" class="btn btn-warning">Spectate</button>
<?php endif ?>

</form>

<br>

<?php if ($_SESSION['kullaniciadi']): ?>

<iframe id="selectedSkin1" border="0" frameborder="0" height="300" scrolling="no" src="yukle.php" width="100%"></iframe>
<input type="hidden" id="skin" class="form-control" placeholder="Skin Name" maxlength="10" value="<?php echo $bilgiler['id']; ?>">
<?php
if(isset($_GET["id"])){
$banla = $baglanti->alguncelle("update uyelik set profil=0 where id=?",array($_GET["id"]));
$resimal = $baglanti->altekyaz("select id from uyelik where id=?",array($_GET["id"]));
@unlink("skins/".$resimal["id"].".png");
header("location:/");
exit();
}
?>
<center><h5><a class="skindelete" href="?id=<?=$bilgiler["id"]?>.php">Skin DELETE / Skin SiL</a></h5></center>
<center><h5><a class="skindelete" href="/">Skin Refresh</a></h5></center>

<?php else: ?>	
<div class="form-group clearfix">
<img id="selectedSkin" align="left" style="width:320px; height:280px; border-radius: 20px; margin-top: 0px; border: 0px solid rgba(255, 170, 255, .2); " class="fb-image-profile" src="img/noavatar2.png"/>
<input type="hidden" id="skin" class="form-control" placeholder="Skin Name" maxlength="0" value="">
</div>
<?php endif ?>


</div>
<div id="stats" style="display: none;" class="warball-panel">
<h2><center><span data-itr="match_results"></span></center></h2>
<canvas id="statsGraph" width="400" height="250"></canvas>
<div id="statsPelletsContainer">
 
<span id="statsText" class="stats-food-eaten"></span>
<span id="statsSubtext" data-itr="stats_food_eaten"></span>
</div>
<div id="statsHighestMassContainer">
 
<span id="statsText" class="stats-highest-mass"></span>
<span id="statsSubtext" data-itr="stats_highest_mass"></span>
</div>
<div id="statsTimeAliveContainer">
 
<span id="statsText" class="stats-time-alive"></span>
<span id="statsSubtext" data-itr="stats_time_alive"></span>
</div>
<div id="statsTimeLeaderboardContainer">
 
<span id="statsText" class="stats-leaderboard-time"></span>
<span id="statsSubtext" data-itr="stats_leaderboard_time"></span>
</div>
<div id="statsPlayerCellsEatenContainer">
 
<span id="statsText" class="stats-cells-eaten"></span>
<span id="statsSubtext" data-itr="stats_cells_eaten"></span>
</div>
<div id="statsTopPositionContainer">
 
<span id="statsText" class="stats-top-position">?</span>
<span id="statsSubtext" data-itr="stats_top_position"></span>
</div>
<hr style="position:absolute;bottom:350px;width:100%;margin:0px;"/>
<button id="statsContinue" class="btn btn-primary" data-itr="continue" onclick="closeStats();"></button>

</div>

<div class="side-container">
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="scores">
<div class="warball-skor">
<div id="scoresx"></div>
</div>			   
</div>
</div>
</div>

</div>

<!--
<div class="topnav">
</div>
-->

<div class="tosBox">
<center>
|
<a style="color: #fff;" href="iletisim.txt">iletişim</a>
|
</center>
</div>
</div>

<div id="connecting" style="display: none; position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 100;">
<div class="connecting-panel" style="width: 350px; color: #e5e5e5; background-color: rgba(0, 0, 0, .8); margin: auto; border-radius: 30px; padding: 5px 15px 5px 15px;">
<h4>FULL GAME. Please try another server.</h4>
</div>
</div>


<div id="back">
</div>

<canvas id="canvas" width="800" height="600"></canvas>

<input type="text" id="chtbox" maxlength="50" placeholder="Enter Chat Message..."/>

<div class="hide_chatbox" style="display: block;">
<div style="float:left; margin-right:5px;" class="form-group2">
<input type="checkbox" onchange="setHideChat($(this).is(':checked'));" name="fancy-checkbox-primary" id="fancy-checkbox-primary" autocomplete="off" />
<div class="btn-group">
<label for="fancy-checkbox-primary" class="btn btn-primary">
<span class="glyphicon glyphicon-remove"></span>
<span class="glyphicon glyphicon-ok"></span>
</label>
<label for="fancy-checkbox-primary" class="btn btn-default active">
Chat Hide</label>
</div>
</div>

<div style="float:left; margin-right:5px;" class="form-group2">
<input type="checkbox" onchange="setDarkTheme($(this).is(':checked'));" name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off" />
<div class="btn-group">
<label for="fancy-checkbox-success" class="btn btn-success">
<span class="glyphicon glyphicon-ok"></span>
<span class="glyphicon glyphicon-remove"></span>
</label>
<label for="fancy-checkbox-success" class="btn btn-default active">
Black Theme</label>
</div>
</div>

<div style="float:left; margin-right:5px;" class="form-group2">
<input type="checkbox" onchange="setShowMass($(this).is(':checked'));" name="fancy-checkbox-warning" id="fancy-checkbox-warning" autocomplete="off" />
<div class="btn-group">
<label for="fancy-checkbox-warning" class="btn btn-warning">
<span class="glyphicon glyphicon-ok"></span>
<span class="glyphicon glyphicon-remove"></span>
</label>
<label for="fancy-checkbox-warning" class="[ btn btn-default active ]">
Scores</label>
</div>
</div>

<div style="float:left; margin-right:5px;" class="form-group2">
<input type="checkbox" onchange="setSkins(!$(this).is(':checked'));" name="fancy-checkbox-info" id="fancy-checkbox-info" autocomplete="off" />
<div class="btn-group">
<label for="fancy-checkbox-info" class="btn btn-info">
<span class="glyphicon glyphicon-ok"></span>
<span class="glyphicon glyphicon-remove"></span>
</label>
<label for="fancy-checkbox-info" class="[ btn btn-default active ]">
Anti Lag</label>
</div>
</div>
</div>

<div style="font-family:'Ubuntu'">&nbsp;</div>


<script src="js/cr1.js?v=1.2.2"></script>
<script src="js/map.js?v=1.2.5"></script>


<script type="text/javascript">
var _0xe0ae=["\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4A\x4B\x4C\x4D\x4E\x4F\x50\x52\x53\x54\x55\x56\x59\x5A\x57\x58\x51\x31\x32\x33\x34\x35\x36\x37\x38\x39\x30\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6A\x6B\x6C\x6D\x6E\x6F\x70\x72\x73\x74\x75\x76\x79\x7A\x77\x78\x71\x5F\x2D\x2E\x40","","\x73\x70\x6C\x69\x74","\x76\x61\x6C\x75\x65","\x6C\x65\x6E\x67\x74\x68","\x69\x6E\x64\x65\x78\x4F\x66","\x77\x69\x64\x74\x68","\x73\x63\x72\x65\x65\x6E","\x68\x65\x69\x67\x68\x74","\x67\x61\x6C\x6C\x65\x72\x79\x2F\x69\x6E\x64\x65\x78\x2E\x70\x68\x70","\x5F\x62\x6C\x61\x6E\x6B","\x68\x65\x69\x67\x68\x74\x3D\x36\x35\x30\x2C\x77\x69\x64\x74\x68\x3D\x31\x31\x30\x30\x2C\x20\x73\x74\x61\x74\x75\x73\x3D\x6E\x6F\x2C\x74\x6F\x6F\x6C\x62\x61\x72\x3D\x6E\x6F\x2C\x6D\x65\x6E\x75\x62\x61\x72\x3D\x6E\x6F\x2C\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3D\x6E\x6F\x2C\x6C\x65\x66\x74\x3D","\x2C\x74\x6F\x70\x3D","\x2C\x73\x63\x72\x65\x65\x6E\x58\x3D","\x2C\x73\x63\x72\x65\x65\x6E\x59\x3D","\x6F\x70\x65\x6E","\x65\x6D\x6F\x6A\x2F\x65\x6D\x6F\x6A\x69\x2E\x70\x68\x70","\x41\x73\x63\x69\x69\x4E\x69\x63\x6B\x47\x65\x6E\x65\x72\x61\x74\x6F\x72","\x74\x6F\x6F\x6C\x62\x61\x72\x3D\x6E\x6F\x2C\x64\x69\x72\x65\x63\x74\x6F\x72\x69\x65\x73\x3D\x6E\x6F\x2C\x6D\x65\x6E\x75\x62\x61\x72\x3D\x6E\x6F\x2C\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3D\x6E\x6F\x2C\x73\x63\x72\x6F\x6C\x6C\x62\x61\x72\x73\x3D\x79\x65\x73\x2C\x72\x65\x73\x69\x7A\x61\x62\x6C\x65\x3D\x6E\x6F\x2C\x73\x74\x61\x74\x75\x73\x3D\x6E\x6F\x2C\x6C\x65\x66\x74\x3D","\x2C\x77\x69\x64\x74\x68\x3D","\x2C\x68\x65\x69\x67\x68\x74\x3D","\x73\x6C\x6F\x77","\x66\x61\x64\x65\x49\x6E","\x73\x6B\x6F\x72\x2F\x73\x63\x6F\x72\x65\x73\x6C\x61\x72\x2E\x70\x68\x70","\x6C\x6F\x61\x64","\x23\x73\x63\x6F\x72\x65\x73\x78","\x72\x65\x61\x64\x79","\x66\x61\x64\x65\x4F\x75\x74","\x67\x61\x6D\x65\x6D\x6F\x64\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x72\x61\x6E\x64\x6F\x6D","\x6F\x70\x74\x69\x6F\x6E\x73","\x66\x6C\x6F\x6F\x72","\x73\x65\x6C\x65\x63\x74\x65\x64","\x6F\x6E\x63\x68\x61\x6E\x67\x65"];function karakterfiltre(_0x50c2x2){var _0x50c2x3= new String();var _0x50c2x4=_0xe0ae[0];var _0x50c2x5=_0x50c2x2[_0xe0ae[3]][_0xe0ae[2]](_0xe0ae[1]);for(i= 0;i< _0x50c2x5[_0xe0ae[4]];i++){if(_0x50c2x4[_0xe0ae[5]](_0x50c2x5[i])!=  -1){_0x50c2x3+= _0x50c2x5[i]}};if(_0x50c2x2[_0xe0ae[3]]!= _0x50c2x3){_0x50c2x2[_0xe0ae[3]]= _0x50c2x3}}function openWindow(){var _0x50c2x7;var _0x50c2x8;_0x50c2x7= (window[_0xe0ae[7]][_0xe0ae[6]]/ 2)- (550+ 10);_0x50c2x8= (window[_0xe0ae[7]][_0xe0ae[8]]/ 2)- (400+ 50);window[_0xe0ae[15]](_0xe0ae[9],_0xe0ae[10],_0xe0ae[11]+ _0x50c2x7+ _0xe0ae[12]+ _0x50c2x8+ _0xe0ae[13]+ _0x50c2x7+ _0xe0ae[14]+ _0x50c2x8)}function ascii(){f= 780;m= 600;h= screen[_0xe0ae[6]]/ 2- f/ 2;k= screen[_0xe0ae[8]]/ 2- m/ 2;this[_0xe0ae[15]](_0xe0ae[16],_0xe0ae[17],_0xe0ae[18]+ h+ _0xe0ae[12]+ k+ _0xe0ae[19]+ f+ _0xe0ae[20]+ m+ _0xe0ae[1])}$(document)[_0xe0ae[26]](function(){$(_0xe0ae[25])[_0xe0ae[24]](_0xe0ae[23])[_0xe0ae[22]](_0xe0ae[21])});var refreshId=setInterval(function(){$(_0xe0ae[25])[_0xe0ae[27]](_0xe0ae[21])[_0xe0ae[24]](_0xe0ae[23])[_0xe0ae[22]](_0xe0ae[21])},120000);$(document)[_0xe0ae[26]](function(){var _0x50c2xb=document[_0xe0ae[29]](_0xe0ae[28]);var _0x50c2xc=Math[_0xe0ae[32]](Math[_0xe0ae[30]]()* (_0x50c2xb[_0xe0ae[31]][_0xe0ae[4]]- 0));_0x50c2xb[_0xe0ae[31]][_0x50c2xc][_0xe0ae[33]]= true;_0x50c2xb[_0xe0ae[34]]()})
</script>

</body>
</html>
