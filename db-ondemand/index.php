<a href="/dump/"><h2>DUMPs</h2></a>
<p></p>
<center>
<table>
<form action="" method="post"><tr><td>
	<input type=text 
	size="80"
	name="args" 
	value="<?php echo isset($_POST['args']) ? $_POST['args'] : ''; ?>"/>
	<button type="submit">Run</button><br></tr><tr>
	<td align=left>
	
	<input type=radio  
	name="options"  
	checked="checked"
	value="nooptions" <?php echo (isset($_POST['options']) && $_POST['options'] == '') ? "checked" : ''; ?> >
	 No options
	<br>
	
	<input type=radio  
	name="options"  
	value="dbonly" <?php echo (isset($_POST['options']) && $_POST['options'] == 'dbonly') ? "checked" : ''; ?> >
	 Воспринимать введенное как имена баз
	<br>
	<input type=radio  
	name="options"  
	value="nolimit" <?php echo (isset($_POST['options']) && $_POST['options'] == 'nolimit') ? "checked" : ''; ?> >
	 Disable "LIMIT 10000"</td></tr>
</form>
</table>
<h2>

<?php
if(isset($_POST['options']) && $_POST['options'] == 'dbonly') {
	$cmd = '/usr/bin/db-ondemand dbonly';
} elseif(isset($_POST['options']) && $_POST['options'] == 'nolimit') {
	$cmd = '/usr/bin/db-ondemand nolimit';
} else {
	$cmd = '/usr/bin/db-ondemand';
}

if (isset($_POST['args'])) {
 	$args = escapeshellcmd ($_POST['args']);
 	$cmd_to_exec = $cmd.' '.$args;
	echo "<!-- $cmd_to_exec.<br -->";
	exec("$cmd_to_exec 2>&1", $out);
	foreach($out as $line) {
		echo $line."<br>";
	} 
}
?>
