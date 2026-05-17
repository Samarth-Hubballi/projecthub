<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $did = $_REQUEST['did'];
    $deptname = $_REQUEST['deptname'];
    
    // SQL Execution
    $sql = "INSERT INTO dept VALUES('$did', '$deptname')";
    $res = execute($sql);
?>

<head>
    <title>Department Saved | Smart Projects</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .action-container {
            max-width: 500px;
            margin: 100px auto;
        }

        .success-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: center;
            overflow: hidden;
            border-top: 6px solid #8B1528; /* Theme Maroon */
        }

        .icon-header {
            background: #fff1f2; /* Very light maroon tint */
            padding: 40px 20px;
            color: #8B1528;
        }

        .icon-header .glyphicon {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .card-content {
            padding: 30px;
        }

        .card-content h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .card-content p {
            color: #64748b;
            font-size: 1.05rem;
            margin-bottom: 25px;
        }

        /* Themed Button */
        .btn-action {
            display: inline-block;
            background-color: #8B1528;
            color: #ffffff !important;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-action:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 21, 40, 0.2);
        }

        .dept-details {
            background: #f1f5f9;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-family: monospace;
            color: #475569;
        }
    </style>
</head>

<body>

<div class="container action-container">
    <div class="success-card">
        <div class="icon-header">
            <span class="glyphicon glyphicon-ok-circle"></span>
            <h3>Department Registered</h3>
        </div>

        <div class="card-content">
            <p>New department record has been added to the database successfully.</p>
            
            <div class="dept-details">
                <?php echo $did; ?> &mdash; <?php echo $deptname; ?>
            </div>

            <a href="adddept.php" class="btn-action">
                <span class="glyphicon glyphicon-arrow-left"></span> Return to Form
            </a>
            <br><br>
            <a href="viewdept.php" class="text-muted" style="text-decoration: underline;">
                View All Departments
            </a>
        </div>
    </div>
</div>

</body>
</html>