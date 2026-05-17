<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ProjectHub</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
            color: #444;
            padding-top: 100px; 
        }

        /* --- Enhanced Navbar --- */
        .navbar-default {
            background-color: rgba(255, 255, 255, 0.98);
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 10px 0;
            z-index: 9999 !important;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 22px;
            color: #8B1528 !important;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
        }

        /* --- Page Content --- */
        .about-block {
            background: #fff;
            padding: 45px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 50px;
            border-left: 6px solid #8B1528;
        }

        .section-title {
            color: #8B1528;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
        }

        .feature-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            border: 1px solid #eee;
            transition: 0.3s;
            height: 100%;
        }

        .feature-box:hover {
            border-color: #8B1528;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .feature-icon {
            font-size: 28px;
            color: #D4AF37;
            margin-bottom: 15px;
        }

        /* --- Developer Cards --- */
        .developer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .developer-card {
            background: #fff;
            border-radius: 15px;
            padding: 35px 20px;
            text-align: center;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .developer-card img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 3px solid #8B1528;
            padding: 4px;
            object-fit: fill;
        }

        .animate-up {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <span class="glyphicon glyphicon-education" style="margin-right: 10px;"></span> ProjectHub
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutapp.php">About App</a></li>
                <li><a href="aboutfaculty.php">About Faculty</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container section-container">
    <div class="about-block animate-up">
        <h2 class="section-title">The Project Repository Management System</h2>
        <p class="lead" style="color: #8B1528; font-weight: 500;">A Local Academic Search Engine for Student Projects.</p>
        
        <p>In academic institutions, students frequently face difficulty in identifying suitable project topics and understanding implementation approaches. Due to the absence of a centralized repository, project information is often scattered across departments or stored in physical formats, making search and reuse inefficient. Our application serves as a comprehensive web-based platform designed to bridge this gap.</p>
        
        <p>This system enables students to search and explore projects completed by their seniors based on <strong>project title, technology, domain, year, or guide</strong>. By providing access to project abstracts, sample synopses, and reference reports, we help students gain clarity and avoid the common pitfall of duplicating existing ideas.</p>
        
        
        <p>Built on a structured <strong>three-tier architecture</strong>, the application utilizes <strong>PHP and Bootstrap</strong> for the web interface, a robust <strong>PHP logic layer</strong> for application management, and a centralized <strong>MySQL database</strong> for secure storage.</p>
    </div>

    <h2 class="section-title text-center animate-up">Core System Modules</h2>
    <div class="row animate-up">
        <div class="col-md-4">
            <div class="feature-box">
                <span class="glyphicon glyphicon-user feature-icon"></span>
                <h4>Role-Based Control</h4>
                <p>Ensures that each user (Student, Guide, or Admin) can access only authorized functionalities to maintain system security.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <span class="glyphicon glyphicon-search feature-icon"></span>
                <h4>Advanced Search</h4>
                <p>Provides keyword-based search functionality using parameters like technology, domain, and guide name for fast results.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <span class="glyphicon glyphicon-ok feature-icon"></span>
                <h4>Admin Verification</h4>
                <p>A specialized module for Admins to review and approve uploads, ensuring authenticity and quality control.</p>
            </div>
        </div>
    </div>

    <h2 class="section-title text-center animate-up" style="margin-top: 40px;">Meet the Developers</h2>
    <div class="developer-grid">
        <div class="developer-card animate-up">
            <img src="img/sam.jpeg" alt="Samarth R.H">
            <h4>Samarth R.H</h4>
            <span class="designation">Full Stack Lead Developer</span>
            <p class="bio">Expert in backend architecture and database optimization.And Lead the team</p>
        </div>
        <div class="developer-card animate-up" style="animation-delay: 0.1s;">
            <img src="img/swastik.jpeg" alt="Swastik S. Jannu">
            <h4>Swastik S. Jannu</h4>
            <span class="designation">Frontend Developer</span>
            <p class="bio">Focused on creating intuitive user experiences and design-driven development.</p>
        </div>
        <div class="developer-card animate-up" style="animation-delay: 0.2s;">
            <img src="img/shabana.jpeg" alt="Shabana Taj">
            <h4>Shabana Taj</h4>
            <span class="designation">DevOps Engineer</span>
            <p class="bio">Ensures platform reliability, performance, and cloud infrastructure.</p>
        </div>
        <div class="developer-card animate-up" style="animation-delay: 0.3s;">
            <img src="img/rekha.jpeg" alt="Rekha K H">
            <h4>Rekha K H</h4>
            <span class="designation">System Tester</span>
            <p class="bio">Ensures platform reliability, performance, and responsive System design.</p>
        </div>
    </div>
</div>

<footer style="text-align: center; padding: 40px 0; color: #888;">
    © <?php echo date("Y"); ?> SJVP | Built with PHP & MySQL
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
