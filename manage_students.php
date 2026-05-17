<?php
// 1. DATABASE CONNECTION FIRST
include_once('db.php');

// 2. LOGIC SECTION (MUST BE BEFORE ANY HTML OR INCLUDES)
if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = ($_GET['action'] == 'approve') ? 'Approved' : 'Rejected';
    
    $update_sql = "UPDATE students SET status = '$status' WHERE id = '$id'";
    
    // Execute the query (assuming your db.php uses $conn)
    mysqli_query($conn, $update_sql);
    
    // Redirect now - this will work because no HTML has been sent yet
    header("Location: manage_students.php?msg=updated");
    exit;
}

// 3. START OUTPUTTING HTML AFTER LOGIC
include_once('adminnavbar.php');

// Fetch students list
$students = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>

<div class="container" style="margin-top: 30px;">
    <div class="welcome-section" style="border-bottom: 4px solid #8B1528; padding: 20px; background: white; border-radius: 10px; margin-bottom: 20px;">
        <h2 style="color: #8B1528; font-weight: 700;">Student Management</h2>
        <p>Review and manage student access permissions.</p>
    </div>

    <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-success">Status updated successfully!</div>
    <?php endif; ?>

    <div class="table-responsive" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Current Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($students)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><strong><?php echo $row['name']; ?></strong></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td>
                        <?php 
                            $class = "label-warning";
                            if($row['status'] == 'Approved') $class = "label-success";
                            if($row['status'] == 'Rejected') $class = "label-danger";
                        ?>
                        <span class="label <?php echo $class; ?>" style="font-size: 12px; padding: 5px 10px;">
                            <?php echo $row['status'] ?: 'Pending'; ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                        <?php if($row['status'] != 'Approved'): ?>
                            <a href="manage_students.php?id=<?php echo $row['id']; ?>&action=approve" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-ok"></i> Approve
                            </a>
                        <?php endif; ?>
                        
                        <?php if($row['status'] != 'Rejected'): ?>
                            <a href="manage_students.php?id=<?php echo $row['id']; ?>&action=reject" class="btn btn-sm btn-danger">
                                <i class="glyphicon glyphicon-remove"></i> Reject
                            </a>
                        <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>