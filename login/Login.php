<?php
require_once 'DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // menerima parameter POST ( email dan password )
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // get the user by email and password
    // get user berdasarkan email dan password
    $user = $db->getUserByUsernameAndPassword( $username , $password);
 
    if ($user != false) {
        // user ditemukan
        $response["error"] = FALSE;
        $response["user"]["id"] = $user["id"];
        $response["user"]["nama"] = $user["nama"];
        $response["user"]["username"] = $user["username"];
        $response["user"]["level"] = $user["level"];
        echo json_encode($response);
    } else {
        // user tidak ditemukan password/email salah
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (email atau password) ada yang kurang";
    echo json_encode($response);
}
?>