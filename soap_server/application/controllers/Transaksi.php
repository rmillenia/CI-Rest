<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib");

        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("Transaksi", "urn:Transaksi");
        $this->nusoap_server->register(
            "getData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getTransId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getTransId", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getDataId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getDataId", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getHargaId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getHargaId", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getDriverId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getDriverId", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getDriverKosong", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getDriverKosong", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "insertData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#insertData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#updateData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateDriver", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#updateDriver", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateDriverTrans", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#updateDriverTrans", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateDriverPesan", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#updateDriverPesan", "rpc", "encoded", "Echo test"
        );


        $this->nusoap_server->register(
            "deleteData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#deleteData", "rpc", "encoded", "Echo test"
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

        function getHargaId($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select harga from ".$pars->table." where id_harga='".$pars->id_harga."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
                

            return json_encode($row);
        }

        function getTransId($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table." where id_transaksi='".$pars->id."'";
            $result = mysqli_query($conn,$query);
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

        function getDriverId($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table." inner join ".$pars->table2." on ".$pars->table.".id_driver = ".$pars->table2.".id where id_driver = '".$pars->id."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
                

            return json_encode($row);
        }

        function getDriverKosong($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "select * from ".$pars->table." inner join ".$pars->table2." on ".$pars->table.".id_driver = ".$pars->table2.".id where status = 'kosong'";
            $result = mysqli_query($conn,$query);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return json_encode($data);
        }

        function insertData($array) {
            $pars = json_decode($array);
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "insert into ".$pars->table." values ('','".$data->id_user."',null,'".$data->startTime."','".$data->endTime."','".$data->paket."','".$data->denda."','".$data->totalHarga."','".$data->rating_id."','".$data->lokasi_jemput."','baru')";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

        function updateData($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "update ".$pars->table." set status='Selesai' where id_transaksi='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

        function updateDriver($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "update ".$pars->table." set status='kosong' where id_driver='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

         function updateDriverPesan($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "update ".$pars->table." set status='dipesan' where id_driver='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }

         function updateDriverTrans($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "update ".$pars->table." set id_driver = '".$pars->id."' where id_transaksi ='".$pars->id_transaksi."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }


        function deleteData($array) {
            $pars = json_decode($array);
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','driverci');
            $query = "delete from ".$pars->table." where id_transaksi='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }
    }

    function index() {
        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }
}