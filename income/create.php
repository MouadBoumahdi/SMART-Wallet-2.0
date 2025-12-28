<?php
session_start();
    require "../class/database.php";
    require "../class/income.php";

    $user_id = $_SESSION['user_id'];

    $db = new Database();
    $conn = $db->getConnection();

    $income = new Income($conn);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $montant = $_POST['montant'];
        $date = $_POST['date'];
        $type = $_POST['type'];

        $income->setUserId($user_id);
        $income->setMontant($montant);
        $income->setIncomeDate($date);
        $income->setDescription($type);

        if($income->create()){
             echo "<script>
            alert('Income added !');
            window.location.href = '../public/income.php';
            </script>";
        }else{
             echo "<script>
            alert('Try again !');
            window.location.href = '../public/income.php';
            </script>";
        }
    }
?>