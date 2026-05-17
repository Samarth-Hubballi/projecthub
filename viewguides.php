<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    $sql="select name,uname,imgname,quali,contno,deptname from guides g,dept d where d.deptid=g.deptid";
    $res=execute( $sql );
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Guides | Smart Projects</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon: #8B1528;
            --maroon-hover: #630d1a;
            --bg-body: #f4f7f6;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Poppins', sans-serif;
            padding-bottom: 50px;
        }

        .page-header {
            text-align: center;
            margin: 40px 0;
            color: var(--maroon);
        }

        .page-header h2 {
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Flex Container for Cards */
        .guides-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 0 15px;
        }

        /* Profile Card Styling */
        .guide-card {
            background: #ffffff;
            width: 320px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            position: relative;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .guide-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(139, 21, 40, 0.15);
        }

        /* Top Color Bar */
        .card-accent {
            height: 8px;
            background: var(--maroon);
        }

        .img-container {
            text-align: center;
            padding: 25px 0 15px;
        }

        .img-container img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: fill;
            border: 4px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .guide-card:hover .img-container img {
            transform: scale(1.05);
            border-color: var(--maroon);
        }

        .guide-info {
            padding: 0 25px 20px;
            text-align: center;
        }

        .guide-info h4 {
            color: #333;
            font-weight: 700;
            margin: 10px 0 5px;
        }

        .guide-info .dept-badge {
            display: inline-block;
            background: #fff1f2;
            color: var(--maroon);
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        /* Detail Rows */
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }

        .detail-row:last-of-type { border-bottom: none; }

        .label { color: #94a3b8; font-weight: 500; }
        .value { color: #475569; font-weight: 600; }

        /* Action Buttons */
        .card-actions {
            padding: 20px 25px 25px;
        }

        .btn-delete {
            display: block;
            width: 100%;
            background: #fff;
            color: #ef4444;
            border: 2px solid #fee2e2;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            text-align: center;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.6s ease-in forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="page-header">
        <h2><span class="glyphicon glyphicon-user"></span> Project Guides</h2>
        <p>Manage and view faculty mentor details</p>
    </div>

    <div class="guides-wrapper">
        <?php while( $row=$res->fetch_object() ) { ?>
            
            <div class="guide-card fade-in">
                <div class="card-accent"></div>
                
                <div class="img-container">
                    <img src="photos/<?php echo $row->imgname ?>" alt="Guide Photo" 
                         onerror="this.src='img/default-avatar.png';">
                </div>

                <div class="guide-info">
                    <h4><?php echo $row->name ?></h4>
                    <span class="dept-badge"><?php echo $row->deptname ?></span>

                    <div class="detail-row">
                        <span class="label">Qualification</span>
                        <span class="value"><?php echo $row->quali ?></span>
                    </div>
                    
                    <div class="detail-row">
                        <span class="label">Contact</span>
                        <span class="value"><?php echo $row->contno ?></span>
                    </div>

                    <div class="detail-row">
                        <span class="label">Username</span>
                        <span class="value">@<?php echo $row->uname ?></span>
                    </div>
                </div>

                <div class="card-actions">
                    <a href="deleteguide.php?uname=<?php echo $row->uname ?>" 
                       class="btn-delete" 
                       onclick="return confirm('Are you sure you want to delete this guide?');">
                        <span class="glyphicon glyphicon-trash"></span> Remove Guide
                    </a>
                </div>
            </div>

        <?php } ?>
    </div>

</body>
</html>