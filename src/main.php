<?
include('db.php');
if(!isset($_SESSION))
	session_start();

$title = get_title();
?>
<html>
 	<meta charset="UTF-8"> 
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'/>
		<link href='http://fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'/>
		<style>
			* {
				margin: 0;
				padding: 0;
				font-family: "Product Sans";, "Noto Sans KR";, Arial, sans-serif;
			}

			h1 {
				color: #169F40;
			}

			hr {
				margin: 5px;
			}

			header {
				margin: auto;
				width: 100%;
				text-align: center;
			}

			footer {
				padding: 10px;
				width: 100%;
				font-size: 18px;
				text-align: center;
				position: absolute;
				bottom: 0;
				color: #169F40;
			}

			p {
				color: black;
			}

			div.main_logo {
				margin: 20px auto;
				width: 80%;
				padding: 10px;
			}

			div.login_form {
				padding: 20px;
			}

			img.largescreen {
				vertical-align: middle;
			}

			img.smallscreen {
				display: none;
			}

			input[type=text] {
				width: 200px;
				font-size: 25px;
				margin: 10px;
			}

			input[type=submit] {
				font-size: 20px;
				height: 20px;
			}

			.triangle {
				border-color:transparent transparent transparent #169F40;
				display:inline-block; 
				width:0; 
				height:0;
				border-style:solid;
				border-width:7px;
			}

			@media only screen and (max-width: 400px) {
				h1 {
					font-size: 23px;
					text-align: center;
					color: #169F40;
				}

				img {
					display: none;
				}

				img.smallscreen {
					vertical-align: middle;
					margin: 5px;
					display: inline;
				}
			}
		</style>
	</head>
	<body>
		<div class=main_logo align=center>
			<img src="../img/authority_mark.jpg" class=largescreen>
			<img src="../img/small_authority_mark.jpg" class=smallscreen>
		</div>

		<header>
			<h1><?=$title?></h1>
			<hr>
			<p>
				<span class=triangle></span>
				생년월일 6자리를 입력하세요. <br>

				<span class=triangle></span>
				Enter your date of birth. <br>
			</p>
		</header>

		<div class=login_form align=center>
			<form method=post action=load.php>
				<input type="text" name="birth" placeholder="ex) 890507"/>
				<input type="submit" value="submit"/>
			</form>
			<? 
			if(isset($_SESSION['flash'])) {
				echo $_SESSION['flash'];
				unset($_SESSION['flash']);
			}
			?>
		</div>

		<footer align=center>
			<img src="../img/ui_eng.gif" class=largescreen>
			<img src="../img/small_ui_eng.gif" class=smallscreen>
			<strong>건국대학교 언어교육원</strong>
		</footer>
	</body>
</html>
