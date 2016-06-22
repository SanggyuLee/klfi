<?
$db = new PDO("mysql:dbname=okj_kfli;host=localhost", "okj_kfli", "wellmade0306");

function ensure_admin($id) {
	global $db;

	$temp = $id;
	$id = $db->quote($id);
	$result = $db->query("select password from kfli_class_info where id=$id");

	if($result->rowCount() > 0)
		return TRUE;

	return FALSE;
}

function get_admin_id() {
	global $db;

	$result = $db->query("select id from kfli_class_info");
	$result = $result->fetch();

	return $result['id'];
}

function get_admin_password() {
	global $db;

	$result = $db->query("select password from kfli_class_info");
	$result = $result->fetch();

	return $result['password'];
}

function set_admin_info($id, $password) {
	global $db;

	$id = $db->quote($id);
	$password = $db->quote($password);

	$result = $db->exec("update kfli_class_info set id=$id, password=$password where num=1");
}

function get_title() {
	global $db;

	$row = $db->query("select title from kfli_class_info");
	$row = $row->fetch();
	return $row['title'];
}

function set_title($new) {
	global $db;

	$new = $db->quote($new);
	$result = $db->exec("update kfli_class_info set title=$new where num=1");
}

function load($birth) {
	global $db;

	$birth = $db->quote($birth);
	$result = $db->query("select * from kfli_class where birth=$birth");
	if($result->rowCount() == 0)
		return FALSE;

	return $result;
}

function insert_csv($handle) {
	global $db;

	$db->exec("delete from kfli_class");
	do { 
		if ($data[0]) { 
			setlocale(LC_CTYPE, 'ko_KR.utf8'); 

			$num = addslashes($data[0]);
			$birth = addslashes($data[1]);
			$ku_num = addslashes($data[2]);
			$ko_name = addslashes($data[3]);
			$en_name = addslashes($data[4]);
			$class = addslashes($data[5]);
			$room = addslashes($data[6]);

			$birth = $db->quote($birth);
			$ku_num = $db->quote($ku_num);
			$ko_name = $db->quote($ko_name);
			$en_name = $db->quote($en_name);
			$class = $db->quote($class);
			$room = $db->quote($room);

			$query = "insert into kfli_class values($num, $birth, $ku_num, $ko_name, $en_name, $class, $room)";
			$db->exec($query);
		} 
	} while($data = fgetcsv($handle, 1000, ",", "'")); 
}

function verify_password($id, $password) {
	global $db;

	$id = $db->quote($id);
	$password = $db->quote($password);

	$result =$db->query("select * from kfli_class_info where id=$id and password=$password");
	
	if($result->rowCount() > 0)
		return TRUE;
	else
		return FALSE;
}
?>
