<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $sql = "SELECT * FROM dept";
    $res = execute($sql);
?>

<head>
    <title>Generate Project Reports | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .filter-wrapper {
            max-width: 800px;
            margin: 50px auto;
        }

        /* Header Section */
        .report-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-header h2 {
            color: #8B1528;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Card Styling */
        .filter-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-top: 5px solid #8B1528;
        }

        .form-group label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.05em;
        }

        /* Modern Inputs */
        .custom-input {
            height: 45px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0 15px;
            width: 100%;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .custom-input:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 21, 40, 0.1);
        }

        /* Submit Button */
        .btn-display {
            background-color: #8B1528;
            color: white;
            border: none;
            height: 45px;
            width: 100%;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 10px;
            cursor: pointer;
        }

        .btn-display:hover {
            background-color: #6b0f1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 21, 40, 0.2);
        }

        .input-icon {
            color: #94a3b8;
            margin-right: 5px;
        }
    </style>
</head>

<body>

<div class="container filter-wrapper">
    <div class="report-header">
        <h2><span class="glyphicon glyphicon-print"></span> Project Reports</h2>
        <p class="text-muted">Select a department and academic year to view the repository</p>
    </div>

    

    <div class="filter-card">
        <form name="f1" action="displayprojbyyear.php" method="post">
            <div class="row">
                <div class="col-md-7 mb-4">
                    <div class="form-group">
                        <label for="deptid"><span class="glyphicon glyphicon-education input-icon"></span> Choose Department</label>
                        <select name="deptid" id="deptid" class="custom-input">
                            <option value="">-- Select Department --</option>
                            <?php
                            while( $row=$res->fetch_object()) {
                                echo "<option value='$row->deptid'>$row->deptname</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-5 mb-4">
                    <div class="form-group">
                        <label for="year"><span class="glyphicon glyphicon-calendar input-icon"></span> Academic Year</label>
                        <input type="number" value="2026" name="year" id="year" class="custom-input" min="2000" max="2099" />
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-xs-12">
                    <button type="submit" name="submit" class="btn-display">
                        <span class="glyphicon glyphicon-search"></span> Fetch Project List
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="text-center mt-4 text-muted">
        <small><span class="glyphicon glyphicon-info-sign"></span> Reports are generated in real-time based on the current database state.</small>
    </div>
</div>

</body>
</html>