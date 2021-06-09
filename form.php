<?php

$request = new HttpRequest();
$request->setUrl('');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'Cache-Control' => 'no-cache',
  'Authorization' => 'Bearer',
  'Content-Type' => 'application/json',
));

$fname = strip_tags($_POST('nombres'));
$lname = strip_tags($_POST('apellidos'));
$tele = strip_tags($_POST('tele'));
$email = strip_tags($_POST('email'));
$proyecto = strip_tags($_POST('proyecto'));
$precios = strip_tags($_POST('precios'));
$residencia = strip_tags($_POST('residencia'));
$dormitorio = strip_tags($_POST('dormitorio'));

if(isset($fname) && isset($lname) && isset($email)){
$results = json_encode(array('fname' => $fname, 'lname' => $lname, 'email' => $email, 
'input_channel_id' => 1, 'source_id' => 1, 'interest_type_id' => 1,
'tele' => $tele, 'utm_source' => $proyecto,  => 'utm_campaign' => $precios, 
'utm_medium' => $residencia, 'utm_content' => $dormitorio), true);

$request->setBody($results);
}
try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}