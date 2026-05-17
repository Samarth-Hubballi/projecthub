<?php
include_once('index_navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Projects | SJVP</title>
    <style>
       #splash-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: #ffffff; /* Set background to White */
        display: flex;             /* Corrected from fill */
        justify-content: center;   /* Centers horizontally */
        align-items: center;       /* Centers vertically */
        z-index: 10000;
        transition: opacity 0.8s ease-in-out, visibility 0.8s;
    }

    .splash-logo-fullscreen {
        width: 300px;  /* "Medium size" - adjust this value as you like */
        height: auto;  /* Maintains aspect ratio */
        object-fit: contain; 
        animation: splash-zoom 2.5s ease-out;
    }

    @keyframes splash-zoom {
        from { transform: scale(0.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .splash-hidden {
        opacity: 0 !important;
        visibility: hidden !important;
    }

    body.splash-active {
        overflow: hidden; 
    }
    /* ... your existing styles ... */

    .about-college-bg {
        /* Replace the URL below with your actual image path */
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                          url('img/sjvp.jpeg'); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Optional: adds a parallax effect */
        min-height: 60vh;
        display: flex;
        align-items: center;
        object-fit: fill;
        justify-content: center;
        color: white; /* Ensures text is readable over the image */
    }

    /* Styling the content inside to ensure contrast */
    .about-college-bg .hero-content h1 {
        color: #ffffff;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    
    .about-college-bg .hero-content p {
        color: #f0f0f0;
        max-width: 800px;
        margin: 0 auto;
    }
</style>
    </style>
</head>
<body class="splash-active">

<div id="splash-screen">
    <img src="img/screenlogo.jpeg" class="splash-logo-fullscreen" alt="Splash Logo">
</div>

<script src="js/unipix.js"></script>

<section class="hero-unipix">
  <div class="hero-content">
    <div class="logo-icon">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Icon" width="60">
    </div>
    <h1>Academic Journey<br>Begins Smart Projects</h1>
    <p>A digital platform for students to explore projects, events, and innovative ideas inside our college community.</p>
    <div class="search-container">
      <form action="login.php" method="GET" class="search-form">
        <button type="submit" class="btn-primary-unipix">Explore Projects <span class="arrow">→</span></button>
      </form>
      <div style="margin-top: 18px;">
        <a href="login.php" class="btn-secondary-unipix">Login <span class="arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<section class="features-unipix">
  <div class="features-text animate-on-scroll">
    <h2>Our Features</h2>
    <p>Embark on a journey of knowledge, discovery, and growth at Smart Projects. Our platform is designed to identify bright, motivated individuals who are eager to contribute to our dynamic academic community.</p>
    <a href="aboutapp.php" class="btn-secondary-unipix">Learn More <span class="arrow">→</span></a>
  </div>
  <div class="features-grid">
    <div class="feature-card animate-on-scroll delay-1">
      <div class="card-image bg-card-1"></div>
      <div class="card-content">
        <h3>Student Projects</h3>
        <p>Showcase innovative projects created by students across departments.</p>
      </div>
    </div>
    <div class="feature-card animate-on-scroll delay-2 mt-medium">
      <div class="card-image bg-card-2"></div>
      <div class="card-content">
        <h3>Workshops</h3>
        <p>Participate in creative and technical workshops organized by faculty.</p>
      </div>
    </div>
    <div class="feature-card animate-on-scroll delay-3">
      <div class="card-image bg-card-3"></div>
      <div class="card-content">
        <h3>Innovation Hub</h3>
        <p>A place where ideas transform into real-world applications.</p>
      </div>
    </div>
  </div>
</section>

<section class="gallery-unipix">
  <div class="bg-text">About Univers</div>
  <div class="gallery-container">
    <div class="gallery-text animate-on-scroll">
      <h2>Embark on a Journey:<br>Unveiling the Story of<br>Smart Projects</h2>
      <p>Embark on a journey of knowledge, discovery, and growth at ProjectHub. Our platform is designed to identify bright, motivated individuals who are eager to contribute to our dynamic academic community.</p>
      <a href="aboutapp.php" class="link-white">Learn More <span class="arrow">↗</span></a>
    </div>
    <div class="gallery-images animate-on-scroll delay-2">
      <div class="img-wrapper img-1">
        <img src="img/sjvp.jpeg" alt="Campus">
      </div>
      <div class="img-wrapper img-2">
        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2069&auto=format&fit=crop" alt="Students">
      </div>
      <div class="img-wrapper img-3">
        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=2072&auto=format&fit=crop" alt="Graduation">
      </div>
    </div>
  </div>
</section>

<section class="hero-unipix animate-on-scroll about-college-bg">
  <div class="hero-content">
    <div class="logo-icon">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Icon" width="60">
    </div>
    <h1>About S.J.V.P First Grade College</h1>
    <p>S.J.V.P First Grade College, located in Harihar, Karnataka, is a well-established institution dedicated to providing quality higher education and nurturing the academic growth of students.</p>
  </div>
</section>

<section class="features-unipix">
  <div class="features-text animate-on-scroll">
    <h2>Our Mission</h2>
    <p>To empower students by providing a centralized hub for showcasing projects, exchanging knowledge, and fostering creativity.</p>
  </div>
</section>

<section class="team-section">
  <h2>Meet Our Developers</h2>
  <div class="team-grid">
    <div class="team-member animate-on-scroll delay-1">
      <div class="team-member-avatar">SRH</div>
      <div class="team-member-name">Samarth R.H</div>
      <div class="team-member-role">Full Stack Lead Developer</div>
      <p class="team-member-bio">Expert in backend architecture and database optimization.And Lead the team</p>
    </div>
    <div class="team-member animate-on-scroll delay-2">
      <div class="team-member-avatar">SSJ</div>
      <div class="team-member-name">Swastik S. Jannu</div>
      <div class="team-member-role">Frontend Developer</div>
      <p class="team-member-bio">UI/UX enthusiast focused on creating intuitive user experiences.</p>
    </div>
    <div class="team-member animate-on-scroll delay-3">
      <div class="team-member-avatar">ST</div>
      <div class="team-member-name">Shabana Taj</div>
      <div class="team-member-role">DevOps Engineer</div>
      <p class="team-member-bio">Ensures platform reliability and performance.</p>
    </div>
    <div class="team-member animate-on-scroll delay-1">
      <div class="team-member-avatar">RKH</div>
      <div class="team-member-name">Rekha K H</div>
      <div class="team-member-role">System Tester</div>
      <p class="team-member-bio">Ensures platform reliability, performance, and responsive System design.</p>
    </div>
  </div>
</section>

<footer>
© <?php echo date("Y"); ?> SJVP  | All Rights Reserved
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const splash = document.getElementById('splash-screen');
        
        // Timer for how long the fullscreen logo stays visible (2.5 seconds)
        setTimeout(() => {
            splash.classList.add('splash-hidden');
            document.body.classList.remove('splash-active');
            
            // Cleanup: remove splash div from DOM after fade out finishes
            setTimeout(() => {
                splash.remove();
            }, 800);
        }, 2500); 
    });
</script>

</body>
</html>