<?php
    include_once('db.php');
    include_once('adminnavbar.php'); // Keeps the admin context

    // Capture Data
    $sino = $_REQUEST['sino'];
    $name = $_REQUEST['name'];
    $quali = $_REQUEST['quali'];
    $contno = $_REQUEST['contno'];
    $deptid = $_REQUEST['deptid'];
    $uname = $_REQUEST['uname'];
    $pwd = $_REQUEST['pwd'];
    $sque = $_REQUEST['sque'];
    $ans = $_REQUEST['ans'];
    $current_image = $_FILES['imgname']['name'];

    // 1. Validate File Extension First
    $extension = strtolower(pathinfo($current_image, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png");

    if (!in_array($extension, $allowed_extensions)) {
        display_message("Invalid File Type", "Please upload a JPG or PNG image.", "danger", "guideform.php");
        die();
    }

    // 2. Insert into Database
    $sql = "INSERT INTO guides VALUES($sino,'$name','$quali','$contno','$deptid','$uname','$pwd','$sque','$ans','$current_image')";
    $res = execute($sql);

    // 3. Handle File Upload
    $destination = "photos/" . $current_image;
    $action = move_uploaded_file($_FILES['imgname']['tmp_name'], $destination);

    if (!$action) {
        display_message("Upload Error", "Guide saved, but photo upload failed.", "warning", "guideform.php");
        die();
    }

    // Helper function for the UI
    function display_message($title, $msg, $type, $link) {
        $color = ($type == "danger") ? "#d9534f" : "#8B1528";
        echo "
        <head>
            <link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap' rel='stylesheet'>
            <style>
                body { background-color: #f8fafc; font-family: 'Inter', sans-serif; }
                .msg-card { 
                    max-width: 500px; margin: 100px auto; background: white; 
                    border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
                    text-align: center; overflow: hidden; border-top: 6px solid $color;
                }
                .header { padding: 30px; background: #fff1f2; color: $color; font-size: 40px; }
                .body { padding: 30px; }
                .btn { 
                    display: inline-block; background: #8B1528; color: white !important; 
                    padding: 10px 25px; border-radius: 6px; text-decoration: none; 
                    font-weight: 600; margin-top: 20px; transition: 0.3s;
                }
                .btn:hover { background: #630d1a; transform: translateY(-2px); }
            </style>
        </head>
        <body>
            <div class='msg-card'>
                <div class='header'><span class='glyphicon glyphicon-user'></span></div>
                <div class='body'>
                    <h2 style='margin-top:0; color:#1e293b;'>$title</h2>
                    <p style='color:#64748b;'>$msg</p>
                    <a href='$link' class='btn'>Return to Form</a>
                </div>
            </div>
        </body>";
    }

    // Success Message
    display_message("Guide Registered!", "Faculty member <strong>$name</strong> has been added to the system successfully.", "success", "guideform.php");
?>