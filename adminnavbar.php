<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }

        /* Themed Navbar Styling */
        .navbar-custom {
            background-color: #8B1528; /* Maroon */
            border: none;
            border-radius: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .navbar-custom .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-custom .navbar-nav > li > a {
            color: rgba(255,255,255,0.85);
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-nav > li > a:hover, 
        .navbar-custom .navbar-nav > li > a:focus,
        .navbar-custom .navbar-nav > .active > a {
            background-color: rgba(255,255,255,0.15);
            color: #ffffff;
        }

        /* Dropdown Customization */
        .dropdown-menu {
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 10px 0;
        }

        .dropdown-menu > li > a {
            padding: 10px 20px;
            font-size: 13px;
            color: #333;
        }

        .dropdown-menu > li > a:hover {
            background-color: #f8e8ea;
            color: #8B1528;
        }

        .navbar-custom .navbar-toggle {
            border-color: #fff;
        }

        .navbar-custom .icon-bar {
            background-color: #fff;
        }

        /* Badge for logout icon */
        .logout-icon {
            margin-right: 8px;
            color: #ffcccc;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="adminhomepage.php">
                <span class="glyphicon glyphicon-stats" style="margin-right:10px;"></span>Admin Panel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="admin-nav">
            <ul class="nav navbar-nav">
                <li class="active"><a href="adminhomepage.php">Dashboard</a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departments <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="adddept.php">Add New Department</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="viewdept.php">View All Departments</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Guides <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="guideform.php">Add New Guide</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="viewguides.php">View All Guides</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addnotification.php">Create Notification</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="displaynotifications.php">Broadcast History</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="selectdept.php">Browse by Dept</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="selectdeptforreport.php">Generate Reports</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Formats <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="newfarmat.php">Upload Format</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="viewformat.php">Manage Formats</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: rgba(0,0,0,0.1);">
                        <span class="glyphicon glyphicon-cog"></span> System <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="signout.php">
                                <span class="glyphicon glyphicon-log-out logout-icon"></span> <strong>Secure Logout</strong>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>