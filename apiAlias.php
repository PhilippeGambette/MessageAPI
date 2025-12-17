<?php

header("Access-Control-Allow-Origin: *");
 
if(isset($_SERVER['REQUEST_URI'])){
  $url = $_SERVER['REQUEST_URI'];
  $urlExplosion = explode("?", $url);
  $url = "https://gambette.butmmi.o2switch.site/api.php?".$urlExplosion[1];
  $page= file_get_contents($url);
  echo $page;
}

?>


