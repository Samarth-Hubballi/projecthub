<?php
include_once('db.php');

$data = $_REQUEST['data'];

// SQL logic remains the same, but we order by title for better readability
$sql = "SELECT DISTINCT pid, title, descr, tech, deptname, docname 
        FROM projects p, dept d 
        WHERE (p.deptid=d.deptid 
        AND (title LIKE '%$data%' OR title='$data' OR descr LIKE '%$data%' OR descr='$data' OR tech LIKE '%$data%' OR tech='$data'))
        ORDER BY title ASC";

$res = execute($sql);
?>

<style>
    .search-meta {
        margin-bottom: 20px;
        color: #64748b;
        font-size: 0.9rem;
    }

    .result-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
        border-left: 5px solid #8B1528; /* Theme Maroon */
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .result-card:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .result-dept {
        font-size: 0.75rem;
        font-weight: 700;
        color: #8B1528;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 5px;
    }

    .result-title {
        margin: 0 0 10px 0;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .result-title a {
        color: #1e293b;
        text-decoration: none;
        transition: color 0.2s;
    }

    .result-title a:hover {
        color: #8B1528;
    }

    .result-descr {
        color: #475569;
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .result-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f1f5f9;
        padding-top: 15px;
    }

    .tech-pill {
        background: #f1f5f9;
        color: #475569;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        font-style: normal;
    }

    .no-results {
        text-align: center;
        padding: 50px;
        background: white;
        border-radius: 12px;
        color: #94a3b8;
    }
</style>

<div class="search-meta">
    Showing results for: <strong>"<?php echo htmlspecialchars($data); ?>"</strong>
</div>

<?php
if ($res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
?>
    <div class="result-card">
        <span class="result-dept"><?php echo $row->deptname; ?></span>
        
        <h2 class="result-title">
            <a href="projectdet.php?pid=<?php echo $row->pid; ?>">
                <?php echo $row->title; ?>
            </a>
        </h2>
        
        <p class="result-descr">
            <?php echo $row->descr; ?>
        </p>
        
        <div class="result-footer">
            <span class="tech-pill">
                <i class="glyphicon glyphicon-tags"></i> <?php echo $row->tech; ?>
            </span>
            
            <a href="projectdet.php?pid=<?php echo $row->pid; ?>" style="color: #8B1528; font-weight: 700; text-decoration: none;">
                View Full Details <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
        </div>
    </div>
<?php
    }
} else {
?>
    <div class="no-results">
        <i class="glyphicon glyphicon-search" style="font-size: 40px; margin-bottom: 15px; display: block;"></i>
        <p>No projects found matching your search. Try different keywords.</p>
    </div>
<?php
}
?>