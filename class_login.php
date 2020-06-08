<?php

class loginclass{
    private $sql;
    public function __construct(sqlclass $_sql){
        $this->sql = $_sql;
    }
    public function login($userid,$duration=3600){
        $sessionid = $this->idGen();
        $lal = $this->sql->sessionAdd($sessionid,$userid,$duration);
        setcookie("sessionID",$sessionid,time()+$duration);
    }
    public function deleteOld(){
        foreach($this->sql->sessionList(true) as $c){
            $this->sql->sessionDelete($c["id"]);
        }
    }
    public function logout(){
        $sessionid = $_COOKIE["sessionID"];
        if($this->sql->sessionExist($sessionid)){
            $this->sql->sessionDelete($sessionid);
        }
        setcookie("sessionID","",time());
    }

    public function verify(){
        if($_COOKIE["sessionID"]){
            $sessionid = $_COOKIE["sessionID"];
            if($this->sql->sessionExist($sessionid)){
                if($this->sql->sessionGet($sessionid)["destroy"] > time()){
                    return 1;
                }
            }
        }
        $this->logout();
        return 0;
    }

    public function getUsername(){
        if($this->verify()){
            $sessionid = $_COOKIE["sessionID"];
            return $this->sql->userGet($this->sql->sessionGet($sessionid)["id_user"],"id")["username"];
        }else{
            return "";
        }
    }

    private function idGen(){
        $id=date("Y-m-d H:i:s",time()); // GENERIERE DATUM STRING
        $id=md5($id.base64_decode(random_bytes(100))); // MACHE EINEN MD5 HASH AUS DATUM UND RANDOM STRING
        $id=substr( $id ,1,10); // KÜRZE AUF 10 ZEICHEN
        return $id;
    }
}