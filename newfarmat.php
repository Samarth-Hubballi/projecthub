<?php
include_once('db.php');
include_once('adminnavbar.php');

$message = "";

if (isset($_REQUEST['submit'])) {
    $caption = $_REQUEST['caption'];
    $current_image = $_FILES['imgname']['name'];
    $destination = "docs/" . $current_image;
    
    // Using move_uploaded_file for better security over copy()
    if (move_uploaded_file($_FILES['imgname']['tmp_name'], $destination)) {
        $sql = "INSERT INTO formats(caption, filename) VALUES ('$caption', '$current_image')";
        $res = execute($sql);
        $message = "success";
    } else {
        $message = "error";
    }
}
?>

<head>
    <title>Add Format | Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
        }

        .format-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528;
        }

        .card-header {
            padding: 30px;
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            text-align: center;
        }

        .card-header h2 {
            color: #8B1528;
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.4rem;
        }

        .card-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .form-control-custom {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        /* Themed File Input */
        input[type="file"] {
            background: #f8fafc;
            padding: 10px;
            border: 2px dashed #cbd5e1;
            cursor: pointer;
        }

        .btn-save {
            background-color: #8B1528;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            cursor: pointer;
        }

        .btn-save:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .alert-overlay {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
    </style>
</head>

<body>

<div class="container form-container">
    
    <?php if ($message == "success"): ?>
        <div class="alert-overlay alert-success">
            <span class="glyphicon glyphicon-ok-sign"></span> Format saved successfully!
        </div>
    <?php elseif ($message == "error"): ?>
        <div class="alert-overlay alert-error">
            <span class="glyphicon glyphicon-exclamation-sign"></span> Error uploading file.
        </div>
    <?php endif; ?>

    <div class="format-card">
        <div class="card-header">
            <h2><span class="glyphicon glyphicon-file"></span> Add Document Format</h2>
        </div>

        <div class="card-body">
            <form name="f1" action="?" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>File Caption / Title</label>
                    <input type="text" name="caption" class="form-control-custom" 
                           placeholder="e.g., Final Year Project Report Template" required />
                </div>

                <div class="form-group">
                    <label>Upload Format File (PDF/DOCX/TXT)</label>
                    <input type="file" name="imgname" class="form-control-custom" required />
                </div>

                <button type="submit" name="submit" class="btn-save">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Save Format
                </button>
                
            </form>
        </div>
    </div>
</div>

</body>