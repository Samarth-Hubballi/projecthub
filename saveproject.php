<?php
session_start();
$guide = $_SESSION['uname'];
$deptid = $_SESSION['deptid'];

include_once('db.php');
include_once('navbar.php'); // Maintain consistent navigation

// Data Sanitization (Good practice to keep logic clean)
$current_image = $_FILES['imgname']['name'];
$pid = $_REQUEST['pid'];
$title = $_REQUEST['title'];
$year = $_REQUEST['year'];
$pmates = $_REQUEST['pmates'];
$tech = $_REQUEST['tech'];
$descr = $_REQUEST['descr'];
$limits = "NIL";
$future = $_REQUEST['future'];
$link = $_REQUEST['link'] ?? '';

// SQL Execution
$sql = "INSERT INTO projects VALUES('$pid','$title',$year,'$deptid','$guide','$pmates','$tech','$descr','$limits','$future','$current_image','$link')";
$res = execute($sql);

// File Upload Logic
$new_image = $current_image;
$destination = "docs/" . $new_image;
$action = move_uploaded_file($_FILES["imgname"]["tmp_name"], $destination);
?>

<head>
    <title>Submission Successful</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .confirmation-wrap {
            max-width: 550px;
            margin: 80px auto;
        }

        .success-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            border-top: 6px solid #8B1528;
            padding-bottom: 30px;
        }

        /* Success Animation Area */
        .success-banner {
            background: #fff1f2;
            padding: 40px 20px;
            color: #8B1528;
        }

        .icon-box {
            font-size: 50px;
            margin-bottom: 10px;
            animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .card-body {
            padding: 30px;
        }

        .card-body h2 {
            font-weight: 700;
            color: #1e293b;
            margin-top: 0;
        }

        .project-summary {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }

        .summary-item {
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: #475569;
        }

        .summary-item strong {
            color: #8B1528;
        }

        .btn-return {
            background: #8B1528;
            color: white !important;
            padding: 12px 40px;
            border-radius: 10px;
            text-decoration: none !important;
            font-weight: 700;
            display: inline-block;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .btn-return:hover {
            background: #630d1a;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(139, 21, 40, 0.3);
        }
    </style>
</head>

<body>
    <div class="container confirmation-wrap">
        <div class="success-card">
            <div class="success-banner">
                <div class="icon-box">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </div>
                <h3>Project Published!</h3>
            </div>

            <div class="card-body">
                <p>The project has been successfully added to the college repository and is now visible to the administration.</p>
                
                <div class="project-summary">
                    <div class="summary-item"><strong>Project ID:</strong> <?php echo $pid; ?></div>
                    <div class="summary-item"><strong>Title:</strong> <?php echo $title; ?></div>
                    <div class="summary-item"><strong>Technology:</strong> <?php echo $tech; ?></div>
                    <div class="summary-item"><strong>Documentation:</strong> <?php echo $current_image; ?> (Uploaded)</div>
                </div>

                <a href="addnewproject.php" class="btn-return">
                    <span class="glyphicon glyphicon-plus"></span> Add Another Project
                </a>
                <br><br>
                <a href="viewprojectsguide.php" class="text-muted" style="font-weight: 600;">
                    View Repository List
                </a>
            </div>
        </div>
    </div>
</body>