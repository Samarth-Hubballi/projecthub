<?php
    include_once('mynavbar.php');
    include_once('db.php');
    
    $sql = "SELECT * FROM formats";
    $res = execute($sql);
?>

<head>
    <title>Project Formats & Templates</title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }

        .format-container {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .page-header {
            background: white;
            padding: 30px;
            border-radius: 12px 12px 0 0;
            border-bottom: 4px solid #8B1528;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 0;
        }

        .page-header h2 {
            color: #8B1528;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table-responsive {
            background: white;
            padding: 20px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        /* Themed Table Styling */
        .table-custom {
            margin-bottom: 0;
        }

        .table-custom thead tr {
            background-color: #8B1528;
            color: white;
        }

        .table-custom thead th {
            border: none !important;
            padding: 15px !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        .table-custom tbody tr {
            transition: all 0.2s;
        }

        .table-custom tbody tr:hover {
            background-color: #fcf8f8;
        }

        .table-custom td {
            padding: 15px !important;
            vertical-align: middle !important;
            color: #444;
            border-top: 1px solid #eee !important;
        }

        /* Action Button */
        .btn-view {
            background-color: #8B1528;
            color: white !important;
            border-radius: 20px;
            padding: 6px 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none !important;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-view:hover {
            background-color: #6b0f1c;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(139, 21, 40, 0.2);
        }

        .doc-icon {
            color: #8B1528;
            margin-right: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

<div class="container format-container">
    <div class="page-header text-center">
        <h2><span class="glyphicon glyphicon-folder-open"></span> Document Formats</h2>
        <p class="text-muted">Download the official templates and guidelines for your project submissions</p>
    </div>

    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="65%">Document Caption</th>
                    <th width="25%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $slno = 1;
                while($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td><strong>$slno</strong></td>";
                    echo "<td><span class='glyphicon glyphicon-file doc-icon'></span> $row->caption</td>";
                    echo "<td class='text-center'>
                            <a href='docs/$row->filename' target='_blank' class='btn-view'>
                                <span class='glyphicon glyphicon-download-alt'></span> View / Download
                            </a>
                          </td>";
                    echo "</tr>";
                    $slno++;
                }
                ?>
            </tbody>
        </table>
        
        <?php if($slno == 1): ?>
            <div class="text-center style='padding:40px;'">
                <p class="text-muted">No format documents available yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>