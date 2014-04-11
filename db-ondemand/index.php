<a href="/dump/"><h2>DUMPs</h2></a>
<p></p>
<center>
<form action="" method="post">
	<input type=text 
	name="args" 
	value="<?php echo isset($_POST['args']) ? $_POST['args'] : ''; ?>"/>
	<button type="submit">Run</button><br>
	<input type=checkbox  
	name="dbonly"  
	value="dbonly" <?php echo isset($_POST['dbonly']) ? "checked" : ''; ?> > Databases only<br>
</form>
<h2>
<?php
$cmd = '/usr/bin/db-ondemand';
if(defined($_POST['dbonly']))
{

}
if (isset($_POST['args'])) {
 $args = escapeshellcmd ($_POST['args']);
 $cmd_to_exec = $cmd.' '.$args;
 exec("$cmd_to_exec 2>&1", $out);
   foreach($out as $line) {
		echo $line."<br>";
	} 
}
?>