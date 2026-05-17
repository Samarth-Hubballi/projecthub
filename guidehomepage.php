<?php
session_start();
$uname = $_SESSION['uname'] ?? 'Guide';
?>

<html>
<head>
    <title>Guide Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --maroon-main: #8B1528;
            --maroon-dark: #630d1a;
            --bg-light: #f8fafc;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            overflow: hidden; /* Prevents double scrollbars with iframe */
        }

        /* Navigation Header */
        .nav-header {
            background: #ffffff;
            border-bottom: 3px solid var(--maroon-main);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            height: 80px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            position: relative;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            background: var(--maroon-main);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }

        .brand-text h4 {
            margin: 0;
            color: var(--maroon-main);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1rem;
        }

        .nav-links {
            display: flex;
            gap: 5px;
            height: 100%;
        }

        .nav-item {
            text-decoration: none;
            color: #64748b;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            transition: all 0.3s ease;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            gap: 5px;
            border-bottom: 3px solid transparent;
        }

        .nav-item i, .nav-item .glyphicon {
            font-size: 1.2rem;
            transition: transform 0.2s;
        }

        .nav-item:hover {
            color: var(--maroon-main);
            background: #fff1f2;
            border-bottom: 3px solid var(--maroon-main);
        }

        .nav-item:hover i, .nav-item:hover .glyphicon {
            transform: translateY(-3px);
        }

        .logout-item {
            color: #ef4444;
        }
        
        .logout-item:hover {
            background: #fef2f2;
            border-bottom: 3px solid #ef4444;
            color: #b91c1c;
        }

        /* Iframe Styling */
        .content-frame {
            width: 100%;
            height: calc(100vh - 83px); /* Subtract header height and border */
            border: none;
            background: var(--bg-light);
        }

        .user-welcome {
            font-size: 0.85rem;
            color: #94a3b8;
            margin-right: 20px;
        }
    </style>
</head>

<body>

    <header class="nav-header">
        <div class="brand">
            <div class="brand-logo">G</div>
            <div class="brand-text">
                <h4>Guide Panel</h4>
                <span class="user-welcome">Welcome, <strong><?php echo $uname; ?></strong></span>
            </div>
        </div>

        <nav class="nav-links">
            <a href="defaultguide.php" target="ifr1" class="nav-item">
                <span class="glyphicon glyphicon-home"></span>
                <span>Home</span>
            </a>
            
            <a href="viewprofile.php" target="ifr1" class="nav-item">
                <span class="glyphicon glyphicon-user"></span>
                <span>Profile</span>
            </a>

            <a href="addnewproject.php" target="ifr1" class="nav-item">
                <span class="glyphicon glyphicon-plus-sign"></span>
                <span>Add Project</span>
            </a>

            <a href="viewprojectsguide.php" target="ifr1" class="nav-item">
                <span class="glyphicon glyphicon-briefcase"></span>
                <span>Projects</span>
            </a>

            <a href="index.php" class="nav-item logout-item">
                <span class="glyphicon glyphicon-off"></span>
                <span>Logout</span>
            </a>
        </nav>
    </header>

    

    <iframe name="ifr1" id="ifr1" class="content-frame" src="defaultguide.php"></iframe>

</body>
</html>