<?php
    include_once('navbar.php');
    include_once('db.php');
    
    $pid = $_REQUEST['pid'];
    
    $sql = "SELECT pid, title, year, deptname, name, pmates, tech, descr, limits, future, link 
            FROM projects p, dept d, guides g 
            WHERE (p.pid='$pid' AND p.deptid=d.deptid AND p.guide=g.uname)";
    $res = execute($sql);
    $row = $res->fetch_object();
?>

<head>
    <title>Project Details | <?php echo $row->title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
        }

        .project-details-container {
            max-width: 900px;
            margin: 40px auto;
        }

        /* Information Card */
        .info-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-left: 6px solid #8B1528; /* Theme Maroon Accent */
        }

        .card-header {
            background: #ffffff;
            padding: 30px 40px;
            border-bottom: 1px solid #f1f5f9;
        }

        .card-header h2 {
            font-family: 'Poppins', sans-serif;
            color: #8B1528;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.6rem;
        }

        /* Structured Data Rows */
        .details-grid {
            padding: 20px 40px;
        }

        .data-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #f8fafc;
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .label-col {
            flex: 0 0 250px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .value-col {
            flex: 1;
            font-size: 1rem;
            line-height: 1.6;
            color: #1e293b;
        }

        /* Specialized Styling for Badges and Blocks */
        .tech-badge {
            background: #fdf2f2;
            color: #8B1528;
            padding: 4px 12px;
            border-radius: 6px;
            font-weight: 600;
            display: inline-block;
        }

        .description-block {
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            margin-top: 5px;
            border: 1px solid #e2e8f0;
        }

        .pid-tag {
            background: #8B1528;
            color: white;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-bottom: 10px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .data-row { flex-direction: column; }
            .label-col { margin-bottom: 5px; }
        }
    </style>
</head>

<body>

<div class="container project-details-container">
    <div class="info-card">
        <div class="card-header">
            <span class="pid-tag">ID: <?php echo $row->pid; ?></span>
            <h2>Project Overview</h2>
        </div>

        <div class="details-grid">
            <div class="data-row">
                <div class="label-col">Title</div>
                <div class="value-col" style="font-weight: 700; color: #8B1528; font-size: 1.2rem;">
                    <?php echo $row->title; ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label-col">Year & Department</div>
                <div class="value-col">
                    <strong><?php echo $row->year; ?></strong> &mdash; <?php echo $row->deptname; ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label-col">Project Guide</div>
                <div class="value-col">
                    <span class="glyphicon glyphicon-user" style="color: #8B1528; margin-right: 5px;"></span>
                    <?php echo $row->name; ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label-col">Team Members</div>
                <div class="value-col"><?php echo $row->pmates; ?></div>
            </div>

            <div class="data-row">
                <div class="label-col">Technology Stack</div>
                <div class="value-col">
                    <span class="tech-badge"><?php echo $row->tech; ?></span>
                </div>
            </div>

            <div class="data-row">
                <div class="label-col">Abstract</div>
                <div class="value-col description-block">
                    <?php echo nl2br($row->descr); ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label-col">Limitations</div>
                <div class="value-col"><?php echo $row->limits; ?></div>
            </div>

            <div class="data-row">
                <div class="label-col">Future Scope</div>
                <div class="value-col" style="color: #059669; font-weight: 500;">
                    <span class="glyphicon glyphicon-send"></span> <?php echo $row->future; ?>
                </div>
            </div>

            <?php if (!empty($row->link)): ?>
            <div class="data-row">
                <div class="label-col">GitHub Repository</div>
                <div class="value-col">
                    <a href="<?php echo htmlspecialchars($row->link); ?>" target="_blank" 
                       style="display:inline-flex; align-items:center; gap:8px; background:#1e293b; color:white; padding:8px 18px; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.9rem; transition:0.3s;"
                       onmouseover="this.style.background='#8B1528'" onmouseout="this.style.background='#1e293b'">
                        <svg height="18" width="18" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
                        View on GitHub
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="text-right" style="margin-top: 20px;">
        <button onclick="window.print()" class="btn btn-default">
            <span class="glyphicon glyphicon-print"></span> Print Details
        </button>
        <a href="javascript:history.back()" class="btn btn-primary" style="background-color: #8B1528; border: none;">
            <span class="glyphicon glyphicon-arrow-left"></span> Back to Repository
        </a>
    </div>
</div>

</body>
</html>