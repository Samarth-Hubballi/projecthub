<?php
    // It's a good practice to include session_start and auth checks at the very top
    if (!headers_sent() && session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Safety check: if uname isn't in session, redirect or handle error
    $uname = $_SESSION['guide_name'] ?? $_SESSION['uname'] ?? ''; 
    
    include_once('db.php');
    // include_once('navbar.php'); // Using your consistent navbar
        
    $sql = "SELECT g.name, g.quali, g.contno, d.deptname, g.uname, g.imgname 
            FROM guides g 
            LEFT JOIN dept d ON g.deptid = d.deptid 
            WHERE g.uname = '$uname'";
            
    $res = execute($sql);
    $row = $res->fetch_object();
?>

<head>
    <title>My Profile | projecthub</title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            border-bottom: 5px solid #8B1528;
        }

        .profile-header {
            background: #8B1528;
            padding: 20px;
            text-align: initial;
            color: white;
        }

        .profile-header h2 {
            margin: 10px 0 5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-img-wrap {
            width: 150px;
            height: 150px;
            margin: -75px auto 15px; /* Pulls half the image up into the maroon header */
            border-radius: 50%;
            border: 5px solid white;
            overflow: hidden;
            background: #eee;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .profile-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        .profile-body {
            padding: 20px 40px 40px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #8B1528;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .value {
            color: #333;
            font-weight: 500;
        }

        .btn-edit {
            display: block;
            width: 100%;
            text-align: center;
            background: #f8e8ea;
            color: #8B1528;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            margin-top: 25px;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background: #8B1528;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="profile-container">
        <div class="profile-header">
            <div style="height: 60px;"></div> <h2><?php echo $row->name; ?></h2>
            <p style="opacity: 0.9;">Project Guide / Faculty</p>
        </div>

        <div class="profile-img-wrap">
            <?php 
                $photo = (!empty($row->imgname)) ? "photos/".$row->imgname : "img/default-user.png";
            ?>
            <img src="<?php echo $photo; ?>" alt="Profile Picture">
        </div>

        <div class="profile-body">
            <div class="info-row">
                <span class="label">Full Name</span>
                <span class="value"><?php echo $row->name; ?></span>
            </div>
            
            <div class="info-row">
                <span class="label">Qualification</span>
                <span class="value"><?php echo $row->quali; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Department</span>
                <span class="value"><?php echo $row->deptname; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Contact Number</span>
                <span class="value"><?php echo $row->contno; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Username</span>
                <span class="value"><?php echo $row->uname; ?></span>
            </div>

            <a href="editprofile.php" class="btn-edit">
                <span class="glyphicon glyphicon-edit"></span> Edit Profile Details
            </a>
        </div>
    </div>
</div>

</body>
</html>