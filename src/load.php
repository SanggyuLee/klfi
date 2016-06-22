<?
include('db.php');
if(!isset($_SESSION))
	session_start();

if(ensure_admin($_POST['birth'])) {
	$id = $_POST['birth'];
	header("Location: password.php?id=$id");
	die;
}

$result = load($_POST['birth']);
if($result == FALSE) {
	$_SESSION['flash'] = "해당 정보가 존재하지 않습니다.";
	header('Location: main.php');
}

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
				margin: auto;
				padding: 0;
				font-family: "Product Sans";, "Noto Sans KR";, Arial, sans-serif;
			}

			h1 {
				color: #169F40;
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
				color: #169F40;
			}

			p {
				color: black;
			}

			td {
				padding: 10px;
			}

			th {
				text-align: left;
				padding: 10px;
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
			<?
			foreach($result as $row) {
				list($num, $birth, $ku_num, $ko_name, $en_name, $class, $room) = $row;
			?>
			<hr>
			<table>
				<tr>
					<th>
						<span class=triangle></span>
						KL No.
					</th>
					<td>
						<?=$ku_num?>
					</td>
				</tr>

				<tr>
					<th>
						<span class=triangle></span>
						Birth
					</th>
					<td>
						<?=$birth?>
					</td>
				</tr>

				<tr>
					<th>
						<span class=triangle></span>
						Korean Name
					</th>
					<td>
						<?=$ko_name?>
					</td>
				</tr>

				<tr>
					<th>
						<span class=triangle></span>
						English Name
					</th>
					<td>
						<?=$en_name?>
					</td>
				</tr>

				<tr>
					<th>
						<span class=triangle></span>
						Class
					</th>
					<td>
						<?=$class?>
					</td>
				</tr>

				<tr>
					<th>
						<span class=triangle></span>
						Room
					</th>
					<td>
						<?=$room?>
					</td>
				</tr>
			</table>
			<?
			}
			?>
		</header>

		<footer align=center>
			<img src="../img/ui_eng.gif" class=largescreen>
			<img src="../img/small_ui_eng.gif" class=smallscreen>
			<strong>건국대학교 언어교육원</strong>
		</footer>
	</body>
</html>
