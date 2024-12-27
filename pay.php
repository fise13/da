<?php
include('hyst/php.php');

$SITE_TITLE = 'Моторленд | Оплата';
?>
<!doctype html>
<html>
<head>
	<?php include("hyst/head.php"); ?>
</head>
<body>
<?php include("hyst/sbody.php"); ?>
<?php include("des/head.php"); ?>
<br><br>
<div class="generalw">
	<div class="shirina">
		<div class="crumbsblock">
		<a href="/">Главная</a> / Оплата
		</div>
		
	</div>
</div>


<div class="generalw">
	<div class="shirina zgolovorleft">
		<div class="sttitle"><span>Оплата</span></div>
	</div>
</div>

<div class="generalw">
	<div class="shirina">
		<div class="aboutblock1">
			<div class="abouttext1">
			<?=get_customtexts('payment_page');?>
			</div>
		</div>
	</div>
</div>

<br><br>
<?php include("des/foter.php"); ?>
<?php include("hyst/fbody.php"); ?>
</body>
</html>