<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --warning-color: #f72585;
            --dark-color: #212529;
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
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
        }

        .header p {
            color: #666;
            margin-top: 5px;
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
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-section {
            background: white;
            padding: 20px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: white;
            cursor: pointer;
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .table-container {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
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
            padding: 30px;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 400px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            font-size: 20px;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .btn-submit {
            width: 100%;
            background: black;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
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
                flex-direction: column;
                gap: 20px;
                text-align: center;
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
            <div>
                <h1>catégories</h1>
                <p>Liste des catégories</p>
            </div>
            <button class="btn-add" onclick="openModal()">
                <i class="fas fa-plus"></i> Ajouter Catégorie
            </button>
        </div>

        <div class="filter-section">
            <div class="filter-buttons">
                <a href="?type=all"><button class="filter-btn">Toutes</button></a>
                <a href="?type=income"><button class="filter-btn">Income</button></a>
                <a href="?type=expense"><button class="filter-btn">Expense</button></a>
            </div>
        </div>

        <div class="table-container">
            <div class="table-container">
    <table id="categoriesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
            <?php require "../category/getbytype.php"; foreach($categories as $row): ?>
            <tr data-category="<?= $row['name'] ?>">
                <td><?= $row['id'] ?></td>
                <td><?=  $row['name'] ?></td>
                <td><?= $row['type'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ajouter Catégorie</h2>
                <button class="btn-close" onclick="closeModal()">&times;</button>
            </div>




            <form id="categoryForm" action="../category/create.php" method="POST">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" id="categoryName" name="name" required>
                </div>
                <div class="form-group">
                    <label>type</label>
                    <select name="type" id="">
                        <option value="income">income</option>
                        <option value="expense">expense</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit" name="submit">Ajouter</button>
            </form>






        </div>
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