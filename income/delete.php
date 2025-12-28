<?php
    require "../class/database.php";
    require "../class/income.php";

    $id = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();


    $income = new Income($conn);


    if($income->delete($id)){
         echo "<script>
            alert('Income deleted !');
            window.location.href = '../public/income.php';
            </script>";
    }else{
         echo "<script>
            alert('Try again !');
            </script>";
    }
?>