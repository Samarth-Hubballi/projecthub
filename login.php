<?php
// Keep the shared DB connection and the site navbar.
include_once('db.php');
include_once('index_navbar.php');

// Check for error messages in the URL - but don't echo anything yet!
$error_msg = "";
if (isset($_GET['err'])) {
    $err = $_GET['err'];
    switch ($err) {
        case 'wrong_pwd':
            $error_msg = "Incorrect password. Please try again.";
            break;
        case 'user_not_found':
            $error_msg = "Username not found in our records.";
            break;
        case 'invalid_role':
            $error_msg = "Invalid login type selected.";
            break;
        case 'not_approved':
            $error_msg = "Your account is pending approval or has been rejected. Please contact the administrator.";
            break;
        default:
            $error_msg = "An error occurred. Please try again.";
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Projecthub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f1f5f9;
        }

        .login-hero {
            min-height: calc(100vh - 70px);
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/loginbg1.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            overflow: hidden; 
            padding-bottom: 25px;
        }

        .role-tabs {
            display: flex;
            background: #f8f9fa;
            border-bottom: 1px solid #eee;
            margin-bottom: 25px;
        }

        .role-tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.9rem;
            color: #94a3b8;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
            text-transform: uppercase;
        }

        .role-tab.active {
            color: #8b1528;
            border-bottom: 3px solid #8b1528;
            background: #fff;
        }

        .card-body {
            padding: 0 35px;
        }

        .login-card h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
            text-align: center;
        }

        .subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 25px;
        }

        /* FIXED: Error Alert Styling centered inside card */
        .error-alert {
            background-color: #fff1f2;
            color: #be123c;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #fecdd3;
            margin-bottom: 20px;
            font-size: 0.85rem;
            text-align: center;
            font-weight: 600;
        }

        .form-group label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            width: 100%;
        }

        .password-wrapper { position: relative; }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
        }

        .btn-primary-login {
            background: #8b1528;
            color: white;
            border: none;
            padding: 12px;
            font-weight: 700;
            width: 100%;
            border-radius: 8px;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-primary-login:hover {
            background: #6b0f1c;
            transform: translateY(-1px);
        }

        .footer-links {
            margin-top: 25px;
            text-align: center;
        }

        .footer-links a { color: #8b1528; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

<div class="login-hero">
    <div class="login-card">
        
        <div class="role-tabs">
            <div class="role-tab active" onclick="setRole('student', this)">Student</div>
            <div class="role-tab" onclick="setRole('guide', this)">Guide</div>
            <div class="role-tab" onclick="setRole('admin', this)">Admin</div>
        </div>

        <div class="card-body">
            <h2>Welcome Back</h2>
            <p class="subtitle">Sign in to your dashboard</p>

            <?php if ($error_msg !== ""): ?>
                <div class="error-alert">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo $error_msg; ?>
                </div>
            <?php endif; ?>

            <form action="chklogin.php" method="post" autocomplete="off">
                <input type="hidden" name="ltype" id="ltype" value="student">

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Username</label>
                    <input type="text" class="form-control" name="uname" placeholder="Enter username" required />
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required />
                        <span class="password-toggle" onclick="togglePasswordVisibility()">
                            <i class="glyphicon glyphicon-eye-open" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn-primary-login">Login Now</button>

                <div class="footer-links">
                    <a href="student_register.php" id="registerLink">New Student? Create an account</a>
                    <hr style="border-top: 1px solid #eee; margin: 20px 0;">
                    <a href="index.php" style="color: #64748b;">← Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const pwdField = document.getElementById('pwd');
        const toggleIcon = document.getElementById('toggleIcon');
        if (pwdField.type === 'password') {
            pwdField.type = 'text';
            toggleIcon.className = 'glyphicon glyphicon-eye-close';
        } else {
            pwdField.type = 'password';
            toggleIcon.className = 'glyphicon glyphicon-eye-open';
        }
    }

    function setRole(role, element) {
        document.getElementById('ltype').value = role;
        document.querySelectorAll('.role-tab').forEach(tab => tab.classList.remove('active'));
        element.classList.add('active');
        document.getElementById('registerLink').style.display = (role === 'student') ? 'block' : 'none';
    }
</script>

</body>
</html>