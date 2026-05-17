<?php
session_start();
include_once('db.php');

$ltype = trim((string)($_REQUEST['ltype'] ?? ''));
$uname = trim((string)($_REQUEST['uname'] ?? ''));
$pwd   = (string)($_REQUEST['pwd'] ?? '');

// 1. ADMIN LOGIN
if ($ltype === 'admin') {
    if ($uname === 'admin' && $pwd === 'admin') {
        $_SESSION['role'] = 'admin';
        header('Location: adminhomepage.php');
        exit;
    } else {
        // Redirect back with error code
        header('Location: login.php?err=wrong_pwd');
        exit;
    }
} 

// 2. GUIDE LOGIN
elseif ($ltype === 'guide') {
    $conn = mysqli_connect('localhost', 'root', '', 'pts');
    $unameEsc = mysqli_real_escape_string($conn, $uname);
    $pwdEsc = mysqli_real_escape_string($conn, $pwd);

    $sql = "SELECT g.deptid, uname, deptname FROM guides g, dept d 
            WHERE (uname='$unameEsc' AND pwd='$pwdEsc' AND g.deptid=d.deptid)";
    
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($res);

    if ($row) {
        $_SESSION['uname'] = $uname;
        $_SESSION['deptid'] = $row->deptid;
        $_SESSION['deptname'] = $row->deptname;
        header('Location: guidehomepage.php');
        exit;
    } else {
        header('Location: login.php?err=wrong_pwd');
        exit;
    }
} 

// 3. STUDENT LOGIN
// Find the student section in chklogin.php and update the logic:

elseif ( $ltype === 'student' )
{
    $conn = mysqli_connect('localhost','root','','pts');
    $unameEsc = mysqli_real_escape_string( $conn, $uname );
    
    // FETCH THE STATUS COLUMN TOO
    $sql = "SELECT id, password, name, status FROM students WHERE username='$unameEsc' LIMIT 1";
    $res = mysqli_query( $conn, $sql );
    $row = $res ? mysqli_fetch_assoc( $res ) : null;

    if ( $row && password_verify($pwd, $row['password']) )
    {
        // ADD THIS CHECK FOR APPROVAL
        if($row['status'] !== 'Approved') {
            header('Location: login.php?err=not_approved');
            exit;
        }

        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];
        header('Location: student_dashboard.php');
        exit;
    }
    else {
        header('Location: login.php?err=wrong_pwd');
        exit;
    }
}

// 4. INVALID TYPE
else {
    header('Location: login.php?err=invalid_role');
    exit;
}
?>