<?php
// Define connection globally so all functions and pages can use it
$conn = mysqli_connect('localhost', 'root', '', 'pts');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to execute a query and return the result object
function execute($sql) {
    global $conn; // Use the global connection
    $res = $conn->query($sql);
    if (!$res) {
        die("Query Error: " . mysqli_error($conn));
    }
    return $res;
}

// Function to build an INSERT string dynamically
function insert($ta, $fr) {
    global $conn;
    $columns = [];
    $values = [];
    foreach ($fr as $key => $value) {
        if ($key === 'submit') continue;
        $columns[] = '`' . mysqli_real_escape_string($conn, $key) . '`';
        $values[] = "'" . mysqli_real_escape_string($conn, $value) . "'";
    }

    if (empty($columns)) return '';

    $colList = implode(', ', $columns);
    $valList = implode(', ', $values);
    $taSafe = preg_replace('/[^a-zA-Z0-9_]/', '', $ta);
    
    return "INSERT INTO `{$taSafe}` ({$colList}) VALUES ({$valList})";
}

// Function to display data in a simple table row format
function display($sql, $cnt) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) die(mysqli_error($conn));

    $r = "";
    while ($row = mysqli_fetch_array($result)) {
        $r .= "<tr>";
        for ($i = 0; $i < $cnt; $i++) {
            $r .= "<td>" . $row[$i] . "</td>";
        }
        $r .= "</tr>";
    }
    return $r;
}

// Function to display data with a Delete link
function display_del($sql, $cnt, $tname, $di) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) die(mysqli_error($conn));

    $r = "";
    while ($row = mysqli_fetch_array($result)) {
        $r .= "<tr>";
        for ($i = 0; $i < $cnt; $i++) {
            $r .= "<td>" . $row[$i] . "</td>";
        }
        $r .= "<td class='del'><a href='delete.php?sino=" . $row[$di] . "&tname=$tname' class='btn btn-danger btn-xs'>Delete</a></td></tr>";
    }
    return $r;
}
?>