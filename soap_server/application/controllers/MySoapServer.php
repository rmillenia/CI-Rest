<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MySoapServer extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib");

        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("MySoapServer", "urn:MySoapServer");
        $this->nusoap_server->register(
            "getData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#getData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getDataId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#getDataId", "rpc", "encoded", "Echo test"
        );

         $this->nusoap_server->register(
            "getDataBy", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#getDataBy", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "insertData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#insertData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "insertDetail", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#insertDetail", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#updateData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "deleteData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#deleteData", "rpc", "encoded", "Echo test"
        );

        /**
         * To test whether SOAP server/client is working properly
         * Just echos the input parameter
         * @param string $tmp anything as input parameter
         * @return string returns the input parameter
         */
        function getData($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table;
            $result = mysqli_query($conn,$query);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return json_encode($data);
        }

        function getDataBy($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table." order by id desc limit 1";
            $result = mysqli_query($conn,$query);
            $data = array();
            $row = mysqli_fetch_assoc($result);
                

            return json_encode($row);
        }

        function getDataId($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table." where id='".$pars->id."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
                

            return json_encode($row);
        }

        function insertData($array) {
            $pars = json_decode($array);
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "insert into ".$pars->table." values ('','".$data->nik."','".$data->nama."','".$data->alamat."','".$data->ttl."','".$data->noHp."','".$data->level."','".$data->email."','".$data->username."','".$data->password."','".$data->foto."','".$data->totalSaldo."'
            )";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

         function insertDetail($array) {
            $pars = json_decode($array);
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "insert into ".$pars->table." values ('','".$data->id_driver."','".$data->status."','".$data->fotoSim."'
            )";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

        function updateData($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "update ".$pars->table." set nik='".$data->nik."',nama='".$data->nama."',alamat='".$data->alamat."',ttl='".$data->ttl."',noHp='".$data->noHp."',level='".$data->level."',email='".$data->email."',username='".$data->username."',password='".$data->password."' where id='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }
        function deleteData($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "delete from ".$pars->table." where id='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }
    }

    function index() {
        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }
}