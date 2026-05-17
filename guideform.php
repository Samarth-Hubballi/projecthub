<?php
include_once('db.php');
include_once('adminnavbar.php');

// Fetch auto-incremented SI No
$sql = "select count(*)+1 as sino from guides";
$res = execute($sql);
$row = $res->fetch_object();
$sino = $row->sino;

// Fetch Departments for dropdown
$sql = "select * from dept";
$res_dept = execute($sql);
?>

<head>
    <title>Guide Registration | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="check.js"></script>
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .guide-form-container {
            max-width: 850px;
            margin: 40px auto;
        }

        .form-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528;
        }

        .card-header {
            padding: 25px 35px;
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
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
            padding: 35px;
        }

        /* Form Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            display: block;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 21, 40, 0.1);
        }

        /* Button Styling */
        .btn-submit {
            background-color: #8B1528;
            color: white;
            border: none;
            padding: 15px 30px;
            width: 100%;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .section-title {
            grid-column: span 2;
            margin: 10px 0 5px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #f1f5f9;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
            .section-title { grid-column: span 1; }
        }
    </style>
</head>

<body>

<div class="container guide-form-container">
    <div class="form-card">
        <div class="card-header text-center">
            <h2><span class="glyphicon glyphicon-user"></span> Guide Registration</h2>
        </div>

        <div class="card-body">
            <form name="f1" action="saveguide.php" method="post" enctype="multipart/form-data">
                <div class="form-grid">
                    
                    <div class="section-title">BASIC INFORMATION</div>
                    
                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="sino" class="form-input" value="<?php echo $sino; ?>" readonly style="background: #f1f5f9;" />
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-input" required placeholder="Dr. John Doe" onkeypress="return isAlpha();" />
                    </div>

                    <div class="form-group">
                        <label>Qualification</label>
                        <input type="text" name="quali" class="form-input" required placeholder="M.Tech, Ph.D" />
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select name="deptid" class="form-input" required>
                            <option value="">Select Department</option>
                            <?php while($row_dept = $res_dept->fetch_object()): ?>
                                <option value="<?php echo $row_dept->deptid; ?>"><?php echo $row_dept->deptname; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="section-title">ACCOUNT & CONTACT</div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contno" class="form-input" required maxlength="10" placeholder="10-digit number" onkeypress="return isDigit();" />
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-input" required placeholder="Unique Username" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwd" class="form-input" required placeholder="••••••••" />
                    </div>

                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" name="imgname" class="form-input" required />
                    </div>

                    <div class="section-title">SECURITY RECOVERY</div>

                    <div class="form-group">
                        <label>Security Question</label>
                        <select name="sque" class="form-input">
                            <option value='What is your Pet Name ?'>What is your Pet Name ?</option>
                            <option value='Which is your favt Color ?'>What is your favt Color ?</option>
                            <option value='Your favt Dish ?'>Your favt Dish ?</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Security Answer</label>
                        <input type="text" name="ans" class="form-input" required placeholder="Secret Answer" />
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="btn-submit">
                            <span class="glyphicon glyphicon-save"></span> Create Guide Account
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

</body>