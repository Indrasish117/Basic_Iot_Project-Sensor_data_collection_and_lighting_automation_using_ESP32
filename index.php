<!DOCTYPE html>
<html>
<head>
	<title>My Project - RGY</title>
	<style>
		a {
			text-align: center;
  			padding: 14px 16px;
  			text-decoration: none;
  			font-size: 17px;
  			margin: 10px;
  			color: white;
		}

		a:hover {
 			background-color: #ddd;
  			color: black;
		}

		div {
			border: 3px solid blue;
			margin-top: 25px;

		}

	</style>
</head>
<body>
	<center>
		<br><br>
		<a href="project_api.php?colour=1" style="background-color: red">RED</a>
		<a href="project_api.php?colour=2" style="background-color: yellow">YELLOW</a>
		<a href="project_api.php?colour=3" style="background-color: green">GREEN</a>
	</center>
	<div>
		<?php 

			$file = fopen("data_B", "r") or die("Unable to open file");
			$data = fread($file, filesize("data_B"));
			$array = explode("\n",$data);
			foreach($array as $i)
				echo "<h4>The analog pin reading is:".$i."</h4>";
	
			fclose($file);
		?>
	</div>
</body>
</html>