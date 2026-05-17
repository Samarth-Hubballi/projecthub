<?php
    session_start();
    $deptname = $_SESSION['deptname'];
    $cy = date('Y');
    // Assuming guidenavbar.php contains common styles and navbar for guides
?>

<html>
<head>
    <title>Submit New Project | Guide Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="jquery-1.11.0.js"></script>
    
    <script>
    $(document).ready(function() {
        // Dynamic PID Fetching
        $("#pid").click(function() {
            var y = $("#year").val();
            if(!y) {
                alert("Please select or enter a year first.");
                return;
            }
            
            $.get("getpid.php", {year: y}, function(data) {
                var d = $.trim(data);
                $("#pid").val(d);
            });
        });

        // GitHub link helper alert (clickable link)
        $("#github-link").on("focus click", function() {
            $("#linkAlert").show();
        });

        $("#github-account-link").on("click", function() {
            alert("please add the project files in this account https://github.com/sjvpcollege and the username=sjvpcollege and password = Sjvp@bca18");
        });

        // Form Validation for Terms
        $(".f1").submit(function() {
            if (!$(".chk").prop("checked")) {
                alert("Please accept the confirmation checkbox before saving.");
                $(".chk").focus();
                return false;
            }
            return true;
        });
    });
    </script>
    
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #334155;
            margin: 0;
            padding: 20px;
        }

        .project-form-container {
            max-width: 950px;
            margin: 40px auto;
        }

        .form-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 6px solid #8B1528; /* Theme Maroon */
        }

        .card-header {
            padding: 25px 35px;
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            text-align: center;
        }

        .card-header h2 {
            color: #8B1528;
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.4rem;
        }

        .card-body {
            padding: 35px;
        }

        /* Form Grid System */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Modern Inputs */
        input[type='text'], input[type='number'], textarea, .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
            font-family: inherit;
        }

        input:focus, textarea:focus {
            border-color: #8B1528;
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 21, 40, 0.1);
        }

        input[name="link"] {
            height: 50px;
            padding: 15px;
        }

        .readonly-field {
            background-color: #f1f5f9;
            cursor: pointer; /* To indicate it's clickable for PID generation */
        }

        /* Confirmation Box */
        .confirm-box {
            background-color: #fff1f2;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #8B1528;
            margin: 10px 0;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #881337;
            font-size: 0.9rem;
        }

        /* Submit Button */
        .btn-submit {
            background-color: #8B1528;
            color: white;
            border: none;
            padding: 15px 30px;
            width: 100%;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #630d1a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 21, 40, 0.2);
        }

        .section-title {
            grid-column: span 2;
            padding-bottom: 8px;
            border-bottom: 2px solid #f1f5f9;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>

<div class="project-form-container">
    <div class="form-card">
        <div class="card-header">
            <h2><span class="glyphicon glyphicon-plus"></span> Register New Project</h2>
        </div>

        <div class="card-body">
            <form name="f1" action="saveproject.php" method="post" enctype="multipart/form-data" class="f1">
                <div class="form-grid">
                    
                    <div class="section-title">Administrative Details</div>

                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="deptname" value="<?php echo $deptname ?>" readonly class="readonly-field" />
                    </div>

                    <div class="form-group">
                        <label>Academic Year</label>
                        <input type="number" value="<?php echo $cy ?>" name="year" id="year" />
                    </div>

                    <div class="form-group">
                        <label>Project ID <small>(Click to generate)</small></label>
                        <input type="text" name="pid" required id="pid" readonly class="readonly-field" placeholder="Click here to auto-generate" />
                    </div>

                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" name="title" id="title" required placeholder="Enter full project title" />
                    </div>

                    <div class="section-title">Technical Specifications</div>

                    <div class="form-group">
                        <label>Project Mates</label>
                        <textarea rows="4" name="pmates" placeholder="List student names separated by commas"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Technologies Used</label>
                        <textarea rows="4" name="tech" required placeholder="e.g., PHP, MySQL, Python, etc."></textarea>
                    </div>

                    <div class="form-group">
                        <label>GitHub Link (*)</label>
                        <input type="url" name="link" id="github-link" placeholder="https://github.com/username/project-repo" style="width:100%" />
                        <div id="linkAlert" class="confirm-box" style="display:none; margin-top: 10px;">
                            insert n this account
                            <a id="github-account-link" href="https://github.com/sjvpcollege" target="_blank" style="color: #8B1528; text-decoration: underline; display: inline-block; margin-left: 6px;">https://github.com/sjvpcollege</a>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label>Project Description</label>
                        <textarea rows="5" name="descr" placeholder="Detailed abstract or objective of the project"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label>Future Enhancements</label>
                        <textarea rows="3" name="future" placeholder="Potential future scope or additions"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label>Upload Documentation (Image/Report)</label>
                        <input type="file" name="imgname" class="form-control" />
                    </div>

                    <div class="form-group full-width">
                        <div class="confirm-box">
                            <input type="checkbox" name="chk" class="chk" style="width: 20px; height: 20px; cursor: pointer;" />
                            <span>I hereby confirm that the information uploaded above is correct and valid care has been taken to ensure data integrity.</span>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="btn-submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Save Project Record
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>