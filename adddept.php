<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    // Auto-generate Dept ID
    $sql = "select count(*)+1 as did from dept";
    $res = execute($sql);
    $row = $res->fetch_object();
    $did = "D-" . $row->did;
?>

<html>
<head>
    <title>Add Department | Admin Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .form-wrapper {
            max-width: 500px;
            margin: 60px auto;
        }

        .dept-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528; /* Theme Maroon */
        }

        .card-header {
            padding: 25px;
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            text-align: center;
        }

        .card-header h3 {
            color: #8B1528;
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 30px;
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
        }

        /* Modern Input Styling */
        input[type='text'] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input[type='text']:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        /* Readonly / System Generated Style */
        .readonly-id {
            background-color: #f1f5f9;
            color: #64748b;
            font-weight: 700;
            cursor: not-allowed;
            border-style: dashed !important;
        }

        /* Themed Submit Button */
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
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-save:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .info-text {
            font-size: 0.8rem;
            color: #94a3b8;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="form-wrapper">
    <div class="dept-card">
        <div class="card-header">
            <h3><span class="glyphicon glyphicon-plus-sign"></span> Add New Department</h3>
        </div>

        

        <div class="card-body">
            <form name="f1" action="savedept.php" method="post">
                
                <div class="form-group">
                    <label for="did">Department ID (System Generated)</label>
                    <input type="text" name="did" id="did" value="<?php echo $did ?>" readonly class="readonly-id" />
                </div>

                <div class="form-group">
                    <label for="deptname">Full Department Name</label>
                    <input type="text" name="deptname" id="deptname" required placeholder="e.g. Computer Science and Engineering" />
                </div>

                <button type="submit" class="btn-save">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Save Department
                </button>

                <p class="info-text">
                    This department will be immediately available for project registration and guide assignment.
                </p>
            </form>
        </div>
    </div>
</div>

</body>
</html>