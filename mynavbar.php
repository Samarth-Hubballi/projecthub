<?php
if (!headers_sent() && session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projecthub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        /* Modern Unipix Navbar Overrides */
        .navbar-default {
            background-color: #ffffff;
            border-color: transparent;
            border-bottom: 1px solid #eee;
            padding: 12px 0;
            margin-bottom: 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .navbar-default .navbar-brand {
            color: #8B1528 !important;
            font-weight: 700;
            font-size: 24px;
            text-transform: uppercase;
        }

        .navbar-default .navbar-nav > li > a {
            color: #333333 !important;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > .open > a {
            color: #8B1528 !important;
            background-color: transparent !important;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 10px 0;
        }

        .dropdown-menu > li > a {
            padding: 10px 20px;
            font-weight: 500;
            color: #444 !important;
        }

        .dropdown-menu > li > a:hover {
            background-color: #f8f9fa;
            color: #8B1528 !important;
        }

        .text-danger-custom {
            color: #d9534f !important;
            font-weight: 600;
        }

        /* Profile styling */
        .user-name {
            color: #8B1528 !important;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Projecthub</a>
    </div>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;About <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="aboutapp.php"><span class="glyphicon glyphicon-phone"></span>&nbsp;About the app</a></li>
            <li><a href="aboutfaculty.php"><span class="glyphicon glyphicon-education"></span>&nbsp;About Faculty</a></li>
          </ul>
        </li>

        <li><a href="viewnotifications.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Notifications</a></li>
        <li><a href="synopsis.php"><span class="glyphicon glyphicon-file"></span>&nbsp;View Formats</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php if (!empty($_SESSION['student_name'])): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['student_name'], ENT_QUOTES, 'UTF-8'); ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="signout.php" class="text-danger-custom"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li>
            <a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Register / Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>