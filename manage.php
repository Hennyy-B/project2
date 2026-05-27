<?php
session_start();
require 'settings.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$eois = array();
$action = isset($_GET['action']) ? $_GET['action'] : 'list_all';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$valid_sorts = array('id', 'first_name', 'last_name', 'job_reference', 'status', 'date_applied', 'dob', 'gender', 'email', 'phone');
if (!in_array($sort, $valid_sorts)) {
    $sort = 'id';
}

if ($action == 'list_all') {
    $sql = "SELECT * FROM eois ORDER BY " . $sort . " DESC";
    $result = $conn->query($sql);
    $eois = $result->fetch_all(MYSQLI_ASSOC);
}

if ($action == 'list_by_job' && isset($_POST['job_ref'])) {
    $job_ref = trim(htmlspecialchars($_POST['job_ref']));
    $stmt = $conn->prepare("SELECT * FROM eois WHERE job_reference = ? ORDER BY " . $sort . " DESC");
    $stmt->bind_param("s", $job_ref);
    $stmt->execute();
    $eois = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

if ($action == 'list_by_name') {
    $first_name = isset($_POST['first_name']) ? trim(htmlspecialchars($_POST['first_name'])) : '';
    $last_name = isset($_POST['last_name']) ? trim(htmlspecialchars($_POST['last_name'])) : '';
    
    if ($first_name || $last_name) {
        $sql = "SELECT * FROM eois WHERE 1=1";
        if ($first_name) {
            $sql .= " AND first_name LIKE '%" . $conn->real_escape_string($first_name) . "%'";
        }
        if ($last_name) {
            $sql .= " AND last_name LIKE '%" . $conn->real_escape_string($last_name) . "%'";
        }
        $sql .= " ORDER BY " . $sort . " DESC";
        
        $result = $conn->query($sql);
        $eois = $result->fetch_all(MYSQLI_ASSOC);
    }
}

if ($action == 'delete_job' && isset($_POST['job_ref'])) {
    $job_ref = trim(htmlspecialchars($_POST['job_ref']));
    $stmt = $conn->prepare("DELETE FROM eois WHERE job_reference = ?");
    $stmt->bind_param("s", $job_ref);
    $stmt->execute();
    echo "<p>Deleted EOIs for job reference: " . $job_ref . "</p>";
}

if ($action == 'change_status' && isset($_POST['eoi_id']) && isset($_POST['status'])) {
    $eoi_id = intval($_POST['eoi_id']);
    $new_status = trim(htmlspecialchars($_POST['status']));
    $stmt = $conn->prepare("UPDATE eois SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $eoi_id);
    $stmt->execute();
    echo "<p>Status updated for EOI ID: " . $eoi_id . "</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>HR Manager - Manage EOIs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h2>HR Manager Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>

    <h3>Options</h3>
    <ul>
        <li><a href="manage.php?action=list_all">List All EOIs</a></li>
        <li><a href="manage.php?action=list_by_job_form">List by Job Reference</a></li>
        <li><a href="manage.php?action=list_by_name_form">List by Applicant Name</a></li>
        <li><a href="manage.php?action=delete_job_form">Delete by Job Reference</a></li>
        <li><a href="manage.php?action=change_status_form">Change EOI Status</a></li>
    </ul>

    <!-- List by Job Reference Form -->
    <?php if ($action == 'list_by_job_form'): ?>
        <h3>Search by Job Reference</h3>
        <form method="POST" action="manage.php?action=list_by_job">
            <input type="text" name="job_ref" placeholder="Job Reference" required>
            <button type="submit">Search</button>
        </form>
    <?php endif; ?>

    <!-- List by Name Form -->
    <?php if ($action == 'list_by_name_form'): ?>
        <h3>Search by Applicant Name</h3>
        <form method="POST" action="manage.php?action=list_by_name">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name">
            <button type="submit">Search</button>
        </form>
    <?php endif; ?>

    <!-- Delete by Job Reference Form -->
    <?php if ($action == 'delete_job_form'): ?>
        <h3>Delete EOIs by Job Reference</h3>
        <form method="POST" action="manage.php?action=delete_job">
            <input type="text" name="job_ref" placeholder="Job Reference" required>
            <button type="submit">Delete</button>
        </form>
    <?php endif; ?>

    <!-- Change Status Form -->
    <?php if ($action == 'change_status_form'): ?>
        <h3>Change EOI Status</h3>
        <form method="POST" action="manage.php?action=change_status">
            <input type="number" name="eoi_id" placeholder="EOI ID" required>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="New">New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
            </select>
            <button type="submit">Update</button>
        </form>
    <?php endif; ?>

    <!-- Results Table -->
    <?php if (!empty($eois)): ?>
        <h3>Results</h3>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Reference</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Street</th>
                <th>Suburb</th>
                <th>State</th>
                <th>Postcode</th>
                <th>Skills</th>
                <th>Status</th>
                <th>Date Applied</th>
            </tr>
            <?php 
                foreach ($eois as $eoi) {
                    echo "<tr>";
                    echo "<td>" . $eoi['id'] . "</td>";
                    echo "<td>" . $eoi['first_name'] . "</td>";
                    echo "<td>" . $eoi['last_name'] . "</td>";
                    echo "<td>" . $eoi['job_reference'] . "</td>";
                    echo "<td>" . $eoi['dob'] . "</td>";
                    echo "<td>" . $eoi['gender'] . "</td>";
                    echo "<td>" . $eoi['email'] . "</td>";
                    echo "<td>" . $eoi['phone'] . "</td>";
                    echo "<td>" . $eoi['street'] . "</td>";
                    echo "<td>" . $eoi['suburb'] . "</td>";
                    echo "<td>" . $eoi['state'] . "</td>";
                    echo "<td>" . $eoi['postcode'] . "</td>";
                    echo "<td>" . $eoi['skills'] . "</td>";
                    echo "<td>" . $eoi['status'] . "</td>";
                    echo "<td>" . $eoi['date_applied'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    <?php else: ?>
        <p>No EOIs found.</p>
    <?php endif; ?>

</body>
</html>
