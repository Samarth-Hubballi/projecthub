<?php
include_once('db.php');
include_once('index_navbar.php');

// 1. Fetch departments from the 'dept' table
$dept_query = "SELECT deptname FROM dept ORDER BY deptname ASC";
$dept_result = execute($dept_query);

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username   = trim((string)($_POST['username'] ?? ''));
    $password   = password_hash((string)($_POST['password'] ?? ''), PASSWORD_DEFAULT);
    $name       = trim((string)($_POST['name'] ?? ''));
    $email      = trim((string)($_POST['email'] ?? ''));
    $department = trim((string)($_POST['department'] ?? ''));
    $student_id = trim((string)($_POST['student_id'] ?? ''));

    $fields = [
        'username'   => $username,
        'password'   => $password,
        'name'       => $name,
        'email'      => $email,
        'department' => $department,
        'student_id' => $student_id
    ];

    $check = execute("SELECT id FROM students WHERE username='" . addslashes($username) . "'");
    
    if ($check && mysqli_num_rows($check) > 0) {
        $message = '<div class="alert alert-danger" style="border-radius:10px;"><b>Error:</b> Username is already taken.</div>';
    } else {
        $sql = insert('students', $fields);
        if(execute($sql)) {
            $message = '<div class="alert alert-success" style="border-radius:10px;"><b>Success!</b> Account created. <a href="login.php" class="alert-link">Click here to login</a></div>';
        } else {
            $message = '<div class="alert alert-warning" style="border-radius:10px;">Something went wrong. Please try again.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration | ProjectHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Styles remain the same as your previous design */
        body { font-family: 'Inter', sans-serif; margin: 0; }
        .register-hero {
            min-height: calc(100vh - 70px);
            background: linear-gradient(rgba(15, 18, 25, 0.65), rgba(15, 18, 25, 0.65)), url('img/sjvp.jpeg') center/cover no-repeat;
            display: flex; align-items: center; justify-content: center; padding: 40px 15px;
        }
        .register-card {
            max-width: 480px; width: 100%; background: rgba(255, 255, 255, 0.98);
            border-radius: 20px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4); padding: 35px;
        }
        .register-card h2 { font-weight: 700; color: #8b1528; margin-bottom: 5px; text-align: center; }
        .register-card p.subtitle { text-align: center; color: #64748b; margin-bottom: 25px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { font-weight: 600; color: #475569; display: block; margin-bottom: 8px; }
        .form-control {
            height: 45px; border-radius: 8px; border: 1.5px solid #e2e8f0;
            padding: 10px 15px; width: 100%; box-sizing: border-box; transition: all 0.3s;
        }
        .form-control:focus { border-color: #8b1528; outline: none; box-shadow: 0 0 0 3px rgba(139, 21, 40, 0.1); }
        .password-wrapper { position: relative; }
        .password-toggle { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; }
        .btn-register {
            background: #8b1528; color: white; border: none; padding: 14px;
            font-weight: 700; width: 100%; border-radius: 8px; cursor: pointer; margin-top: 15px;
        }
        .btn-register:hover { background: #6b0f1c; transform: translateY(-1px); }
        .footer-links { margin-top: 25px; text-align: center; border-top: 1px solid #f1f5f9; padding-top: 20px; }
        .footer-links a { color: #8b1528; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

<div class="register-hero">
    <div class="register-card">
        <h2>Student Join</h2>
        <p class="subtitle">Create your project management account</p>

        <?php echo $message; ?>

        <form method="post" autocomplete="off">
            <div class="form-group">
                <label for="student_id"><span class="glyphicon glyphicon-barcode"></span> Student ID</label>
                <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter your student ID" required>
            </div>

            <div class="form-group">
                <label for="name"><span class="glyphicon glyphicon-user"></span> Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" required>
            </div>

            <div class="form-group">
                <label for="username"><span class="glyphicon glyphicon-tag"></span> Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Choose a unique username" required>
            </div>

            <div class="form-group">
                <label for="department"><span class="glyphicon glyphicon-th-list"></span> Department</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="" disabled selected>Select your department</option>
                    <?php 
                    // 2. Loop through the departments from the database
                    if ($dept_result && mysqli_num_rows($dept_result) > 0) {
                        while ($row = mysqli_fetch_assoc($dept_result)) {
                            // Assuming your column name is 'dept_name'
                            echo '<option value="' . htmlspecialchars($row['deptname']) . '">' . htmlspecialchars($row['deptname']) . '</option>';
                        }
                    } else {
                        echo '<option value="">No departments found</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@university.com" required>
            </div>

            <div class="form-group">
                <label for="password"><span class="glyphicon glyphicon-lock"></span> Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Create a strong password" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        <i class="glyphicon glyphicon-eye-open" id="toggleIcon"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn-register">Complete Registration</button>

            <div class="footer-links">
                <p style="color: #64748b; font-size: 0.9rem;">Already registered? <a href="login.php">Login here</a></p>
                <a href="index.php" style="font-size: 13px; color: #94a3b8;">← Back to Home</a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const pwdField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        if (pwdField.type === 'password') {
            pwdField.type = 'text';
            toggleIcon.classList.replace('glyphicon-eye-open', 'glyphicon-eye-close');
        } else {
            pwdField.type = 'password';
            toggleIcon.classList.replace('glyphicon-eye-close', 'glyphicon-eye-open');
        }
    }
</script>

</body>
</html>