<?php
session_start();
    require "../class/database.php";
    require "../class/expense.php";

    $user_id = $_SESSION['user_id'];

    $db = new Database();
    $conn = $db->getConnection();

    $expense = new Expense($conn);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $montant = $_POST['montant'];
        $date = $_POST['date'];
        $type = $_POST['type'];

        $expense->setUserId($user_id);
        $expense->setMontant($montant);
        $expense->setExpenseDate($date);
        $expense->setDescription($type);

        if($expense->create()){
             echo "<script>
            alert('expense added !');
            window.location.href = '../public/expense.php';
            </script>";
        }else{
             echo "<script>
            alert('Try again !');
            window.location.href = '../public/expense.php';
            </script>";
        }
    }
?>