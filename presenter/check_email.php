<?php
// check_email.php - Called via AJAX to check for duplicate email

header('Content-Type: application/json');

$email = '';
if (isset($_GET['email'])) {
    $email = strtolower(trim($_GET['email']));
} elseif (isset($_POST['email'])) {
    $email = strtolower(trim($_POST['email']));
}

if (empty($email)) {
    echo json_encode(["exists" => false]);
    exit;
}

$file = 'registrations.csv';

if (!file_exists($file)) {
    echo json_encode(["exists" => false]);
    exit;
}

$handle = fopen($file, 'r');
$headers = fgetcsv($handle);
$emailIndex = array_search('Email', $headers);

while (($row = fgetcsv($handle)) !== false) {
    if (strtolower(trim($row[$emailIndex])) === $email) {
        fclose($handle);
        echo json_encode(["exists" => true]);
        exit;
    }
}

fclose($handle);
echo json_encode(["exists" => false]);
?>
 