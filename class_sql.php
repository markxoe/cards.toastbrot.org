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
    public function userGet($byvalue, $by="username"){
        $q = "SELECT * FROM users WHERE $by = '$byvalue'";
        $r = $this->mysqli->query($q);
        if($r->num_rows == 1){
            return $r->fetch_assoc();
        }else{
            return null;
        }
    }
    public function userExist($byvalue, $by="username"){
        $q = "SELECT * FROM users WHERE $by = '$byvalue'";
        $r = $this->mysqli->query($q);
        return $r->num_rows==1;
    }

    // SESSION Functions
    public function sessionAdd($sessionid,$userid,$duration=3600){
        $destroy = time()+$duration;
        $q = "INSERT INTO sessions (id,id_user,destroy) VALUES ('$sessionid',$userid,$destroy)";
        $result = $this->mysqli->query($q);
        return $result;
    }
    public function sessionGet($sessionid){
        $q = "SELECT * FROM sessions WHERE id = '$sessionid'";
        $r = $this->mysqli->query($q);
        if($r->num_rows == 1){
            return $r->fetch_assoc();
        }else{
            return null;
        }
    }
    public function sessionList($onlyEpired=false){
        $time = time();
        if($onlyEpired){
            $q = "SELECT * FROM sessions WHERE destroy < $time";
        }else{
            $q = "SELECT * FROM sessions";
        }
        $r = $this->mysqli->query($q);
        return $r->fetch_all(MYSQLI_ASSOC);
    }
    public function sessionExist($sessionid){
        $q = "SELECT * FROM sessions WHERE id = '$sessionid'";
        $r = $this->mysqli->query($q);
        return $r->num_rows==1;
    }
    public function sessionDelete($sessionid){
        $q = "DELETE FROM sessions WHERE id = '$sessionid'";
        $r = $this->mysqli->query($q);
        return $r;
    }
    public function __destruct(){
        $this->mysqli->close();
    }
}

$sql = new sqlclass();