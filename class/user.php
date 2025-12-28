<?php
    class User{

        private PDO $db;
        private string $username;
        private string $email;
        private string $password;

        public function __construct(PDO $db){
            $this->db = $db;
        }



        public function setUsername(string $username):void{
            $this->username = $username;
        }

        public function setEmail(string $email):void{
            $this->email = $email;
        }

        public function setPassword(string $password):void{
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }
        
        // check if user exist
        public function getUserbyemail(string $email):bool{
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);

            return $stmt->fetch(PDO::FETCH_ASSOC)? true :false ;
             

        }

        // register
        public function register():bool{
            
            $stmt = $this->db->prepare("INSERT INTO users(username,email,password)
            VALUES(:username,:email,:password)");

            return $stmt->execute([':username'=>$this->username,':email'=>$this->email,':password'=>$this->password])? true : false;

        }



        // login
        public function login(string $email,string $password):array|false{
            $stmt = $this->db->prepare("SELECT * FROM users where email=:email");
            $stmt->execute([':email'=>$email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user && password_verify($password,$user['password'])){
                return $user;
            }else{
                return false;
            }
        }

        // logout
     }
?>