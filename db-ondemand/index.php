<h2>
<a href="/dump/">DUMPs</a>
<p></p>
<center>
<table>
<tr>
<td>
<form action="" method="post">
	Databases only:<br>
	<input type=text name="args" value="<?php echo isset($_POST['args']) ? $_POST['args'] : ''; ?>"/>
	<button type="submit">Run</button>
</form>
</td>
<td width="20%">
</td>
<td>
<form action="" method="post">
	Database + tables:<br>
	<input type=text name="args" value="<?php echo isset($_POST['args']) ? $_POST['args'] : ''; ?>"/>
	<button type="submit">Run</button>
</form>
</td>
</tr>
<?php
$cmd = '/usr/bin/db-ondemand';
$again = '<button onclick="window.location.reload()">Try again</button>';
if (isset($_POST['args'])) {
 $args = escapeshellcmd ($_POST['args']);
 $cmd_to_exec = $cmd.' '.$args;
 exec("$cmd_to_exec 2>&1", $out);
   foreach($out as $line) {
		echo $line."<br>";
	} 
}
?>