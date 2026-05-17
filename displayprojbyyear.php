<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $did = $_REQUEST['deptid'];
    $year = $_REQUEST['year'];

    // Fetch Department Name
    $sql_dept = "SELECT * FROM dept WHERE deptid='$did'";
    $res_dept = execute($sql_dept);
    $row_dept = $res_dept->fetch_object();
    $deptname = $row_dept->deptname;

    // Fetch Project Details
    $sql = "SELECT pid, title, year, deptname, name, pmates, tech, descr, limits, future 
            FROM projects p, dept d, guides g 
            WHERE (p.deptid='$did' AND p.deptid=d.deptid AND year=$year AND g.uname=p.guide) 
            ORDER BY pid";
    $res = execute($sql);
?>

<html>
<head>
    <title>Detailed Report - <?php echo $deptname; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
            margin: 0;
            padding: 40px 20px;
        }

        .report-page {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Report Header */
        .report-header {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 12px;
            border-bottom: 8px solid #8B1528;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }

        .report-header h1 {
            font-family: 'Playfair Display', serif;
            color: #8B1528;
            margin: 0;
            font-size: 2.2rem;
        }

        .report-header p {
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 10px;
        }

        /* Project Dossier Card */
        .project-card {
            background: white;
            border-radius: 12px;
            margin-bottom: 50px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            overflow: hidden;
            page-break-inside: avoid; /* Essential for printing */
            border: 1px solid #e2e8f0;
        }

        .project-card-header {
            background: #8B1528;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .project-card-header h3 {
            margin: 0;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        .pid-tag {
            background: rgba(255,255,255,0.2);
            padding: 4px 12px;
            border-radius: 4px;
            font-weight: 700;
        }

        /* Data Rows */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 15px 25px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }

        .label-cell {
            width: 25%;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.75rem;
            background: #fafafa;
        }

        .content-cell {
            width: 75%;
            line-height: 1.6;
            color: #334155;
        }

        .tech-text {
            color: #8B1528;
            font-weight: 700;
        }

        .description-text {
            white-space: pre-line;
            font-style: italic;
            color: #475569;
        }

        /* Print Button */
        .print-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-print {
            background: #1e293b;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-print:hover {
            background: #8B1528;
            transform: translateY(-2px);
        }

        @media print {
            .btn-print, .adminnavbar, nav { display: none !important; }
            body { background: white; padding: 0; }
            .report-page { max-width: 100%; }
            .project-card { box-shadow: none; border: 1px solid #000; }
        }
    </style>
</head>

<body>

<div class="report-page">
    <div class="report-header">
        <h1>Departmental Technical Report</h1>
        <p><?php echo $deptname; ?> | Class of <?php echo $year; ?></p>
    </div>

    

    <?php while( $row=$res->fetch_object() ) { ?>
    <div class="project-card">
        <div class="project-card-header">
            <h3><?php echo $row->title; ?></h3>
            <span class="pid-tag">ID: <?php echo $row->pid; ?></span>
        </div>
        
        <table class="data-table">
            <tr>
                <td class="label-cell">Guide In-Charge</td>
                <td class="content-cell"><strong><?php echo $row->name; ?></strong></td>
            </tr>
            <tr>
                <td class="label-cell">Team Members</td>
                <td class="content-cell"><?php echo $row->pmates; ?></td>
            </tr>
            <tr>
                <td class="label-cell">Technology Stack</td>
                <td class="content-cell"><span class="tech-text"><?php echo $row->tech; ?></span></td>
            </tr>
            <tr>
                <td class="label-cell">Project Abstract</td>
                <td class="content-cell description-text"><?php echo $row->descr; ?></td>
            </tr>
            <tr>
                <td class="label-cell">Identified Limits</td>
                <td class="content-cell"><?php echo $row->limits; ?></td>
            </tr>
            <tr>
                <td class="label-cell">Future Scope</td>
                <td class="content-cell"><?php echo $row->future; ?></td>
            </tr>
        </table>
    </div>
    <?php } ?>

    <div class="print-btn-container">
        <button class="btn-print" onclick="window.print()">
            <span class="glyphicon glyphicon-print"></span> GENERATE OFFICIAL PDF
        </button>
    </div>
</div>

</body>
</html>