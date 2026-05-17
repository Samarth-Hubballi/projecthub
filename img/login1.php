<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e6eef5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url(img/loginbg.jpg) no-repeat center center fixed;
            background-size: cover;
        }

        .login-box {
            position: relative;
            width: 480px;
            background: rgba(13, 47, 79, 1);
            padding: 32px 30px 26px;
            border-radius: 12px;
            color: #fff;
            box-shadow:
                0 0 20px rgba(0, 229, 255, 1),
                0 0 40px rgba(142, 68, 173, 1),
                0 0 60px rgba(255, 0, 255, 1);
            animation: neonGlow 3.5s ease-in-out infinite;
        }

        @keyframes neonGlow {
            0%,
            100% {
                box-shadow:
                    0 0 18px rgba(0, 229, 255, 0.99),
                    0 0 38px rgba(142, 68, 173, 0.99),
                    0 0 55px rgba(255, 0, 255, 0.99);
            }
            50% {
                box-shadow:
                    0 0 25px rgba(0, 255, 153, 0.99),
                    0 0 45px rgba(255, 0, 68, 0.99),
                    0 0 70px rgba(0, 229, 255, 0.99);
            }
        }

        .login-box h2 {
            margin: 0 0 10px;
            font-size: 22px;
            letter-spacing: 0.6px;
        }

        .tabs {
            display: flex;
            gap: 8px;
            margin: 18px 0 22px;
        }

        .tabs button {
            flex: 1;
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .tabs button.active {
            background: #ff7a00;
            color: #111;
        }

        .tabs button:hover {
            background: rgba(255, 255, 255, 0.28);
        }

        label {
            display: block;
            margin-top: 14px;
            font-size: 14px;
            font-weight: 600;
            opacity: 0.9;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: none;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            background: #1e88e5;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .login-btn:hover {
            background: #1565c0;
        }

        .note {
            text-align: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 14px;
        }

        .brand {
            text-align: center;
            margin-bottom: 6px;
            font-size: 14px;
            letter-spacing: 0.7px;
            opacity: 0.85;
        }

        .register-link {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .register-link:hover {
            text-decoration: underline;
            color: #ff7a00;
        }
    </style>
</head>
<body>

<div class="login-box">
    <div class="brand">Project Repository System</div>
    <h2>Login</h2>

    <div class="tabs">
        <button type="button" class="active" data-type="admin" onclick="setLoginType('admin', this)">Admin</button>
        <button type="button" data-type="guide" onclick="setLoginType('guide', this)">Guide</button>
        <button type="button" data-type="student" onclick="setLoginType('student', this)">Student</button>
    </div>

    <form name="f1" action="chklogin.php" method="post">
        <input type="hidden" name="ltype" id="ltype" value="admin" />

        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname" placeholder="Enter username" required />

        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd" placeholder="Enter password" required />

        <button type="submit" name="submit" class="login-btn">Login</button>
    </form>
    <div>
        <center>
            <a href="student_register.php" class="register-link">New Student? Register here</a>
        </center>
    </div>
    <div class="note">Select the correct user type and enter your credentials.</div>
</div>

<script>
    function setLoginType(type, button) {
        document.getElementById('ltype').value = type;

        var tabs = document.querySelectorAll('.tabs button');
        tabs.forEach(function (btn) {
            btn.classList.toggle('active', btn === button);
        });
    }
</script>

</body>
</html>
