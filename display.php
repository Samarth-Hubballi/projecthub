<?php
    include_once('db.php');
    include_once('adminnavbar.php'); // Maintain consistent navigation
    
    $sql = "select * from guides order by sino";
    $res = execute($sql);
?>

<html>
<head>
    <title>Faculty Directory | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .directory-container {
            max-width: 1100px;
            margin: 40px auto;
        }

        /* Header Section */
        .directory-header {
            background: white;
            padding: 25px 35px;
            border-radius: 12px 12px 0 0;
            border-bottom: 4px solid #8B1528;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .directory-header h2 {
            margin: 0;
            color: #8B1528;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.4rem;
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 0 0 12px 12px;
            padding: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .guide-table {
            width: 100%;
            border-collapse: collapse;
        }

        .guide-table th {
            background-color: #f8fafc;
            color: #64748b;
            text-align: left;
            padding: 15px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #e2e8f0;
        }

        .guide-table td {
            padding: 15px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: middle;
        }

        .guide-table tr:hover {
            background-color: #fff1f2; /* Light maroon hover */
        }

        /* Profile Thumbnail Logic */
        .guide-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .guide-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #8B1528;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            object-fit: cover;
        }

        .guide-name {
            font-weight: 600;
            color: #1e293b;
        }

        .dept-badge {
            background: #e2e8f0;
            color: #475569;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .contact-link {
            color: #8B1528;
            text-decoration: none;
            font-weight: 500;
        }

        .contact-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="directory-container">
    <div class="directory-header">
        <h2><span class="glyphicon glyphicon-list-alt"></span> Faculty & Guides Details</h2>
        <a href="add_guide.php" class="btn btn-danger" style="background:#8B1528;">+ Add New Guide</a>
    </div>

    

    <div class="table-card">
        <table class="guide-table">
            <thead>
                <tr>
                    <th>Sino</th>
                    <th>Name & Credentials</th>
                    <th>Contact Info</th>
                    <th>Department</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $row = $res->fetch_object() ) { 
                    // Get initials for avatar if no image exists
                    $initials = strtoupper(substr($row->name, 0, 1));
                ?>
                <tr>
                    <td><span style="color: #94a3b8; font-weight: 600;"><?php echo $row->sino; ?></span></td>
                    <td>
                        <div class="guide-profile">
                            <div class="guide-avatar">
                                <?php echo $initials; ?>
                            </div>
                            <div>
                                <div class="guide-name"><?php echo $row->name; ?></div>
                                <div style="font-size: 0.8rem; color: #64748b;"><?php echo $row->quali; ?></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="glyphicon glyphicon-phone"></span> 
                        <a href="tel:<?php echo $row->contno; ?>" class="contact-link"><?php echo $row->contno; ?></a>
                    </td>
                    <td>
                        <span class="dept-badge"><?php echo $row->dept; ?></span>
                    </td>
                    <td>
                        <code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px;"><?php echo $row->uname; ?></code>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>