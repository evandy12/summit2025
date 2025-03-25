<?php
session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo json_encode(["success" => false, "error" => "Invalid CSRF token"]);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

header('Content-Type: application/json');

$file = 'registrations.csv';
$uploadDir = 'id_verifications/';
$maxSize = 10 * 1024 * 1024; // 10MB
$allowedTypes = ['jpg', 'jpeg', 'png'];

// === CREATE UPLOAD FOLDER IF MISSING ===
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// === INPUT SANITIZER ===
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // === REQUIRED FIELDS CHECK ===
    $required_fields = ['email', 'first-name', 'last-name', 'gender', 'organization', 'position', 'sector', 'city', 'state', 'country', 'continent', 'photo-release'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(["success" => false, "error" => "$field is required."]);
            exit;
        }
    }

    // === SANITIZE FIELDS ===
    $email = sanitize_input($_POST['email']);
    $position = sanitize_input($_POST['position']);

    $data = [
        $email,
        sanitize_input($_POST['attendance'] ?? ''),
        sanitize_input($_POST['prefix'] ?? ''),
        sanitize_input($_POST['first-name'] ?? ''),
        sanitize_input($_POST['middle-name'] ?? ''),
        sanitize_input($_POST['last-name'] ?? ''),
        sanitize_input($_POST['suffix'] ?? ''),
        sanitize_input($_POST['gender'] ?? ''),
        sanitize_input($_POST['organization'] ?? ''),
        $position,
        sanitize_input($_POST['sector'] ?? ''),
        sanitize_input($_POST['city'] ?? ''),
        sanitize_input($_POST['state'] ?? ''),
        sanitize_input($_POST['country'] ?? ''),
        sanitize_input($_POST['continent'] ?? ''),
        sanitize_input($_POST['phone'] ?? ''),
        sanitize_input($_POST['comments'] ?? ''),
        sanitize_input($_POST['certificate'] ?? 'No'),
        sanitize_input($_POST['previous-event'] ?? 'No'),
        sanitize_input(isset($_POST['email-opt-out']) ? 'Yes' : 'No'),
        sanitize_input(isset($_POST['photo-release']) ? 'Yes' : 'No'),
        date("Y-m-d H:i:s")
    ];

    // === ESCAPE FORMULA INJECTION FOR CSV ===
    foreach ($data as &$value) {
        if (preg_match('/^[=+\-@]/', $value)) {
            $value = "'" . $value;
        }
    }

    // === HANDLE STUDENT ID UPLOAD IF APPLICABLE ===
    if (stripos($position, 'student') !== false) {
        if (!isset($_FILES['id_card']) || $_FILES['id_card']['error'] !== 0) {
            echo json_encode(["success" => false, "error" => "Student ID upload failed or not received."]);
            exit;
        }

        $ext = strtolower(pathinfo($_FILES['id_card']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedTypes)) {
            echo json_encode(["success" => false, "error" => "Only JPG and PNG images are allowed."]);
            exit;
        }

        if ($_FILES['id_card']['size'] > $maxSize) {
            echo json_encode(["success" => false, "error" => "ID image exceeds 10MB size limit."]);
            exit;
        }

        $safeEmail = preg_replace('/[^a-zA-Z0-9]/', '_', $email);
        $targetPath = $uploadDir . $safeEmail . '.jpg';

        if (!move_uploaded_file($_FILES['id_card']['tmp_name'], $targetPath)) {
            echo json_encode(["success" => false, "error" => "Failed to save ID image."]);
            exit;
        }
    }

    // === SAVE TO CSV FILE ===
    $fileHandle = fopen($file, 'a');
    if (filesize($file) == 0) {
        fputcsv($fileHandle, ["Email", "Attendance Type", "Prefix", "First Name", "Middle Name", "Last Name", "Suffix", "Gender", "Organization", "Position", "Sector", "City", "State", "Country", "Continent", "Phone", "Comments", "Certificate", "Previous Event", "Email Opt-Out", "Photo Release", "Timestamp"]);
    }
    fputcsv($fileHandle, $data);
    fclose($fileHandle);

    echo json_encode(["success" => true, "message" => "Registration entry saved."]);
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}
?>
