<?
$db = new PDO("mysql:dbname=klfi;host=localhost", "root", "master123");

$date = $db->quote($_POST["date"]);
$rows = $db->query("select * from students where date=$date");
?>
<table border=1>
	<tr>
		<th>No.</th>
		<th>Date</th>
		<th>Name</th>
		<th>Class</th>
		<th>Room</th>
	</tr>
	<?
	foreach($rows as $row) {
		list($number, $date, $name, $class, $room) = $row; ?>
		<tr>
			<td><?=$number?></td>
			<td><?=$date?></td>
			<td><?=$name?></td>
			<td><?=$class?></td>
			<td><?=$room?></td>
		</tr>
	<?
	}
	?>
</table>
