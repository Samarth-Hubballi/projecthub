<?php
    include_once('db.php');
    include_once('adminnavbar.php');
    
    $message_status = "";

    if( isset($_REQUEST['submit'] ) ) {
        // Mapping 'descr' from form to 'message' in DB if necessary
        $sql = insert('notifications', $_REQUEST);
        $res = execute($sql);
        $message_status = "success";
    } else {
        $sql = "select count(*)+1 as sino, curdate() as ndate from notifications";
        $res = execute($sql);
        $row = $res->fetch_object();
        $sino = $row->sino;
        $ndate = $row->ndate;
    }
?>

<html>
<head>
    <title>Post Notification | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="check.js"></script>

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
        }

        .notification-container {
            max-width: 600px;
            margin: 50px auto;
        }

        .notif-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border-top: 6px solid #8B1528; /* Theme Maroon */
            overflow: hidden;
        }

        .card-header {
            padding: 30px;
            text-align: center;
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

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .form-control-custom {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .form-control-custom:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        textarea.form-control-custom {
            min-height: 120px;
            resize: vertical;
        }

        .readonly-input {
            background-color: #f1f5f9;
            cursor: not-allowed;
            font-weight: 700;
            color: #64748b;
        }

        .btn-broadcast {
            background-color: #8B1528;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-broadcast:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        /* Success Message Overlay */
        .success-overlay {
            text-align: center;
            padding: 40px;
        }
        
        .success-icon {
            font-size: 50px;
            color: #10b981;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="notification-container">
    <div class="notif-card">
        
        <?php if($message_status == "success"): ?>
            <div class="success-overlay">
                <div class="success-icon">
                    <span class="glyphicon glyphicon-ok-circle"></span>
                </div>
                <h3 style="color: #065f46;">Notification Published!</h3>
                <p>The message has been broadcasted to the selected department.</p>
                <br>
                <a href="addnotification.php" class="btn btn-default" style="border-radius: 20px; padding: 10px 25px;">Post Another</a>
            </div>
        <?php else: ?>

            <div class="card-header">
                <h2><span class="glyphicon glyphicon-bullhorn"></span> Post New Notification</h2>
            </div>

            <div class="card-body">
                <form name="f1" action="?" method="post">
                    
                    <div class="form-group">
                        <label>Notification ID & Date</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="text" value="ID: <?php echo $sino?>" readonly class="form-control-custom readonly-input" style="flex: 1;" />
                            <input type="text" value="<?php echo date('d-M-Y', strtotime($ndate)); ?>" readonly class="form-control-custom readonly-input" style="flex: 2;" />
                        </div>
                        <input type="hidden" name="sino" value="<?php echo $sino; ?>" />
                        <input type="hidden" name="ndate" value="<?php echo $ndate; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Target Department</label>
                        <select name="deptid" id="deptid" class="form-control-custom" required>
                            <option value="">-- Choose target audience --</option>
                            <?php
                            $sql_dept = "select * from dept";
                            $res_dept = execute($sql_dept);
                            while($row_dept = $res_dept->fetch_object()) {
                                echo "<option value='$row_dept->deptid'>$row_dept->deptname Department</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Notification Message</label>
                        <textarea required name="message" id="message" class="form-control-custom" placeholder="Type your announcement here..."></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn-broadcast">
                        <span class="glyphicon glyphicon-send"></span> Broadcast Notification
                    </button>

                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>