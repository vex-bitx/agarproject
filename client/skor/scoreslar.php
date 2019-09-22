<?
include("../dbconfig.php");
?>


<center>
<img style="margin-top:5%;" src="../img/kingofkings.png" alt="Top 15" title="Top 15"><div class="birinci"><span>
<style>
.birinci {
 
  color: rgba(255,255,255,1);
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 30px rgba(255,255,255,1) , 0 0 15px #FF0000 , 0 0 15px #FF0000 , 0 0 15px #FF0000 , 0 0 15px #FF0000 ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}

.ikinci {
 
  color: rgba(255,255,255,1);
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 8px rgba(255,255,255,1) , 0 0 8px #ff00de , 0 0 8px #ff00de , 0 0 8px #ff00de , 0 0 8px #ff00de ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}

.dort {
 
  color: rgba(255,255,255,1);
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 8px rgba(255,255,255,1) , 0 0 8px #0000ff , 0 0 8px #0000ff , 0 0 8px #0000ff , 0 0 8px #0000ff ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}

.bes {
 
  color: rgba(255,255,255,1);
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 8px rgba(255,255,255,1) , 0 0 8px #bfbf00 , 0 0 8px #bfbf00 , 0 0 8px #bfbf00 , 0 0 8px #bfbf00 ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}
</style>
<?
$sorgu_skor = $baglanti->yaz("SELECT * from skor order by skor desc LIMIT 0,1");
$i=1;
foreach($sorgu_skor as $bilgiler)
{
	echo"<div class='birinci'>
			<span style='margin-top:auto%; margin-left:auto%;float:auto;color: #fff'><td><img style='width:40px;height:40px' src='../img/1.gif' ><font size=3>".$bilgiler['oyuncuadi']." : ".$bilgiler['skor']."</font><img style='width:40px;height:40px' src='../img/1.gif' ></td></span>
			<hr/>
			</div>
            ";
$i++;			
}
?>
</span></div>
</center>

<?
$sorgu_skor = $baglanti->yaz("SELECT * from skor order by skor desc LIMIT 1,1");
foreach($sorgu_skor as $bilgiler)
{
	echo"<div class='ikinci'>
	
	         <span style='margin-top:0%; margin-left:3%;float:left;'><th><img style='width:35px;height:35px' src='../img/k1.png' id='img' align='top'></th></span>
             <span style='margin-top:0%; margin-left:3%;float:left;color: #fff'><td><font size=3>".$bilgiler['oyuncuadi']."</font></td></span>
             <span style='margin-top:0%; margin-right:3%;float:right;color: #fff'><td><font size=3>".$bilgiler['skor']."</font></td></span>
             <br>
             </div>
            ";	
}
?>


<?
$sorgu_skor = $baglanti->yaz("SELECT * from skor order by skor desc LIMIT 2,1");
foreach($sorgu_skor as $bilgiler)
{
	echo"<div class='dort'>
	
	         <span style='margin-top:0%; margin-left:3%;float:left;'><th><img style='width:32px;height:32px' src='../img/k2.png' id='img' align='top'></th></span>
             <span style='margin-top:0%; margin-left:3%;float:left;color: #fff'><td><font size=3>".$bilgiler['oyuncuadi']."</font></td></span>
             <span style='margin-top:0%; margin-right:3%;float:right;color: #fff'><td><font size=3>".$bilgiler['skor']."</font></td></span>
             <br>
             </div>
            ";	
}
?>

<?
$sorgu_skor = $baglanti->yaz("SELECT * from skor order by skor desc LIMIT 3,1");
foreach($sorgu_skor as $bilgiler)
{
	echo"<div class='bes'>
	
	         <span style='margin-top:0%; margin-left:3%;float:left;'><th><img style='width:32px;height:32px' src='../img/k3.png' id='img' align='top'></th></span>
             <span style='margin-top:0%; margin-left:3%;float:left;color: #fff'><td><font size=3>".$bilgiler['oyuncuadi']."</font></td></span>
             <span style='margin-top:0%; margin-right:3%;float:right;color: #fff'><td><font size=3>".$bilgiler['skor']."</font></td></span>
             <br>
             </div>
            ";	
}
?>

<?
$sorgu_skor = $baglanti->yaz("SELECT * from skor order by skor desc LIMIT 4,12");
$i=4;
foreach($sorgu_skor as $bilgiler)
{
	echo"<div style='margin-top:6%; ' class='topform-group clearfix' >
	
	         <span style='margin-top:-10%; margin-left:7%;float:left;color: #ff7f00'><td align=\"center\"><font size=3>".$i."</font></td></span>
             <span style='margin-top:-10%; margin-left:7%;float:left;color: #00ff00'><td><font size=3>".$bilgiler['oyuncuadi']."</font></td></span>
             <span style='margin-top:-10%; margin-right:3%;float:right;color: #00ffff'><td><font size=3>".$bilgiler['skor']."</font></td></span>
             </div>
            ";
$i++;			
}
?>

<div style="clear:both"></div>
