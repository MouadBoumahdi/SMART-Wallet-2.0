<?php
    session_start();
     require "../expense/getcategory.php";
    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Dépenses</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --warning-color: #f72585;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fb;
            color: var(--dark-color);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .navbar {
            background: white;
            padding: 15px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            color: var(--dark-color);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .logout-btn {
            background-color: var(--warning-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .logout-btn:hover {
            opacity: 0.9;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .logo span {
            color: var(--warning-color);
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn-add {
            background: black;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover {
            background: #333;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .modal-header h2 {
            color: #333;
            font-size: 20px;
            font-weight: 600;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .btn-close:hover {
            color: #333;
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
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #666;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
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
        }

        .btn-submit:hover {
            background: #333;
        }

        .table-container {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .table-header h2 {
            color: #333;
            font-size: 20px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #fafafa;
            border-bottom: 2px solid #e0e0e0;
        }

        thead th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        tbody td {
            padding: 15px 12px;
            color: #333;
        }

        .amount {
            font-weight: 600;
            font-size: 15px;
        }

        .date {
            color: #666;
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .header {
                flex-wrap: wrap;
            }
            
            .table-container {
                padding: 20px;
            }
            
            table {
                font-size: 13px;
            }
            
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
         <nav class="navbar">
            <div class="logo">Smart_wallet</div>
            <div class="nav-links">
                <a href="../index.php" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="income.php" class="nav-link">
                    <i class="fas fa-money-bill-wave"></i>
                    Income
                </a>
                <a href="expense.php" class="nav-link">
                    <i class="fas fa-receipt"></i>
                    Expense
                </a>
                <a href="category.php?type=all" class="nav-link">
                    <i class="fas fa-tags"></i>
                    Category
                </a>
                 <form method="POST" action="authservice/logout.php" style="display:inline;">
    <button type="submit" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
        Logout
    </button>
</form>
            </div>
        </nav>

        <div class="header">
            <button class="btn-add" onclick="openModal()">
                <i class="fas fa-plus"></i> Ajouter une Dépense
            </button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2>Liste des Dépenses</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="incomeTable">
                    
                    
                    <?php
                        require "../expense/getall.php";
                        foreach($expenses as $row){
                            echo '
                                <tr>
                                    <td class="date">' . $row['expense_date'] . '</td>
                                    <td>' . $row['description'] . '</td>
                                    <td class="amount">' . $row['montant'] . '</td>
                                    <td>
                                        <div class="actions">
                                            <a href="../expense/update.php?id=' . $row['id'] . '" class="btn-action btn-edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="../expense/delete.php?id=' . $row['id'] . '" class="btn-action btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ajouter une Dépense</h2>
                <button class="btn-close" onclick="closeModal()">&times;</button>
            </div>
             <form id="incomeForm" action="../expense/create.php" method="POST">
                <div class="form-group">
                    <label for="amount">Montant (MAD)</label>
                    <input type="number" id="montant" name="montant" step="0.01" required placeholder="Ex: 5000.00">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
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
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('active');
        }
 

        window.onclick = function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>