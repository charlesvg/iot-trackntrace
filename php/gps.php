<?php

//file_put_contents("post.log",print_r($_POST,true));

if( $_POST )
{

	$link = mysqli_connect("localhost", "adminiXYsIE9", "IWvPxqGN-eBQ", "php");
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

  $date = DateTime::createFromFormat('YmdHis.u', $_POST['utc'],new DateTimeZone('UTC'));
  //echo $date->format("Y-m-d H:i:s");
  
  $utc = $link->real_escape_string($date->format("Y-m-d H:i:s"));
  $utc = $link->real_escape_string($_POST['utc']);
  $lat = $link->real_escape_string($_POST['lat']);
  $lon = $link->real_escape_string($_POST['lon']);
  $alt = $link->real_escape_string($_POST['alt']);
  $spd = $link->real_escape_string($_POST['spd']);
  $crs = $link->real_escape_string($_POST['crs']);
  
  

  $query = "INSERT INTO gps_log (utc,lat,lon,alt,spd,crs) values ('$utc','$lat','$lon','$alt','$spd','$crs')";
  //echo $query;
  mysqli_query($link,$query);
  mysqli_commit($link);
  mysqli_close($link);

  echo "OK";
}
?>
