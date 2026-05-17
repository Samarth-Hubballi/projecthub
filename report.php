<?php
    include_once('navbar.php');
?>

<head>
    <title>Project Report Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .report-container {
            max-width: 700px;
            margin: 60px auto;
        }

        /* Card Header */
        .page-header {
            background: white;
            padding: 30px;
            border-radius: 12px 12px 0 0;
            border-bottom: 4px solid #8B1528;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .page-header h2 {
            color: #8B1528;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Content Card */
        .resource-card {
            background: white;
            padding: 40px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .resource-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #fdf2f2;
            color: #8B1528;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .text-content h4 {
            margin: 0;
            font-weight: 700;
            color: #1e293b;
        }

        .text-content p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 0.9rem;
        }

        /* Themed Download Button */
        .btn-download {
            background-color: #8B1528;
            color: white !important;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none !important;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 140px;
        }

        .btn-download:hover {
            background-color: #6b0f1c;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(139, 21, 40, 0.2);
        }

        .btn-download .glyphicon {
            margin-top: 5px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

<div class="container report-container">
    <div class="page-header">
        <h2><span class="glyphicon glyphicon-file"></span> Report Resources</h2>
    </div>

    
    <div class="resource-card">
        <div class="resource-info">
            <div class="icon-box">
                <span class="glyphicon glyphicon-book"></span>
            </div>
            <div class="text-content">
                <h4>Sample Project Report</h4>
                <p>Format: TXT / PDF | Size: 1.2 MB</p>
            </div>
        </div>

        <a href="docs/report.txt" class="btn-download">
            Download
            <span class="glyphicon glyphicon-arrow-down"></span>
        </a>
    </div>

    <div class="text-center" style="margin-top: 30px;">
        <p class="text-muted">
            <span class="glyphicon glyphicon-info-sign"></span> 
            Need help with formatting? Contact your project guide.
        </p>
    </div>
</div>

</body>
</html>