<?php
    session_start();
    require "../../class/database.php";
    require "../../class/user.php";

    $db = new Database();
    $conn = $db->getConnection();

    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = new User($conn);
        $userlogin = $user->login($email,$password);
        if($userlogin){
            $_SESSION['user_id'] = $userlogin['id'];
            header("Location:../../index.php");
        }else{
            echo "<script>
            alert('Email or password incorrect !');
            window.location.href = '../login.php';
            </script>";
        }
         
        


    }
?>