<?php
include_once('db.php');
include_once('navbar.php'); // Keeps the layout consistent

$pid = $_REQUEST['pid'];
$title = $_REQUEST['title'];
$pmates = $_REQUEST['pmates'];
$tech = $_REQUEST['tech'];
$descr = $_REQUEST['descr'];
$limits = "NIL";
$future = $_REQUEST['future'];
$link = $_REQUEST['link'];

// Update Query
$sql = "UPDATE projects SET 
        title='$title', 
        pmates='$pmates', 
        tech='$tech', 
        descr='$descr', 
        limits='$limits', 
        future='$future',
        link='$link'
        WHERE pid='$pid'";

$res = execute($sql);
?>

<head>
    <title>Update Successful</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', sans-serif;
        }

        .success-container {
            max-width: 500px;
            margin: 100px auto;
            text-align: center;
        }

        .success-card {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-top: 5px solid #8B1528;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #fdf2f2;
            color: #8B1528;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }

        .success-card h2 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .success-card p {
            color: #64748b;
            margin-bottom: 30px;
        }

        .btn-return {
            background-color: #8B1528;
            color: white !important;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none !important;
            font-weight: 600;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-return:hover {
            background-color: #6b0f1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 21, 40, 0.2);
        }
    </style>
</head>

<body>
    <div class="container success-container">
        <div class="success-card">
            <div class="icon-circle">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h2>Changes Saved!</h2>
            <p>Project <strong>#<?php echo $pid; ?></strong> has been successfully updated in the repository.</p>
            
            <a href="viewprojectsguide.php" class="btn-return">
                <span class="glyphicon glyphicon-arrow-left"></span> Back to Project List
            </a>
        </div>
    </div>
</body>