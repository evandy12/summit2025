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

header('Content-Type: application/json'); // Ensure PHP returns JSON

$file = 'registrations.csv';

// Security Enhancements
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $required_fields = ['email', 'first-name', 'last-name', 'gender', 'organization', 'position', 'sector', 'city', 'state', 'country', 'continent', 'photo-release'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(["success" => false, "error" => "$field is required."]);
            exit;
        }
    }

    // Sanitize form data
    $data = [
        sanitize_input($_POST['email'] ?? ''),
        sanitize_input($_POST['attendance'] ?? ''),
        sanitize_input($_POST['prefix'] ?? ''),
        sanitize_input($_POST['first-name'] ?? ''),
        sanitize_input($_POST['middle-name'] ?? ''),
        sanitize_input($_POST['last-name'] ?? ''),
        sanitize_input($_POST['suffix'] ?? ''),
        sanitize_input($_POST['gender'] ?? ''),
        sanitize_input($_POST['organization'] ?? ''),
        sanitize_input($_POST['position'] ?? ''),
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

    // Prevent CSV Injection by escaping leading =, +, -, and @
    foreach ($data as &$value) {
        if (preg_match('/^[=+\-@]/', $value)) {
            $value = "'" . $value; // Add a single quote to neutralize formula injection
        }
    }

    // Save to CSV securely
    $fileHandle = fopen($file, 'a');

    if (filesize($file) == 0) {
        fputcsv($fileHandle, ["Email", "Attendance Type", "Prefix", "First Name", "Middle Name", "Last Name", "Suffix", "Gender", "Organization", "Position", "Sector", "City", "State", "Country", "Continent", "Phone", "Comments", "Certificate", "Previous Event", "Email Opt-Out", "Photo Release", "Timestamp"]);
    }

    fputcsv($fileHandle, $data);
    fclose($fileHandle);

    echo json_encode(["success" => true, "message" => "Registration entry saved securely, email sending is bypassed."]);
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}
?>
