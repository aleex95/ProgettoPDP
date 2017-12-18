<?php
	$connect=mysqli_connect('localhost','root','','pdp_alunni');
	if (mysqli_connect_errno($connect)) {
		echo 'Failed to connect';
	}
?>