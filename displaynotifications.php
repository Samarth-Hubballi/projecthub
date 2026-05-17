<?php
include_once('db.php');
include_once('adminnavbar.php');

// Fetching results with formatted date and department join
$result = display_del("select sino, date_format(ndate,'%d-%b-%Y') as ndate, deptname, message from notifications n, dept d where d.deptid=n.deptid", 4, "notifications", 0);
?>

<html>
<head>
    <title>Manage Notifications | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
        }

        .admin-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 15px;
        }

        /* Card Header */
        .page-header {
            background: #ffffff;
            padding: 25px 35px;
            border-radius: 12px 12px 0 0;
            border-bottom: 4px solid #8B1528; /* Theme Maroon */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h3 {
            margin: 0;
            color: #8B1528;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.3rem;
        }

        /* Table Styling */
        .table-card {
            background: white;
            border-radius: 0 0 12px 12px;
            padding: 20px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Targeting the headers generated or manual */
        .table thead tr, .header-row {
            background-color: #8B1528 !important;
            color: #ffffff !important;
        }

        .table th {
            padding: 15px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        /* Styling for the rows returned by $result */
        .table td {
            padding: 15px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .table tr:hover {
            background-color: #fff1f2; /* Light maroon tint on hover */
        }

        /* Customizing the Delete Button inside $result */
        /* Assuming display_del returns an <a> or <button> for deletion */
        .table a[href*="del"] {
            color: #ef4444;
            font-weight: 600;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: 0.2s;
        }

        .table a[href*="del"]:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-add-new {
            background-color: #8B1528;
            color: white !important;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-add-new:hover {
            background-color: #630d1a;
            box-shadow: 0 4px 10px rgba(139, 21, 40, 0.3);
        }
    </style>
</head>

<body>

<div class="admin-container">
    <div class="page-header">
        <h3><span class="glyphicon glyphicon-bullhorn"></span> Notification Management</h3>
        <a href="addnotification.php" class="btn-add-new">
            <span class="glyphicon glyphicon-plus"></span> Post New
        </a>
    </div>

    

    <div class="table-card">
        <table class="table">
            <thead>
                <tr class="header-row">
                    <th width="80px">Sino</th>
                    <th width="180px">Post Date</th>
                    <th width="200px">Target Department</th>
                    <th>Message Description</th>
                    <th width="100px">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $result; ?>
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px; color: #94a3b8; font-size: 0.85rem;">
        <span class="glyphicon glyphicon-info-sign"></span> 
        Note: Removing a notification is permanent and will remove it from the student/guide dashboards immediately.
    </div>
</div>

</body>
</html>