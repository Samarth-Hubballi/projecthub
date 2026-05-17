<?php
    include_once('db.php');
    include_once('navbar.php'); // Assuming you want the navigation at the top
    
    $pid = $_REQUEST['pid'];
    
    $sql = "SELECT pid, title, year, deptname, name, pmates, tech, descr, limits, future, docname 
            FROM projects p, dept d, guides g 
            WHERE (p.pid='$pid' AND p.deptid=d.deptid AND p.guide=g.uname)";
    $res = execute($sql);
    $row = $res->fetch_object();
?>

<head>
    <title>Project Details | <?php echo $row->pid ?></title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }

        .details-card {
            background: white;
            margin-top: 30px;
            margin-bottom: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            border-top: 6px solid #8B1528;
        }

        .details-header {
            padding: 25px 40px;
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        .details-header h2 {
            color: #8B1528;
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }

        /* Structured List Layout */
        .info-grid {
            padding: 20px 40px;
        }

        .info-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px dotted #ddd;
            align-items: flex-start;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            flex: 0 0 250px;
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .info-value {
            flex: 1;
            color: #333;
            font-size: 1rem;
            line-height: 1.6;
        }

        .tech-badge {
            background: #f8e8ea;
            color: #8B1528;
            padding: 4px 12px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        pre {
            background: transparent;
            border: none;
            padding: 0;
            font-family: inherit;
            margin: 0;
            white-space: pre-line;
        }

        /* Action Buttons */
        .action-bar {
            background: #fdfdfd;
            padding: 20px 40px;
            border-top: 1px solid #eee;
            text-align: right;
        }

        .btn-print {
            background-color: #555;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-edit {
            background-color: #8B1528;
            color: white !important;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none !important;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-edit:hover, .btn-print:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        @media print {
            .navbar, .action-bar, .btn-print, .btn-edit {
                display: none !important;
            }
            .details-card {
                box-shadow: none;
                border: none;
                margin: 0;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="details-card">
        <div class="details-header">
            <h2>Project Information Sheet</h2>
        </div>

        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Project ID</div>
                <div class="info-value"><strong><?php echo $row->pid ?></strong></div>
            </div>

            <div class="info-row">
                <div class="info-label">Title</div>
                <div class="info-value" style="color: #8B1528; font-weight: 700; font-size: 1.1rem;">
                    <?php echo $row->title ?>
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">Year & Department</div>
                <div class="info-value"><?php echo $row->year ?> | <?php echo $row->deptname ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">Project Guide</div>
                <div class="info-value"><?php echo $row->name ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">Team Members</div>
                <div class="info-value"><pre><?php echo $row->pmates ?></pre></div>
            </div>

            <div class="info-row">
                <div class="info-label">Technology Used</div>
                <div class="info-value"><span class="tech-badge"><?php echo $row->tech ?></span></div>
            </div>

            <div class="info-row">
                <div class="info-label">Abstract / Description</div>
                <div class="info-value"><?php echo $row->descr ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">Future Scope</div>
                <div class="info-value"><?php echo $row->future ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">Project Report</div>
                <div class="info-value">
                    <a href="docs/<?php echo $row->docname ?>" class="text-primary" style="font-weight: 600;">
                        <span class="glyphicon glyphicon-download-alt"></span> Download Full Documentation
                    </a>
                </div>
            </div>
        </div>

        <div class="action-bar">
            <button class="btn-print" onclick="window.print()">
                <span class="glyphicon glyphicon-print"></span> Print Details
            </button>
            <a href="editproject.php?pid=<?php echo $row->pid ?>" class="btn-edit">
                <span class="glyphicon glyphicon-pencil"></span> Edit Project
            </a>
        </div>
    </div>
</div>

</body>
</html>