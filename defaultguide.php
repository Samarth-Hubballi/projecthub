<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header("location:login.php");
    exit();
}

$uname = $_SESSION['uname'];
include_once('db.php');
// include_once('guidenavbar.php'); // Assuming you have a guide-specific navbar

$sql = "select * from guides where uname='$uname'";
$res = execute($sql);
$row = $res->fetch_object();

$img = $row->imgname;
$name = $row->name;
$dept = $row->deptid; // Assuming you might want to show the department
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome | <?php echo $name; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon: #8B1528;
            --gold: #D4AF37;
            --bg-light: #f4f7f6;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .welcome-container {
            max-width: 800px;
            margin: 80px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            border-bottom: 5px solid var(--maroon);
        }

        .profile-header {
            background: linear-gradient(135deg, var(--maroon) 0%, #630d1a 100%);
            height: 150px;
            position: relative;
        }

        .profile-img-wrapper {
            position: relative;
            margin-top: -75px; /* Pulls image up into the maroon header */
        }

        .profile-img-wrapper img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 6px solid #fff;
            object-fit: fill;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background-color: #eee;
        }

        .welcome-text {
            padding: 30px 20px 50px;
        }

        .welcome-text h2 {
            font-weight: 300;
            color: #64748b;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .faculty-name {
            font-size: 2.5rem;
            color: var(--maroon);
            font-weight: 700;
            margin: 0;
        }

        .status-badge {
            display: inline-block;
            margin-top: 15px;
            padding: 5px 20px;
            background: #fff1f2;
            color: var(--maroon);
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid #fecdd3;
        }

        .quick-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
            padding: 20px;
            background: #fafafa;
        }

        .stat-box {
            text-align: center;
        }

        .stat-box span {
            display: block;
            color: #94a3b8;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .stat-box b {
            font-size: 1.2rem;
            color: #1e293b;
        }

        /* Animation */
        .fade-up {
            animation: fadeUp 0.8s ease-out;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome-container fade-up">
        <div class="profile-header">
            </div>
        
        <div class="profile-img-wrapper">
            <img src='photos/<?php echo $img ?>' alt="Faculty Profile" 
                 onerror="this.src='img/default-faculty.png';">
        </div>

        <div class="welcome-text">
            <h2>Welcome ,</h2>
            <h1 class="faculty-name"><?php echo $name ?></h1>
            <div class="status-badge">Project Guide / Faculty Mentor</div>

            <div class="quick-stats">
                <div class="stat-box">
                    <span>Username</span>
                    <b>@<?php echo $uname ?></b>
                </div>
                <div class="stat-box">
                    <span>Current Session</span>
                    <b><?php echo date('Y'); ?></b>
                </div>
            </div>

            <div style="margin-top: 40px;">
                <a href="addnewproject.php" class="btn" style="background: var(--maroon); color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                    Add Projects
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>