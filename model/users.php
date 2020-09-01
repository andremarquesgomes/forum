<?php

require("base.php");

class Users extends Base{
   
    public function login($data) { 

        foreach($data as $key => $value) {
            $data[$key] = strip_tags(trim($value));
        }
        
        $query = $this->db->prepare("
            SELECT user_id, username, password
            FROM users
            WHERE username = ?
        ");

        $query->execute([
            $data["username"]
        ]); 
        
        $user = $query->fetch( PDO::FETCH_ASSOC ); 

        if(!empty($user) && password_verify($data["password"] , $user["password"] )){

            $_SESSION["user_id"] = $user["user_id"]; 
            $_SESSION["username"] = $user["username"]; 

            return true;
        }
        return false; 
    }
            

    public function register($data) {
        // implementar sanitização
        foreach($data as $key => $value) {
            $data[$key] =  strip_tags(trim($value));
        }

        // validação 
        if( 
            !empty($data["username"]) &&
            !empty($data["password"]) &&
            filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($data["username"]) <=32 &&
            mb_strlen($data["password"]) >=6 &&
            mb_strlen($data["password"]) <=1000 &&
            $data["password"] === $data["rep_password"]
        ) {
            $query = $this->db->prepare("
            INSERT INTO users
            (username, email, password, active)
            VALUES(?, ?, ?, 1)
            "); 
            $query->execute([
                $data["username"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT)
            ]);
                
            return true;
        }
        else {
            return false; 
        }
    }

                
    public function logout() {
        unset($_SESSION["user_id"]);
        session_destroy();
        return true; 
    }
    
}


