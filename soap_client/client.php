<?php
require_once('lib/nusoap.php');
$client = new nusoap_client('http://localhost/rinda-enterprise/soap_server/server.php');

$response = $client->call('get_message', array('name' =>array("nama"=>"aldhan")));
echo $response;
?>