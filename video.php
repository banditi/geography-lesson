<?
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://gdata.youtube.com/feeds/api/users/ExpozaTravel/uploads?q=".$_POST["country"]."&v=2&alt=json"); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch); 
  curl_close($ch);
  echo $output;
 ?>