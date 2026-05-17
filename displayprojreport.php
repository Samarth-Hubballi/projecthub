<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $did = $_REQUEST['deptid'];
    $year = $_REQUEST['year'];

    // Fetch Department Name
    $sql_dept = "select * from dept where deptid='$did' ";
    $res_dept = execute($sql_dept);
    $row_dept = $res_dept->fetch_object();
    $deptname = $row_dept->deptname;

    // Fetch Projects
    $sql = "select pid,title,year,deptname,name,pmates,tech from projects p,dept d,guides g 
            where( p.deptid='$did' and p.deptid=d.deptid and year=$year and g.uname=p.guide ) order by pid";
    $res = execute($sql);
?>

<html>
<head>
    <title>Department Report - <?php echo $deptname; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
            margin: 0;
            padding: 20px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-bottom: 4px solid #8B1528;
            border-radius: 8px 8px 0 0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .report-header h3 {
            margin: 0;
            color: #8B1528;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }

        .report-header p {
            margin-top: 5px;
            color: #64748b;
            font-weight: 600;
        }

        /* Modern Table Styling */
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }

        table.proj {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        table.proj th {
            background-color: #8B1528; /* Theme Maroon */
            color: white;
            text-align: left;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        table.proj td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }

        table.proj tr:nth-child(even) {
            background-color: #fdf2f2; /* Very light maroon tint */
        }

        table.proj tr:hover {
            background-color: #f1f5f9;
        }

        .pmates-list {
            font-family: inherit;
            margin: 0;
            white-space: pre-wrap;
            color: #475569;
            font-size: 0.85rem;
        }

        .tech-badge {
            display: inline-block;
            background: #e2e8f0;
            color: #1e293b;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Print Button */
        .no-print-area {
            margin-top: 30px;
            text-align: center;
        }

        .btn-print {
            background: #8B1528;
            color: white;
            border: none;
            padding: 12px 35px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 6px rgba(139, 21, 40, 0.2);
        }

        .btn-print:hover {
            background: #630d1a;
            transform: scale(1.05);
        }

        /* Print Media Query */
        @media print {
            .no-print-area, .adminnavbar, nav {
                display: none !important;
            }
            body {
                background-color: white;
                padding: 0;
            }
            .report-header {
                box-shadow: none;
                border-radius: 0;
            }
            .table-container {
                box-shadow: none;
                padding: 0;
            }
            table.proj th {
                background-color: #8B1528 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
				print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<div class="report-header">
    <h3>Project Statistics Report</h3>
    <p><?php echo $deptname; ?> Department &mdash; Academic Year <?php echo $year; ?></p>
</div>



<div class="table-container">
    <table class="proj">
        <thead>
            <tr>
                <th width="80px">ID</th>
                <th>Project Title</th>
                <th width="100px">Guide</th>
                <th>Team Members</th>
                <th>Technology</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $row=$res->fetch_object() ) { ?>
            <tr>
                <td><strong>#<?php echo $row->pid ?></strong></td>
                <td style="color: #1e293b; font-weight: 600;"><?php echo $row->title ?></td>
                <td><?php echo $row->name ?></td>
                <td><div class="pmates-list"><?php echo $row->pmates ?></div></td>
                <td><span class="tech-badge"><?php echo $row->tech ?></span></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="no-print-area">
    <button class="btn-print" onclick="window.print();">
        <span class="glyphicon glyphicon-print"></span> Print Official Report
    </button>
</div>

</body>
</html>