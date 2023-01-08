<?php 
	
	echo $_POST['voteid']."<br>";
	echo $_POST['electionid']."<br>";

	if (isset($_POST['voteid'])) {
		echo '<script type="text/javascript">',
			'changeActivity(1,"Success.");',
		 '</script>';
	}

?>