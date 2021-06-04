<?php 
$url = 'http://localhost:8000/list.php';
$options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'GET',
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url);
  echo $result;