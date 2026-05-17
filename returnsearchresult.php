<?php
include_once('db.php');

// Safely get the condition
$data = $_REQUEST['con'] ?? 'all';

if ($data == "all") {
    $sql = "SELECT * FROM projects ORDER BY year DESC";
} else {
    // Note: Ensure $data is sanitized before reaching this point in your main controller
    $sql = "SELECT * FROM projects WHERE $data ORDER BY year DESC";
}

$res = execute($sql);

// Check if records exist
if ($res->num_rows == 0) {
    echo '<div class="text-center" style="padding: 40px; color: #64748b;">
            <span class="glyphicon glyphicon-search" style="font-size: 30px; opacity: 0.3;"></span>
            <p style="margin-top: 10px;">No projects found matching your criteria.</p>
          </div>';
}

while ($row = $res->fetch_object()) {
?>
    <div class="project-result-card">
        <div class="card-content">
            <div class="project-meta">
                <span class="label-id">#<?php echo $row->pid; ?></span>
                <span class="label-year"><?php echo $row->year; ?></span>
            </div>
            
            <a href="projectdet.php?pid=<?php echo $row->pid; ?>" class="project-link">
                <h4 class="project-title"><?php echo $row->title; ?></h4>
            </a>
            
            <p class="project-description">
                <?php 
                    // Truncate description for better list view
                    echo (strlen($row->descr) > 200) ? substr($row->descr, 0, 200) . "..." : $row->descr; 
                ?>
            </p>
            
            <div class="project-footer">
                <div class="tech-stack">
                    <span class="glyphicon glyphicon-tags"></span>
                    <span class="tech-tag"><?php echo $row->tech; ?></span>
                </div>
                <a href="projectdet.php?pid=<?php echo $row->pid; ?>" class="btn-details">
                    View Project <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
<?php
}
?>

<style>
    .project-result-card {
        background: white;
        border-radius: 12px;
        margin-bottom: 20px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .project-result-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08);
        border-color: #8B1528;
    }

    .card-content {
        padding: 20px 25px;
    }

    .project-meta {
        margin-bottom: 10px;
    }

    .label-id {
        background: #f1f5f9;
        color: #64748b;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-right: 10px;
    }

    .label-year {
        color: #8B1528;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .project-link {
        text-decoration: none !important;
    }

    .project-title {
        color: #1e293b;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        margin: 0 0 10px 0;
        transition: color 0.2s;
    }

    .project-result-card:hover .project-title {
        color: #8B1528;
    }

    .project-description {
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .project-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
    }

    .tech-stack {
        color: #8B1528;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .tech-tag {
        margin-left: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-details {
        font-size: 0.85rem;
        font-weight: 700;
        color: #8B1528;
        text-transform: uppercase;
        text-decoration: none !important;
    }
</style>