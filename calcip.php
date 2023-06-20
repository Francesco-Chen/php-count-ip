<?php
$ip_num = sprintf("%u", ip2long($ip));

$fp = fopen('ip2asn-v4.tsv', 'r');
$tot = 0;
$it = 0;
$cn = 0;
$us = 0;
settype($tot, "integer"); 
while (($line = fgets($fp)) !== false) {
  list($start, $end, $asn, $country) = explode("\t", $line);
  $start_num = sprintf("%u", ip2long($start));
  $end_num = sprintf("%u", ip2long($end));

  if($asn > 0){
  	$tot = $tot + ($end_num - $start_num) + 1;
  }
  if($country == "IT"){
  	$it = $it + ($end_num - $start_num) + 1;
  }
  if($country == "CN"){
  	$cn = $cn + ($end_num - $start_num) + 1;
  }
  if($country == "US"){
    $us = $us + ($end_num - $start_num) + 1;
  }
 
}
echo "Total routable ip address: $tot <br>";
echo "ITALY routable ip address: $it <br>";
echo "CHINA routable ip address: $cn <br>";
echo "USA routable ip address: $us <br>";
fclose($fp);
?>
