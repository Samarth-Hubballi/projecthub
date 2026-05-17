<?php
include_once('db.php');

session_start();
$uname = $_SESSION['uname'];

// Fetch current guide data
$sql = "select * from guides where uname='$uname' ";
$res = execute($sql);
$row = $res->fetch_object();
$sino = $row->sino;
?>

<html>
<head>
    <title>Edit Profile | Guide Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="check.js"></script>
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
            margin: 0;
            padding: 20px;
        }

        .profile-container {
            max-width: 500px;
            margin: 40px auto;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528;
        }

        /* Avatar Section */
        .avatar-header {
            background: #fff;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 1px solid #f1f5f9;
        }

        .image-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 15px;
        }

        .profile-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: fill;
            border: 4px solid #f1f5f9;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .change-photo-btn {
            display: block;
            font-size: 0.8rem;
            color: #8B1528;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .change-photo-btn:hover {
            color: #630d1a;
            text-decoration: underline;
        }

        /* Form Styling */
        .form-content {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        .btn-update {
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

        .btn-update:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            margin: 0;
            color: #1e293b;
            font-size: 1.25rem;
        }
    </style>
</head>

<body>

<div class="profile-container">
    <div class="profile-card">
        <div class="avatar-header">
            <div class="image-wrapper">
                <img src="photos/<?php echo $row->imgname ?>" class="profile-img" alt="Profile Picture">
            </div>
            <a href="uploadimage.php" class="change-photo-btn">
                <span class="glyphicon glyphicon-camera"></span> Change Picture
            </a>
        </div>

        <div class="form-content">
            <div class="section-title">
                <h2>Account Settings</h2>
            </div>

            <form name="f1" action="updateguide.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="sino" value="<?php echo $sino; ?>" />

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required value="<?php echo $row->name; ?>" placeholder="Full Name" />
                </div>

                <div class="form-group">
                    <label>Qualification</label>
                    <input type="text" name="quali" required value="<?php echo $row->quali; ?>" placeholder="Qualification" />
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contno" required value="<?php echo $row->contno; ?>" 
                           onkeypress="return isDigit();" maxlength="10" placeholder="Mobile Number" />
                </div>

                <div class="form-group">
                    <label>Account Password</label>
                    <input type="password" name="pwd" required value="<?php echo $row->pwd; ?>" placeholder="Enter New Password" />
                </div>

                <button type="submit" name="submit" class="btn-update">
                    Update Profile
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>