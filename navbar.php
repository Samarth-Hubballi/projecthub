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
            padding: 15px 0;
            transition: all 0.3s ease;
            margin-bottom: 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .navbar-default .navbar-brand {
            color: #8B1528 !important;
            font-weight: 700;
            font-size: 26px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #4a0813 !important;
        }

        .navbar-default .navbar-nav > li > a {
            color: #333333 !important;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding-left: 20px;
            padding-right: 20px;
            text-transform: uppercase;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #8B1528 !important;
        }

        .navbar-default .navbar-nav > .active > a, 
        .navbar-default .navbar-nav > .active > a:hover, 
        .navbar-default .navbar-nav > .active > a:focus {
            color: #8B1528 !important;
            background-color: transparent !important;
            font-weight: 700;
        }

        /* Dropdown Styling */
        .navbar-default .navbar-nav .dropdown-menu {
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 10px 0;
            background-color: #ffffff;
        }

        .navbar-default .navbar-nav .dropdown-menu > li > a {
            padding: 10px 20px;
            font-weight: 500;
            text-transform: none; /* Keep dropdown items natural case */
            color: #333 !important;
            transition: background 0.2s;
        }

        .navbar-default .navbar-nav .dropdown-menu > li > a:hover {
            background-color: #f8f9fa;
            color: #8B1528 !important;
        }

        /* Styling for when the dropdown is open */
        .navbar-default .navbar-nav > .open > a, 
        .navbar-default .navbar-nav > .open > a:hover, 
        .navbar-default .navbar-nav > .open > a:focus {
            background-color: transparent !important;
            color: #8B1528 !important;
        }

        .navbar-default .navbar-toggle {
            border-color: #8B1528;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #8B1528;
        }
    </style>

    <link rel="stylesheet" href="css/unipix.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Projecthub</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;About <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="aboutapp.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;About the app</a></li>
            <li><a href="aboutfaculty.php"><span class="glyphicon glyphicon-education"></span>&nbsp;About Faculty</a></li>
          </ul>
        </li>

        <li><a href="viewnotifications.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Notifications</a></li>
        <li><a href="synopsis.php"><span class="glyphicon glyphicon-file"></span>&nbsp;View Formats</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Register/Login</a></li>
      </ul>
    </div></div></nav>

<div class="container" style="margin-top: 20px;">
    </div>

</body>
</html>