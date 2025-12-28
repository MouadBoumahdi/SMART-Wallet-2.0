<?php
    require "../class/database.php";
    require "../class/expense.php";
    require "../expense/getcategory.php";

    $db = new Database();
    $conn = $db->getConnection();

    $expense = new Expense($conn);

    $id = $_GET['id'];

    $select = $expense->getbyid($id);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $montant = $_POST['montant'];
        $date = $_POST['date'];
        $type = $_POST['type'];


        // $income->setUserId($user_id);
        $expense->setMontant($montant);
        $expense->setExpenseDate($date);
        $expense->setDescription($type);

        if($expense->update($id)){
             echo "<script>
            alert('Update done!');
            window.location.href = '../public/expense.php';
            </script>";
        }else{
             echo "<script>
            alert('Try again !');
            </script>";
        }




    }


  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fb;
            color: #212529;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            width: 100%;
            max-width: 500px;
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .form-header h2 {
            color: #333;
            font-size: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #666;
        }

        .btn-submit {
            width: 100%;
            background: black;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Ajouter un Revenu</h2>
        </div>
        <?php   foreach($select as $row): ?>
        <form id="incomeForm" method="POST">
            <div class="form-group">
                <label for="montant">Montant (MAD)</label>
                <input type="number" id="montant" name="montant" value="<?= $row['montant'] ?>" step="0.01" required placeholder="Ex: 5000.00">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" value="<?= $row['expense_date'] ?>" name="date" required>
            </div>
            <div class="form-group">
                    <label for="category">Category</label>
                    <select name="type" required >
                        <option value="">Sélectionner la catégorie</option>
                        <?php 
                        foreach($category as $row){
                            echo '<option>'. $row['name'] .'</option>';
                         }
                         ?>
                    </select>
                </div>
            <button type="submit" class="btn-submit">Enregistrer</button>
        </form>
        <?php endforeach; ?>
    </div>
</body>
</html>