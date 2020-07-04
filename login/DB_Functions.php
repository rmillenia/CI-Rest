<?php
 
class DB_Functions {
 
    private $conn;
 
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // koneksi ke database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Get user berdasarkan email dan password
     */
    public function getUserByUsernameAndPassword($username, $password) {
 
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ?");
 
        $stmt->bind_param("s", $username);
        
        
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            // verifikasi password user
            $salt = $user['password'];
            $encrypted_password = md5($password);
            // cek password jika sesuai
            if ($salt == $encrypted_password) {
                // autentikasi user berhasil
                return $user;
            }
        } else {
            return NULL;
        }
    }
 
}
 
?>