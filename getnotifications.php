<?php
include('db.php');

// Get the department ID/Name from the request
$dept_input = $_REQUEST['deptid'] ?? 'all';

if ($dept_input == "all") {
    $sql = "SELECT * FROM notifications ORDER BY ndate DESC";
    $deptname = "All Departments";
} else {
    /* IMPORTANT: If you are passing a Name string from registration, 
       we first find the ID for that name to keep your notification query efficient.
    */
    $checkDept = execute("SELECT * FROM dept WHERE deptid='$dept_input' OR deptname='$dept_input'");
    
    if ($checkDept && $checkDept->num_rows > 0) {
        $drow = $checkDept->fetch_object();
        $actual_id = $drow->deptid;
        $deptname = $drow->deptname . " Department";
        
        $sql = "SELECT * FROM notifications WHERE deptid='$actual_id' ORDER BY ndate DESC";
    } else {
        // Fallback if department is not found
        $sql = "SELECT * FROM notifications ORDER BY ndate DESC";
        $deptname = "All Departments";
    }
}

$res = execute($sql);
?>

<style>
    /* Your existing CSS remains exactly as you provided */
    .notif-header { border-bottom: 2px solid #8B1528; padding-bottom: 10px; margin-bottom: 25px; }
    .notif-header h4 { color: #1e293b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
    .notif-header span { color: #8B1528; }
    .notif-card { 
        background: #ffffff; border-radius: 10px; padding: 15px 20px; margin-bottom: 15px; 
        display: flex; align-items: flex-start; gap: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); 
        border: 1px solid #e2e8f0; transition: transform 0.2s; 
    }
    .notif-card:hover { transform: translateX(5px); border-color: #8B1528; }
    .date-box { 
        background: #fdf2f2; color: #8B1528; padding: 5px 10px; border-radius: 6px; 
        font-size: 0.8rem; font-weight: 700; white-space: nowrap; min-width: 100px; 
        text-align: center; border: 1px solid rgba(139, 21, 40, 0.1); 
    }
    .message-content { color: #475569; font-size: 0.95rem; line-height: 1.5; flex: 1; }
    .new-badge { 
        background: #8B1528; color: white; font-size: 0.65rem; padding: 2px 6px; 
        border-radius: 4px; font-weight: 800; text-transform: uppercase; vertical-align: middle; 
        margin-right: 8px; animation: pulse 2s infinite; 
    }
    @keyframes pulse { 0% { opacity: 1; } 50% { opacity: 0.6; } 100% { opacity: 1; } }
    .empty-state { text-align: center; padding: 40px; color: #94a3b8; }
</style>

<div class="notif-header">
    <h4><span class="glyphicon glyphicon-bell"></span> Notifications: <span><?php echo $deptname; ?></span></h4>
</div>

<?php
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
        $isNew = (strtotime($row->ndate) > strtotime('-3 days'));
?>
        <div class="notif-card">
            <div class="date-box">
                <span class="glyphicon glyphicon-calendar"></span> <?php echo $row->ndate; ?>
            </div>
            <div class="message-content">
                <?php if ($isNew) echo '<span class="new-badge">New</span>'; ?>
                <?php echo $row->message; ?>
            </div>
        </div>
<?php
    }
} else {
    echo '<div class="empty-state">
            <span class="glyphicon glyphicon-option-horizontal" style="font-size: 30px;"></span>
            <p>No active notifications for this department.</p>
          </div>';
}
?>