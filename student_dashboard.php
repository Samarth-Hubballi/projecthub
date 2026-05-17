<?php
include_once('db.php');
include_once('mynavbar.php');

$q = trim((string)($_GET['q'] ?? ''));
$y = trim((string)($_GET['y'] ?? '')); // New year parameter

// 1. Fetch available years for the dropdown dynamically
$conn = mysqli_connect('localhost','root','','pts');
$year_res = execute("SELECT DISTINCT year FROM projects ORDER BY year DESC");
$available_years = [];
while($yr = $year_res->fetch_assoc()) { $available_years[] = $yr['year']; }

// 2. Build Search Query
$sql = "SELECT p.pid, p.title, p.year, d.deptname, g.name AS guide, p.pmates, p.tech, p.descr
        FROM projects p
        LEFT JOIN dept d ON p.deptid = d.deptid
        LEFT JOIN guides g ON p.guide = g.uname
        WHERE 1=1"; // Start with a true condition to simplify appending AND clauses

if ($q !== '') {
    $escaped_q = mysqli_real_escape_string($conn, $q);
    $sql .= " AND (p.title LIKE '%$escaped_q%' OR p.tech LIKE '%$escaped_q%' OR p.descr LIKE '%$escaped_q%')";
}

if ($y !== '') {
    $escaped_y = mysqli_real_escape_string($conn, $y);
    $sql .= " AND p.year = '$escaped_y'";
}

$sql .= " ORDER BY p.pid DESC LIMIT 20";
$res = execute($sql);

$projects = [];
while ($row = $res->fetch_assoc()) { $projects[] = $row; }

function esc($str) { return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }
?>

<style>
    body { background-color: #f4f7f6; font-family: 'Poppins', sans-serif; color: #f8f6f6; font-size: 17px;
          background: linear-gradient(rgba(15, 18, 25, 0.65), rgba(15, 18, 25, 0.65)), url('img/stdbg.jpg') center/cover no-repeat;
        }
    .dashboard-container { padding: 40px 15px; max-width: 1200px; margin: 0 auto; }
    .page-header { text-align: center; margin-bottom: 40px; }
    .page-header h1 { color: #8B1528; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
    /* Enhanced Search Box with Year Filter */
    .search-container {
        background: #fff;
        padding: 8px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        display: flex;
        max-width: 850px;
        margin: 0 auto 50px;
        border: 1px solid #eee;
        align-items: center;
    }

    .search-container input {
        border: none;
        background: transparent;
        padding: 10px 20px;
        flex-grow: 1;
        outline: none;
        font-size: 17px;
    }

    .year-select {
        border: none;
        border-left: 1px solid #eee;
        background: transparent;
        padding: 10px 15px;
        outline: none;
        font-weight: 600;
        color: #555;
        cursor: pointer;
    }

    .search-container button {
        background: #8B1528;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 600;
        transition: 0.3s;
        margin-left: 10px;
    }

    .search-container button:hover { background: #6b0f1c; }

    /* Project Cards Logic */
    .project-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 25px; }
    .project-card { 
        background: #fff; border-radius: 15px; border-left: 5px solid #8B1528; 
        padding: 25px; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex; flex-direction: column;
    }
    .project-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    .project-title { color: #8B1528; font-size: 1.4rem; font-weight: 700; margin-bottom: 8px; line-height: 1.3; }
    .meta-info { font-size: 1rem; color: #777; margin-bottom: 15px; }
    .meta-info span { margin-right: 15px; }
    .meta-info i { color: #8B1528; margin-right: 5px; }
    .project-descr { font-size: 1.05rem; color: #555; margin-bottom: 15px; display: -webkit-box; line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .tech-tag { display: inline-block; background: #f8e8ea; color: #8B1528; padding: 4px 10px; border-radius: 4px; font-size: 0.9rem; font-weight: 600; }
    .btn-details { margin-top: 15px; display: block; text-align: center; background: #f4f4f4; color: #333; padding: 8px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1rem; }
    .btn-details:hover { background: #8B1528; color: white; text-decoration: none; }

    @media (max-width: 600px) {
        .search-container { flex-direction: column; border-radius: 20px; padding: 15px; }
        .year-select { border-left: none; border-top: 1px solid #eee; width: 100%; margin: 10px 0; }
        .search-container button { width: 100%; margin-left: 0; }
    }
</style>

<div class="dashboard-container">
    <header class="page-header">
        <h1>Project Explorer</h1>
        <p>Browse submissions by keyword or graduation year</p>
    </header>

    <form action="student_dashboard.php" method="GET" class="search-container">
        <input type="text" name="q" placeholder="Keywords (e.g. PHP, AI, Web)..." value="<?php echo esc($q); ?>">
        
        <select name="y" class="year-select">
            <option value="">All Years</option>
            <?php foreach($available_years as $year): ?>
                <option value="<?php echo $year; ?>" <?php if($y == $year) echo 'selected'; ?>>
                    Year: <?php echo $year; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
    </form>

    <div class="project-grid">
        <?php if (count($projects) === 0): ?>
            <div class="empty-state text-center col-md-12" style="background:white; padding:40px; border-radius:15px; width:100%;">
                <h3 style="color:#8B1528;">No matches found</h3>
                <p>Try searching for a different year or keyword.</p>
                <a href="student_dashboard.php" style="color:#8B1528; font-weight:600;">Show all projects</a>
            </div>
        <?php else: ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <div class="project-title"><?php echo esc($project['title']); ?></div>
                    <div class="meta-info">
                        <span><i class="glyphicon glyphicon-calendar"></i> <?php echo esc($project['year']); ?></span>
                        <span><i class="glyphicon glyphicon-education"></i> <?php echo esc($project['deptname'] ?: 'General'); ?></span>
                    </div>
                    <div class="project-descr"><?php echo esc($project['descr']); ?></div>
                    <div><span class="tech-tag">Tech: <?php echo esc($project['tech']); ?></span></div>
                    <a href="projectdet.php?pid=<?php echo urlencode($project['pid']); ?>" class="btn-details">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>