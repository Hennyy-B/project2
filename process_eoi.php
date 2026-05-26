<?php
require 'settings.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: apply.php");
    exit;
}

$required = ['first_name', 'last_name', 'job_reference', 'dob', 'gender', 'street', 'suburb', 'state', 'postcode', 'email', 'phone', 'skills'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        header("Location: apply.php?error=missing_fields");
        exit;
    }
}

function sanitize($data) {
    return trim(stripslashes(htmlspecialchars($data)));
}

$first_name = sanitize($_POST['first_name']);
$last_name = sanitize($_POST['last_name']);
$job_reference = sanitize($_POST['job_reference']);
$dob = sanitize($_POST['dob']);
$gender = sanitize($_POST['gender']);
$street = sanitize($_POST['street']);
$suburb = sanitize($_POST['suburb']);
$state = sanitize($_POST['state']);
$postcode = sanitize($_POST['postcode']);
$email = sanitize($_POST['email']);
$phone = sanitize($_POST['phone']);
$skills = sanitize($_POST['skills']);
$status = 'New';

$errors = [];

if (strlen($job_reference) != 5) {
    $errors[] = "Job reference must be 5 characters";
}

if (!preg_match('/^[a-zA-Z\s]{1,}$/', $first_name)) {
    $errors[] = "First name must contain only letters and spaces";
}

if (!preg_match('/^[a-zA-Z\s]{1,}$/', $last_name)) {
    $errors[] = "Last name must contain only letters and spaces";
}

if (!strtotime($dob)) {
    $errors[] = "Invalid date of birth";
}

if (!in_array($gender, ['Male', 'Female', 'Non-binary'])) {
    $errors[] = "Invalid gender selected";
}

if (strlen($street) < 5) {
    $errors[] = "Street address must be at least 5 characters";
}

if (!preg_match('/^[a-zA-Z\s\-]{2,50}$/', $suburb)) {
    $errors[] = "Suburb must contain only letters, spaces, and hyphens";
}

if (!in_array($state, ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'])) {
    $errors[] = "Invalid state selected";
}

if (!preg_match('/^\d{4}$/', $postcode)) {
    $errors[] = "Postcode must be 4 digits";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address";
}

if (!preg_match('/^\d{10}$/', $phone)) {
    $errors[] = "Phone number must be 10 digits";
}

if (strlen($skills) < 1) {
    $errors[] = "Skills cannot be empty";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: apply.php?error=validation_failed");
    exit;
}

$stmt = $conn->prepare("INSERT INTO eois (first_name, last_name, job_reference, dob, gender, street, suburb, state, postcode, email, phone, skills, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $first_name, $last_name, $job_reference, $dob, $gender, $street, $suburb, $state, $postcode, $email, $phone, $skills, $status);

if ($stmt->execute()) {
    $eoi_id = $conn->insert_id;
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Application Submitted</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <h2>Application Submitted Successfully</h2>
        <p>Your EOI Number: <strong><?php echo $eoi_id; ?></strong></p>
        <p><a href="index.php">Back to Home</a></p>
    </body>
    </html>
    <?php
} else {
    echo "Error submitting application. Please try again.";
}

$stmt->close();
$conn->close();
?>
