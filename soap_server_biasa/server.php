<?php
require_once('lib/nusoap.php');
$server = new soap_server();

function get_message($name) {
	return "Welcome ".$name['nama'];
}

$server->register('get_message');

$namespace = "http://localhost/rinda-enterprise/server_soap/server.php";
$server->configureWSDL("Driverci","urn:Driverci");
$server->wsdl->schemaTargetNamespace = $namespace;

if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
exit();
?>