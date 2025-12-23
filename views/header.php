<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LURER.AM - Լրատվական պորտալ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --dark-color: #2c3e50;
            --light-bg: #f4f7f6;
            --white: #ffffff;
            --exclusive-red: #e74c3c;
        }

        body {
            margin: 0;
            padding-top: 120px; 
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--light-bg);
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--dark-color);
            color: white;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 2px;
            text-decoration: none;
            color: var(--white);
            text-transform: uppercase;
        }

        .logo span {
            color: var(--primary-color);
        }

        .user-menu a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
            transition: 0.3s;
        }

        .user-menu a:hover {
            color: var(--primary-color);
        }

        .add-news-btn {
            background: var(--primary-color);
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .category-bar {
            background: var(--white);
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            flex-wrap: wrap;
        }

        .category-bar a {
            color: #555;
            text-decoration: none;
            padding: 5px 15px;
            font-weight: 600;
            font-size: 15px;
            transition: 0.3s;
            border-radius: 20px;
        }

        .category-bar a:hover {
            background: #f0f2f5;
            color: var(--primary-color);
        }

        .category-bar a.active {
            color: var(--primary-color);
            background: rgba(52, 152, 219, 0.1);
        }

        .exclusive-btn {
            color: var(--exclusive-red) !important;
        }
        .exclusive-btn:hover {
            background: rgba(231, 76, 60, 0.1) !important;
        }
    </style>
</head>
<body>

<header class="navbar">
    <div class="top-bar">
        <a href="index.php" class="logo">LURER<span>.AM</span></a>
        
        <div class="user-menu">
            <?php if (isset($_SESSION['username'])): ?>
                <span style="color: #bdc3c7;">👋 Բարև, <b><?= htmlspecialchars($_SESSION['username']) ?></b></span>
                <a href="index.php?action=add" class="add-news-btn"><i class="fas fa-plus"></i> Ավելացնել</a>
                <a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i> Ելք</a>
            <?php else: ?>
                <a href="index.php?action=login"><i class="fas fa-user"></i> Մուտք</a>
                <a href="index.php?action=register">Գրանցում</a>
            <?php endif; ?>
        </div>
    </div>

    <nav class="category-bar">
        <a href="index.php" class="<?= !isset($_GET['name']) ? 'active' : '' ?>">Բոլորը</a>
        <a href="index.php?action=category&name=Հայաստան" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Հայաստան') ? 'active' : '' ?>">Հայաստան</a>
        <a href="index.php?action=category&name=Աշխարհ" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Աշխարհ') ? 'active' : '' ?>">Աշխարհ</a>
        <a href="index.php?action=category&name=Սպորտ" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Սպորտ') ? 'active' : '' ?>">Սպորտ</a>
        <a href="index.php?action=category&name=Տեխնոլոգիա" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Տեխնոլոգիա') ? 'active' : '' ?>">Տեխնոլոգիա</a>
        <a href="index.php?action=category&name=Ժամանց" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Ժամանց') ? 'active' : '' ?>">Ժամանց</a>
        <a href="index.php?action=category&name=Տնտեսություն" class="<?= (isset($_GET['name']) && $_GET['name'] == 'Տնտեսություն') ? 'active' : '' ?>">Տնտեսություն</a>
        <a href="index.php?action=category&name=Էքսկլյուզիվ" class="exclusive-btn <?= (isset($_GET['name']) && $_GET['name'] == 'Էքսկլյուզիվ') ? 'active' : '' ?>">✨ Էքսկլյուզիվ</a>
    </nav>
</header>