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

			hr {
				margin: 5px;
			}

			header {
				margin: auto;
				width: 100%;
				text-align: center;
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
				width: 30%;
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

			/* For device width 400px and larger: */
			@media only screen and (max-width: 400px) {
				h1 {
					font-size: 23px;
					text-align: center;
				}

				img {
					display: none;
				}

				img.smallscreen {
					display: inline;
				}
			}
		</style>
	</head>
	<body>
		<div class=main_logo align=center>
			<img src="img/authority_mark.jpg" class=largescreen>
			<img src="img/small_authority_mark.jpg" class=smallscreen>
		</div>

		<header>
			<h1>2016. 가을학기(163) 반편성 조회</h1>
			<hr>
			<p>
				생년월일 6자리를 입력하면 결과를 확인할 수 있습니다.
			</p>
		</header>

		<div class=login_form align=center>
			<form method=post action=load.php>
				<input type="text" name="date" placeholder="ex) 890507"/>
				<input type="submit" value="submit"/>
			</form>
			<?if($_GET["check"] == 1) echo "There's no infomation."; ?>
		</div>
	</body>
</html>
