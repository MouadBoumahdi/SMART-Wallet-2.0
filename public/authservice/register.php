<?php
    require "../../class/database.php";
    require "../../class/user.php";


    if($_SERVER['REQUEST_METHOD']=="POST"){

        $db = new Database();
        $conn = $db->getConnection();
    
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
    
        $user = new User($conn);
        if($user->getUserbyemail($email)){
            echo "<script>
            alert('Email déjà utilisé !');
            window.location.href = '../register.php';
            </script>";
        }else{
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);

            $user->register();
            header("Location:../login.php");
        }

    }



?>