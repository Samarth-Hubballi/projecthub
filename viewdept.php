<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $sql = "SELECT * FROM dept";
    $res = execute($sql);
?>

<head>
    <title>Department Directory | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .dept-container {
            margin-top: 50px;
            max-width: 800px;
        }

        /* Header Styling */
        .page-header {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px 12px 0 0;
            border-bottom: 4px solid #8B1528;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .page-header h2 {
            color: #8B1528;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }

        /* Table Card Styling */
        .table-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .table-custom {
            margin-bottom: 0;
        }

        .table-custom thead tr {
            background-color: #8B1528;
            color: #ffffff;
        }

        .table-custom thead th {
            padding: 15px !important;
            border: none !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        .table-custom tbody tr {
            transition: background 0.2s;
        }

        .table-custom tbody tr:hover {
            background-color: #fff1f2; /* Light maroon tint on hover */
        }

        .table-custom td {
            padding: 15px !important;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9 !important;
            color: #334155;
            font-weight: 500;
        }

        .dept-icon {
            color: #8B1528;
            margin-right: 10px;
        }

        /* Breadcrumb-like style for Sl No or ID */
        .id-badge {
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 6px;
            color: #64748b;
            font-size: 0.9rem;
            font-family: monospace;
        }
    </style>
</head>

<body>

<div class="container dept-container">
    <div class="page-header text-center">
        <h2><span class="glyphicon glyphicon-th-list"></span> Department Directory</h2>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th width="30%">Dept ID</th>
                        <th width="70%">Department Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $res->fetch_object()) {
                        echo "<tr>";
                        echo "<td><span class='id-badge'>#$row->deptid</span></td>";
                        echo "<td><span class='glyphicon glyphicon-education dept-icon'></span> $row->deptname</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="text-right" style="margin-top: 15px;">
            <a href="adddept.php" class="btn btn-sm" style="color: #8B1528; font-weight: 600;">
                <span class="glyphicon glyphicon-plus"></span> Add New Department
            </a>
        </div>
    </div>
</div>

</body>
</html>