<?php
	/*
		Chromeセパレータ
	*/
	mb_internal_encoding('UTF-8');

	if(!isset($_REQUEST['s']) || !$_REQUEST['s']){
		$s = '-';
	}else{
		$s = $_REQUEST['s'];
		if(mb_strlen($s) > 1000){
			$s = mb_substr($s, 0, 1000);
		}
	}
	
	if(!isset($_REQUEST['c']) || !ctype_digit($_REQUEST['c'])){
		$c = 50;
	}else{
		$c = (int)$_REQUEST['c'];
		if($c < 1){ $c = 1; }
		if($c > 1000){ $c = 1000; }
	}
	
	$str = str_repeat($s, $c);
	if(mb_strlen($str) > 1000){
		$str = mb_substr($str, 0, 1000);
	}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?=htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); ?></title>
	<link type="text/css" rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/humanity/jquery-ui.css" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$('input').addClass("ui-widget ui-state-default ui-corner-all");
		$('#form_input_reset').on('click', function(){
			location.href = "?";
		});
	});
	</script>
	<style type="text/css">
		html{
			background-color:AliceBlue;
		}
		#form_tag{
			margin:1em;
		}
		.form_input_text{
			margin:1em;
			width:30em;
		}
		.form_input_submit{
			margin:1em;
		}
		.hoge{
			margin:1em;
			margin-bottom:3em;
		}
	</style>
</head>
<body>
	
	<h2>Chromeセパレータ</h2><br />
	
	<div class="hoge">
		<h3>↓せつめい↓</h3>
		<div class="hoge">
			Q：ここはなに？<br />
			A：Chromeブラウザで、自由に区切り線を入れられるよ！<br />
		</div>
	</div>
	
	<div class="hoge">
		<h3>↓つかいかた↓</h3>
			<img src="drag.png" border="1">
			<ol>
				<li>アイコンを、セパレータを入れたいところにドラッグします。
				<li>完了！
				<li>下のフォームから、区切り線を自作もできるよ！
			</ul>
	</div>
	
	<div class="hoge">
		<h3>↓区切り線を変更できるよ↓</h3>
		<form method="get" enctype="multipart/form-data" action="" id="form_tag">
			<div class="form_text">
				区切りに使いたい文字列を入力
			</div>
			<div class="form_input">
				<input type="text" name="s" value="<?=htmlspecialchars($s, ENT_QUOTES, 'UTF-8');?>"
					maxlength="100" class="form_input_text">
			</div>
			<div class="form_text">
				区切り線の繰り返し数を入力
			</div>
			<div class="form_input">
				<input type="text" name="c" value="<?=htmlspecialchars($c, ENT_QUOTES, 'UTF-8');?>"
					maxlength="4" class="form_input_text">
			</div>
			<div class="form_input">
				<input type="submit" name="submit" value="変更する！" class="form_input_submit">
				<input type="button" name="reset" value="リセット" class="form_input_submit" id="form_input_reset">
			</div>
		<form>
	</div>
	
</body>
</html>

