<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $sql = "select * from formats";
    $res = execute($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Formats | Smart Projects</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon: #8B1528;
            --maroon-dark: #630d1a;
            --light-bg: #f8fafc;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .format-container {
            margin-top: 40px;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-top: 5px solid var(--maroon);
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .header-flex h2 {
            color: var(--maroon);
            font-weight: 700;
            margin: 0;
            font-size: 24px;
        }

        /* Table Styling */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-custom th {
            background-color: #f1f5f9;
            color: #475569;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px;
            border-bottom: 2px solid #e2e8f0;
        }

        .table-custom td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.2s;
        }

        .table-custom tr:hover td {
            background-color: #fff9fa;
        }

        /* Action Buttons */
        .btn-view {
            color: var(--maroon);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-view:hover {
            color: var(--maroon-dark);
            text-decoration: underline;
        }

        .btn-delete {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-delete:hover {
            background-color: #dc2626;
            color: white;
        }

        .slno-badge {
            background: #eee;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 12px;
        }

        /* Icon styling */
        .file-icon {
            font-size: 18px;
            margin-right: 8px;
            color: #64748b;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="format-container">
        <div class="header-flex">
            <h2><span class="glyphicon glyphicon-folder-open"></span> Document Formats</h2>
            <a href="addformat.php" class="btn btn-sm" style="background: var(--maroon); color: white;">+ Add New Format</a>
        </div>

        <table class="table-custom">
            <thead>
                <tr>
                    <th width="10%">Slno</th>
                    <th width="45%">Caption / Description</th>
                    <th width="25%">File Access</th>
                    <th width="20%" class="text-center">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $slno = 1;
                while($row = $res->fetch_object())
                {
                    echo "<tr>
                            <td><span class='slno-badge'>$slno</span></td>
                            <td style='font-weight:500; color:#1e293b;'>$row->caption</td>
                            <td>
                                <a href='docs/$row->filename' class='btn-view' target='_blank'>
                                    <span class='glyphicon glyphicon-file file-icon'></span> View Document
                                </a>
                            </td>
                            <td class='text-center'>
                                <a href='deleteformat.php?slno=$row->slno' class='btn-delete' 
                                   onclick=\"return confirm('Delete this format permanently?');\">
                                    <span class='glyphicon glyphicon-trash'></span> Remove
                                </a>
                            </td>
                          </tr>";
                    $slno++;
                }
                ?>
            </tbody>
        </table>
        
        <?php if($slno == 1): ?>
            <div class="text-center" style="padding: 40px; color: #94a3b8;">
                <p>No formats uploaded yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>