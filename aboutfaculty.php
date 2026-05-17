<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecthub - About Faculty</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7f6;
            background: url('img/sjvp.jpeg') center;
            background-size: cover;
             background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            color: #444;
            /* Extra padding to prevent navbar from covering content */
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
            color: #8B1528 !important; /* Maroon Brand */
            letter-spacing: 1px;
        }

        .navbar-default .navbar-nav > li > a {
            color: #444 !important;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            padding: 15px 20px;
            transition: all 0.3s;
            position: relative;
        }

        /* Gold underline animation */
        .navbar-default .navbar-nav > li > a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #D4AF37; /* Gold Accent */
            transition: width .3s;
            margin-top: 5px;
        }

        .navbar-default .navbar-nav > li > a:hover::after,
        .navbar-default .navbar-nav > .active > a::after {
            width: 100%;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > .active > a {
            color: #8B1528 !important;
            background: transparent !important;
        }

        /* Login Button Styling */
        .nav-login-btn a {
            background-color: #8B1528 !important;
            color: #fff !important;
            border-radius: 50px;
            padding: 10px 25px !important;
            margin-left: 15px;
            box-shadow: 0 4px 10px rgba(139, 21, 40, 0.3);
        }

        .nav-login-btn a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(139, 21, 40, 0.4);
        }

        .nav-login-btn a::after {
            display: none !important;
        }

        /* --- Sections Shared --- */
        .section-container {
            margin-bottom: 50px;
        }
        
        h2.section-title {
            color: #8B1528;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        h2.section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background: #D4AF37; /* Gold Underline for titles */
            display: block;
            margin: 10px auto;
            border-radius: 2px;
        }

        /* --- Principal & HOD Desks --- */
        .desk-card {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            border-left: 8px solid #8B1528;
        }

        .flex-content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .photo-circle img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #8B1528;
            padding: 5px;
            object-fit: cover;
        }

        .message-text h3 {
            color: #8B1528;
            margin-top: 0;
            font-weight: 600;
        }

        /* --- Lecturer Grid & Cards --- */
        .lecturer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .lecturer-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.4s ease;
            border: 1px solid rgba(139, 21, 40, 0.1);
        }

        .lecturer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(139, 21, 40, 0.15);
            border-color: #8B1528;
        }

        .lecturer-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 3px solid #8B1528;
            padding: 3px;
        }

        /* --- Animations --- */
        .animate-up {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            .flex-content { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
          <span class="glyphicon glyphicon-education"></span> PROJECTHUB
      </a>
    </div>
    <div class="collapse navbar-collapse" id="nav-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutapp.php">About App</a></li>
        <li><a href="aboutfaculty.php">Faculty Team</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container section-container">
    <div class="desk-card animate-up">
        <h2 class="section-title" style="text-align: left; margin-left: 0;">Principal's Desk</h2>
        <div class="flex-content">
            <div class="message-text">
                <h3>Prof. N H Shivagnagamma</h3>
               <p>Greetings from S.J.V.P First Grade College, Harihar.</p>

<p>In today’s rapidly evolving world, education plays a vital role in shaping innovative and responsible individuals. At S.J.V.P First Grade College, we are committed to providing quality education that nurtures creativity, knowledge, and practical skills among students.</p>

<p>Our institution encourages students to explore new ideas, develop technical abilities, and engage in meaningful academic activities. This Project Repository System is an initiative to support students by providing a centralized platform to access, share, and learn from academic projects, research works, and innovative ideas.</p>

<p>We believe that such digital platforms enhance collaborative learning and help students stay connected with modern technological advancements.</p>

<p>I congratulate the team behind this initiative and hope that this platform will become a valuable resource for students and faculty in promoting knowledge sharing and academic excellence.</p>

<p>I warmly welcome you to explore and benefit from this platform.</p>
            </div>
            <div class="photo-circle">
                <img src="img/principal.jpeg" alt="Principal">
            </div>
        </div>
    </div>

    <div class="desk-card animate-up" style="border-left: 0; border-right: 8px solid #8B1528;">
        <h2 class="section-title" style="text-align: right;">HOD's Desk</h2>
        <div class="flex-content">
            <div class="photo-circle">
                <img src="img/hod.jpeg" alt="HOD">
            </div>
            <div class="message-text">
                <h3>Dr. Veranna B Shetter</h3>
                <p>Greetings from the Department of Bachelor of Computer Applications (BCA), S.J.V.P First Grade College, Harihar.</p>

<p>As the Head of the Department, my vision is to provide students with strong academic knowledge along with practical exposure in the field of computer applications. The BCA department focuses on developing technical skills, innovative thinking, and problem-solving abilities among students.</p>

<p>The Project Repository System is a valuable initiative that allows students to explore, share, and learn from various academic projects developed by their peers. This platform helps students understand real-time applications of programming, software development, and emerging technologies.</p>

<p>Our department encourages students to actively participate in project development, research activities, and technical learning to prepare them for future professional challenges in the IT industry.</p>

<p>I appreciate the effort taken to develop this repository system and hope it will become a useful academic resource for students and faculty members.</p>
            </div>
        </div>
    </div>

    <h2 class="section-title animate-up">Lecturer's Desk</h2>

    <div class="lecturer-grid">
        <div class="lecturer-card animate-up">
            <img src="img/pallavi.jpeg" alt="Lecturer">
            <h4>Mrs. Pallavi</h4>
            <span class="designation">Lecturer</span>
            <p class="bio">Mrs. Pallavi plays an important role in guiding students through their academic and project development activities. She provides hands-on mentoring to student teams and encourages them to apply theoretical knowledge to practical applications. Her focus is on improving programming skills, maintaining code quality, and helping students successfully complete their projects with industry-oriented practices.</p>
        </div>

        <div class="lecturer-card animate-up">
            <img src="img/sharmila.jpeg" alt="Lecturer">
            <h4>Ms. Sharmila</h4>
            <span class="designation">Lecturer</span>
            <p class="bio">Ms. Sharmila specializes in web development and user interface design. She supports students in developing interactive web applications and helps them understand modern development technologies and frameworks. Her guidance motivates students to create innovative and user-friendly software solutions.</p>
        </div>

        <div class="lecturer-card animate-up">
            <img src="img/pooja.jpeg" alt="Lecturer">
            <h4>Ms. Pooja</h4>
            <span class="designation">Lecturer</span>
            <p class="bio">Ms. Pooja focuses on strengthening students’ understanding of database management systems and data structures. She guides students in implementing efficient algorithms and teaches them the importance of structured data handling for real-world software applications. Her mentorship helps students build strong logical and analytical skills.</p>
        </div>
    </div>
</div>

</body>
</html>