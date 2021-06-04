<?php
$url = "http://localhost:8000/produits.php?id=1"; // modifier le produit 1
$data = array('name' => 'MAC', 'description' => 'Ordinateur portable', 'price' => '9658', 'category' => '2');

// utilisez 'http' même si vous envoyez la requête sur https:// ...
$options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'PUT',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }

  var_dump($result);

if (!$result) 
{
    return false;
}
?>