<?php
class sqlclass {
    private $mysqli;

    public function __construct(){
        include("mysql_secret.php");
        $this->mysqli = new mysqli("127.0.0.1", $mysqli_username, $mysqli_password, $mysqli_database);
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
    }
    private function rasiax($in){ // aka RemvoveAssholeSqlInjectionsAndXss
        $out=$in;
        $out = str_replace("'",'"',$out);
        $out = htmlspecialchars($out);
        return $out;
    }
    // USER Functions
    public function userAdd($username,$firstname,$lastname,$password){
        $username = $this->rasiax($username);
        $firstname = $this->rasiax($firstname);
        $lastname = $this->rasiax($lastname);
        $q = "INSERT INTO users (username,firstname,lastname,password) VALUES ('$username','$firstname','$lastname','$password')";
        $result = $this->mysqli->query($q);
        return $result;
    }

    // SESSION Functions
    public function __destruct(){
        $this->mysqli->close();
    }
}

$sql = new sqlclass();