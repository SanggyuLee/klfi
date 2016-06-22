<?
if(!isset($_SESSION))
	session_start();

if(!isset($_SESSION['admin'])) {
	$_SESSION['flash'] = "잘못된 접근입니다.";
	header('Location: main.php');
}

include('db.php');
$title = get_title();

if($_FILES[csv][size] > 0) { 
	$file = $_FILES[csv][tmp_name]; 

	$fileinfo = pathinfo($_FILES[csv][name]);
	if($fileinfo['extension'] != 'csv') {
		header('Location: admin.php?fail=1');
		die;
	}

	$handle = fopen($file, "r"); 

	insert_csv($handle);

	header('Location: admin.php?success=1');
	die; 
}

if(isset($_POST['title'])) {
	set_title($_POST['title']);
	$title = $_POST['title'];
	unset($_POST['title']);
}

if(isset($_POST['id'])) {
	if($_POST['id'] == null || $_POST['password'] == null) {
		header('Location: admin.php?null=1');
		die;
	}

	set_admin_info($_POST['id'], $_POST['password']);
	unset($_POST['id']);
	unset($_POST['password']);
	header('Location: admin.php');
}

?> 

<html> 
	<meta charset='utf-8'>
	<head> 
		<title>Admin Page</title> 
	</head> 

	<body> 

		<?
		if (!empty($_GET['success'])) {
			echo "<b>Your file has been imported.</b><br><br>"; 
		} else if(!empty($_GET['fail'])) {
			echo "<b>Only csv file is allowed.</b><br><br>";
		}
		?> 

		<form action="" method=post enctype="multipart/form-data" name=form id=form> 
			Choose your file: <br /> 
			<input name=csv type=file id=csv style='width:300px;'/> 
			<input type=submit name=submit value=save /> 
		</form> 

		<form action="" method=post>
			Set the title of website: <br />
			<input name=title type=text value="<?=$title?>" style='width:300px;'/>
			<input type=submit name=submit value=save />
		</form>

		<?
		if (!empty($_GET['null'])) {
			echo "<b>Please type admin id and password.</b><br><br>"; 
		} 
		?> 

		<form action="" method=post>
			Change the admin information: <br />
			ID : <input name=id type=text value="<?echo get_admin_id();?>" />
			PW : <input name=password type=password value="<?echo get_admin_password();?>" />
			<input type=submit name=submit value=save />
		</form>
	</body> 
</html> 
