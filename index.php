<?php
include('hyst/php.php');

$SITE_TITLE = 'Моторленд | Контрактные Моторы и КПП';
?>
<!doctype html>
<html>
<head>
<?php include("hyst/head.php"); ?>
</head>
<body>
<?php include("hyst/sbody.php"); ?>
<?php include("des/head.php"); ?>

<div class="slider">
	<div id="slidess">
		<?php
		$slider = get_slider ('index_slider');
		while($slide=$slider->fetch_array()):
		?>
		<div class="sliderslid" style="background-image: url(<?=$slide['image'];?>);"></div>
		<?php
		endwhile;
		?>
	</div>
	<script>
		function slider () {
			var cil = $("#slidess").children('div').length - 1;
			var cur = 0;
			$("#slidess").children('div').each(function(index, element){	
				if ($(element).css('display') == 'block') {
				cur = index;
				}	
			});
			
			if (cur >= cil) { cur = 0; } else { cur++; }
			
			$("#slidess").children('div').each(function(index, element){	
				if ($(element).css('display') == 'block') { $(element).fadeOut(500); }
				if (cur == index) {
				$(element).fadeIn(500);
				}	
			});
			
			setTimeout(function() { slider () }, 3000);
		}
		
		setTimeout(function() { slider () }, 3000);
		</script>
	<div class="slidercoun shirina">
					
		<div class="titlephon"><?=get_simple_texts ('index_slider_title');?></div>
		<div class="sliderbtns"><a href="tel:<?=get_simple_texts ('index_slider_phone');?>" class="phone"><?=get_simple_texts ('index_slider_phone');?></a><br><a href="catalog.php"><div class="atalogb">Каталог</div></a></div>
		<div class="sliderform">что ищем?
		
		
		<!---
		<form method="get" action="catalog.php">
		<input type="text" name="mk" placeholder="Марка" list="makrlist" id="idmark">
			<datalist id="makrlist">
			</datalist>
		<input type="text" name="nl" placeholder="Модель" list="modellist" id="idmode">
			<datalist id="modellist">
			</datalist>
		<input type="text" name="yr" placeholder="Год" list="yearlist" id="idyear">
			<datalist id="yearlist">
			</datalist>
		<input type="submit" name="sear" value=" ">
		</form>--->
			
		<form method="get" action="catalog.php">
			<!--<input type="text" name="setxt" class="searchbloinput" placeholder="Что вы хотели найти.."><br>--->
		
			<div class="maipttee">
				<div class="meinputer"><div class="madiv" data-val="Марка">Марка</div>
					<input type="hidden" name="mk">
					<div class="btmmearrow">&#9660;</div>
					<div class="ddwnblock">
						<?php
						$sql = $_DB_CONECT->query("SELECT * FROM internet_magazin_category WHERE idp='noting' ORDER BY name ASC");
						if ($sql->num_rows != 0) {
						while($get = $sql->fetch_array()):
						?>
						<div data-id="<?=$get['id'];?>"><?=$get['name'];?></div>
						<?php
						endwhile;
						}
						?>
					</div>
				</div>
				
				<div class="meinputer"><div class="madiv" data-val="Модель">Модель</div>
					<input type="hidden" name="ml">
					<div class="btmmearrow">&#9660;</div>
					<div class="ddwnblock" id="modellist"></div>
				</div>
				
				<div class="meinputer"><div class="madiv">Год</div>
					<input type="hidden" name="yr">
					<div class="btmmearrow">&#9660;</div>
					<div class="ddwnblock" id="yearlist" style="overflow-y: scroll;"></div>
				</div>
			</div>
			<input type="submit" name="sear" value=" ">
		</form>
		</div>
	</div>
</div>

<div class="generalw forsbgf">
	<div class="shirina forsliderform">
		Хотите получить бесплатную консультацию? <div>заполните форму</div>
		<form method="post">
		<input type="text" name="name" placeholder="имя">
		<input type="text" name="phon" placeholder="телефон">
		<input type="submit" name="send" value="Отправить">
		</form>
	</div>
</div>

<div class="generalw">
	<div class="shirina zgolovorleft">
		<div class="sttitle"><span>О нас</span></div>
	</div>
</div>

<div class="generalw">
	<div class="shirina">
		<div class="aboutblock">
			<div class="sssskartins revealator-slideright" style="background-image: url(<?=get_simple_images('index_about_image')[0];?>);"></div>
			<div class="abouttext revealator-slideleft">
			<?=get_customtexts('index_about_text');?>
			</div>
		</div>
	</div>
</div>

<div class="generalw">
	<div class="shirina zgolovorright">
		<div class="sttitle"><span>Акции</span></div>
	</div>
</div>

<div class="generalw frayalpfhon">
	<div class="shirina">
		<ul class="actionbtms">
			<li class="liacactive" data-typ="ac">Каталог</li>
			<li data-typ="ca">Акции</li>
		</ul>
	</div>
</div>

<div class="generalw">
	<div class="shirina">
		<br>
		<div id="actionb">
			<?php
			$tmp = $_DB_CONECT->query("SELECT * FROM internet_magazin_tovari ORDER BY prio ASC LIMIT 4");
			while($get=$tmp->fetch_array()):
			?>
			<div class="toverblock">
			<a href="/detal?id=<?=$get['id'];?>"><div class="toverimg" style="background-image: url(<?=get_farrimg($get['images'])[0];?>);">
			<?php if ($get['sale'] != 'noting') { ?>
			<div class="cationsale"><?=$get['sale'];?></div>
			<?php } ?>
			</div></a>
			<div class="tovertitle"><?=$get['name'];?></div>
			<div class="tovaropis">
				<?=$get['stext'];?>
			</div>
			<div class="tovercena"><?=($get['cash']!=0?$get['cash'].' KZT':'Цена по запросу');?></div>
			<div class="toverbuton" data-nam="<?=$get['name'];?>">Купить</div>
			</div>
			<?php
			endwhile;
			?>
		</div>
		<div id="goodsb" style="display: none;">
			<?php
			$tmp = $_DB_CONECT->query("SELECT * FROM internet_magazin_tovari WHERE sale != 'noting' ORDER BY prio ASC LIMIT 4");
			while($get=$tmp->fetch_array()):
			?>
			<div class="toverblock revealator-slideup">
			<a href="/detal?id=<?=$get['id'];?>"><div class="toverimg" style="background-image: url(<?=get_farrimg($get['images'])[0];?>);">
			<?php if ($get['sale'] != 'noting') { ?>
			<div class="cationsale"><?=$get['sale'];?></div>
			<?php } ?>
			</div></a>
			<div class="tovertitle"><?=$get['name'];?></div>
			<div class="tovaropis">
				<?=$get['stext'];?>
			</div>
			<div class="tovercena"><?=($get['cash']!=0?$get['cash'].' KZT':'Цена по запросу');?></div>
			<div class="toverbuton" data-nam="<?=$get['name'];?>">Купить</div>
			</div>
			<?php
			endwhile;
			?>			
		</div>
		<br>
		<br>
		<a href="/catalog"><div class="okazatybolsh">Показать больше</div></a>
		<br>
		<br>
	</div>
</div>

<?php include("des/foter.php"); ?>
<?php include("hyst/fbody.php"); ?>
</body>
</html>