<?php 

	if(!empty($_GET['colour'])&&is_numeric($_GET['colour'])&&empty($_GET['read'])&&(($_GET['colour'])>=1||($_GET['colour'])<=3))
	{
		$file = fopen("data_A", "w");
		fwrite($file, $_GET['colour']);
		fclose($file);
		header("Location: index_new.html");
	}
	else if(!empty($_GET['read'])&&empty($_GET['colour'])&&($_GET['read'])==1)
	{
  		$file = fopen("data_A", "r");
  		$data = fread($file, filesize("data_A"));
  		fclose($file);

  		if($data=='1'||$data=='2'||$data=='3')
    		echo $data;
  		else 
	    	echo "Error";
	}
	else if(!empty($_GET['value'])&&is_numeric($_GET['value'])){
		date_default_timezone_set("Asia/Kolkata");
		$file = fopen("data_B","a");
		$t = time();
  		fwrite($file, $_GET['value']." - ".date("h:i:sA d-m-y", $t)."<br>");
  		fclose($file);
  		print("Success!!");
  	}
  	else
  	{
  		echo "Error!!";
  	}


 ?>