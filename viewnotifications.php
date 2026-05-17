<?php
include_once('mynavbar.php');
include_once('db.php');

// Assuming you store the student's department in the session during login
// If your session variable is named differently, adjust it here.
$student_dept = $_SESSION['department'] ?? 'all'; 

$sql = "SELECT * FROM dept";
$res = execute($sql);
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; }
    .notification-header {
        background: white; padding: 40px 0; margin-bottom: 30px;
        border-bottom: 4px solid #8B1528; box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }
    .notification-header h2 { color: #8B1528; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
    
    .filter-box { max-width: 500px; margin: 0 auto; }
    .custom-select {
        height: 45px !important; border: 2px solid #eee; border-radius: 25px;
        padding: 0 20px; font-weight: 600; color: #555; transition: 0.3s;
        appearance: none; -webkit-appearance: none;
    }
    .custom-select:focus { border-color: #8B1528; box-shadow: none; outline: none; }
    
    #loader { display: none; text-align: center; margin: 20px 0; color: #8B1528; }
    .spinning { animation: spin 1s infinite linear; display: inline-block; }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    
    /* Badge for personalized view */
    .dept-badge {
        background: #8B1528; color: gold; padding: 5px 15px;
        border-radius: 15px; font-size: 12px; display: inline-block; margin-top: 10px;
    }
</style>

<div class="notification-header text-center">
    <div class="container">
        <h2><span class="glyphicon glyphicon-bell"></span> Notifications</h2>
        <p class="text-muted">Stay updated with your department's latest news</p>
        
        <?php if($student_dept !== 'all'): ?>
            <div class="dept-badge">
                Showing updates for: <b><?php echo htmlspecialchars($student_dept); ?></b>
            </div>
        <?php endif; ?>

        <div class="filter-box mt-4">
            <label style="font-size: 12px; color: #888;">Switch Department View:</label>
            <select name="deptid" id="deptid" class="form-control custom-select">
                <option value="all">View All Departments</option>
                <?php while($row = $res->fetch_object()): ?>
                    <option value="<?php echo $row->deptname; ?>" <?php echo ($student_dept == $row->deptname) ? 'selected' : ''; ?>>
                        <?php echo $row->deptname; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>
</div>

<div class="container">
    <div id="loader">
        <span class="glyphicon glyphicon-refresh spinning"></span> Loading updates...
    </div>
    <div id="notiresult"></div>
</div>

<script>
$(document).ready(function(){
    // 1. Get student's department from PHP session (passed to JS)
    // If not logged in, it defaults to 'all'
    var userDept = "<?php echo $_SESSION['department'] ?? 'all'; ?>";

    // 2. Set the dropdown to match the user's department automatically
    $("#deptid").val(userDept);

    // 3. Initial Load using the student's department
    loadNotifications(userDept);

    $("#deptid").change(function(){
        loadNotifications($(this).val());
    });

    function loadNotifications(dept) {
        $("#loader").show();
        $("#notiresult").css('opacity', '0.5');
        
        $("#notiresult").load("getnotifications.php", {deptid: dept}, function() {
            $("#loader").hide();
            $("#notiresult").css('opacity', '1');
        });
    }
});
</script>