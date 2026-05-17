<?php
include_once('db.php');
include_once('adminnavbar.php');
// Fetch some quick stats for the dashboard cards
$student_count = mysqli_num_rows(execute("SELECT * FROM students"));
$guide_count = mysqli_num_rows(execute("SELECT * FROM guides"));
$project_count = mysqli_num_rows(execute("SELECT * FROM projects"));
?>

<style>
    body {
        background-color: #f4f7f6;
        font-family: 'Poppins', sans-serif;
    }

    /* Top Institution Banner */
    .inst-banner {
        background: #8B1528;
        color: white;
        padding: 10px;
        text-align: center;
        font-weight: 700;
        letter-spacing: 1px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .welcome-section {
        background: white;
        padding: 30px;
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border-bottom: 4px solid #8B1528;
    }

    .welcome-section h2 {
        color: #8B1528;
        font-weight: 700;
        margin-bottom: 5px;
    }

    /* Dashboard Stat Cards */
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        transition: transform 0.3s;
        border: 1px solid #eee;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .stat-card i {
        font-size: 2.5rem;
        color: #8B1528;
        margin-bottom: 15px;
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: 800;
        margin: 0;
        color: #333;
    }

    .stat-card p {
        color: #777;
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 5px;
    }

    /* Hero Image Container */
    .hero-img-wrap {
        margin-top: 30px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .hero-img-wrap img {
        width: 100%;
        max-height: 400px;
        object-fit: fill;
    }
</style>

<div class="inst-banner">
    S.J.V.P FIRST GRADE COLLEGE, HARIHAR-577601
</div>

<div class="container">
    <div class="welcome-section text-center">
        <h2>Administrator Control Panel</h2>
        <p class="text-muted">Manage students, guides, and project repositories from one central hub.</p>
    </div>

    
    <div class="col-md-4 mb-4">
    <a href="manage_students.php" style="text-decoration: none; color: inherit;">
        <div class="stat-card">
            <i class="glyphicon glyphicon-user"></i>
            <h3><?php echo $student_count; ?></h3>
            <p>Registered Students (Manage)</p>
        </div>
    </a>
</div>
        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <i class="glyphicon glyphicon-briefcase"></i>
                <h3><?php echo $guide_count; ?></h3>
                <p>Faculty Guides</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="stat-card">
                <i class="glyphicon glyphicon-file"></i>
                <h3><?php echo $project_count; ?></h3>
                <p>Total Projects</p>
            </div>
        </div>
    </div>

    <div class="hero-img-wrap">
        <img src="img/sjvp.jpeg" class="img-responsive" alt="Campus View">
    </div>
</div>

<div class="text-center mt-5 mb-4 text-muted">
    <small>&copy; 2026 SJVP Project Tracking System | Admin Portal</small>
</div>