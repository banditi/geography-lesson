<?
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://en.wikipedia.org/w/api.php?format=json&action=parse&page=".$_POST["page"]); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch); 
  curl_close($ch);
  echo $output;
?>