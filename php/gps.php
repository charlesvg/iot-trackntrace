<?php

//file_put_contents("post.log",print_r($_POST,true));

if( $_POST )
{
  $con = mysql_connect("localhost","adminiXYsIE9","IWvPxqGN-eBQ");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("php", $con);

	/*
  $utc = mysql_real_escape_string($_POST['utc']);
  $lat = mysql_real_escape_string($_POST['lat']);
  $lon = mysql_real_escape_string($_POST['lon']);
  $alt = mysql_real_escape_string($_POST['alt']);
  $spd = mysql_real_escape_string($_POST['spd']);
  $crs = mysql_real_escape_string($_POST['crs']);
  * */
  
  $date = DateTime::createFromFormat('YmdHis.u', "20160417175759.000",new DateTimeZone('UTC'));
  echo $date->format("Y-m-d H:i:s");
  
  $utc = mysql_real_escape_string($date->format("Y-m-d H:i:s"));
  $lat = mysql_real_escape_string('1.1');
  $lon = mysql_real_escape_string('1.2');
  $alt = mysql_real_escape_string('1.3');
  $spd = mysql_real_escape_string('1.4');
  $crs = mysql_real_escape_string('1.5');
  
  

  $query = "INSERT INTO GPS_LOG (utc,lat,lon,alt,spd,crs) values ('$utc','$lat','$lon','$alt','$spd','$crs')";
  
  mysql_query($query);
  mysql_close($con);
  
  
  
  
  echo "OK";
}
?>
