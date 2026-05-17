<?php
session_start();

// Check if session exists to prevent unauthorized access
if (!isset($_SESSION['deptid'])) {
    echo "ERR_AUTH";
    exit();
}

include_once('db.php');

$did = $_SESSION['deptid'];
$deptname = $_SESSION['deptname'];
$year = isset($_REQUEST['year']) ? intval($_REQUEST['year']) : date('Y');

/** * We use a sanitized query to count existing projects for the specific year.
 * Added 'LPAD' logic or simple leading zeros if you want 001, 002 format.
 */
$sql = "SELECT COUNT(*) as total FROM projects WHERE deptid = '$did' AND year = $year";

try {
    $res = execute($sql);
    if ($res) {
        $row = $res->fetch_object();
        
        // Calculate the next sequence number
        $next_sino = $row->total + 1;
        
        /**
         * Enhancement: Formatted Serial Number
         * Using str_pad to turn '1' into '001'. 
         * This makes the Project IDs look much more professional in your reports.
         */
        $formatted_sino = str_pad($next_sino, 3, '0', STR_PAD_LEFT);
        
        // Clean the Department name (remove spaces for the ID)
        $clean_dept = strtoupper(str_replace(' ', '', $deptname));
        
        // Final ID Format: CS-2026-001
        $project_id = $clean_dept . "-" . $year . "-" . $formatted_sino;
        
        // Output only the string for jQuery to pick up
        echo trim($project_id);
    } else {
        echo "ERR_DB";
    }
} catch (Exception $e) {
    echo "ERR_SERVER";
}
?>