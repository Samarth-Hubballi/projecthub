<?php
    include_once('db.php');
    // Assuming the navbar handles session and styles
    include_once('guidenavbar.php'); 
    
    $pid = $_REQUEST['pid'];
    $sql = "select * from projects where pid='$pid'";
    $res = execute($sql);
    $row = $res->fetch_object();
?>

<html>
<head>
    <title>Edit Project | Guide Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .edit-container {
            max-width: 900px;
            margin: 30px auto;
        }

        .edit-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528; /* Theme Maroon */
        }

        .card-header {
            padding: 20px 30px;
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            color: #8B1528;
            margin: 0;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .pid-badge {
            background: #fdf2f2;
            color: #8B1528;
            padding: 5px 12px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .card-body {
            padding: 30px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Modern Input Styling */
        input[type='text'], textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .readonly-field {
            background-color: #f1f5f9;
            cursor: not-allowed;
        }

        /* Submit Button */
        .btn-update {
            background-color: #8B1528;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-update:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .btn-update i {
            margin-right: 8px;
        }
    </style>
</head>

<body>

<div class="edit-container">
    <div class="edit-card">
        <div class="card-header">
            <h2>Update Project Details</h2>
            <span class="pid-badge">Project ID: <?php echo $row->pid; ?></span>
        </div>

        <div class="card-body">
            <form name="f1" action="updateproject.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pid" value="<?php echo $row->pid; ?>" />

                <div class="form-grid">
                    
                    <div class="form-group full-width">
                        <label for="title">Project Title</label>
                        <textarea name="title" id="title" required><?php echo $row->title; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pmates">Project Mates (Team Members)</label>
                        <textarea name="pmates" id="pmates" placeholder="Enter names separated by commas"><?php echo $row->pmates; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tech">Technologies Used</label>
                        <textarea name="tech" id="tech" required placeholder="e.g. PHP, MySQL, Bootstrap"><?php echo $row->tech; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">GitHub Link (*)</label>
                        <input type="url" name="link" id="link" placeholder="https://github.com/username/project-repo" value="<?php echo htmlspecialchars($row->link ?? ''); ?>" />
                    </div>

                    <div class="form-group full-width">
                        <label for="descr">Detailed Description</label>
                        <textarea name="descr" id="descr" style="min-height: 150px;"><?php echo $row->descr; ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label for="future">Future Enhancements</label>
                        <textarea name="future" id="future"><?php echo $row->future; ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="btn-update">
                            <span class="glyphicon glyphicon-edit"></span> Update Project Record
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>