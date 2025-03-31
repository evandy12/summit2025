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
$maxSize = 10 * 1024 * 1024; // 10MB max
$allowedTypes = ['jpg', 'jpeg', 'png'];

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required_fields = ['email', 'first-name', 'last-name', 'gender', 'organization', 'position', 'sector', 'city', 'state', 'country', 'continent', 'photo-release'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(["success" => false, "error" => "$field is required."]);
            exit;
        }
    }

    $email = sanitize_input($_POST['email'] ?? '');
    $position = sanitize_input($_POST['position'] ?? '');

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

    foreach ($data as &$value) {
        if (preg_match('/^[=+\-@]/', $value)) {
            $value = "'" . $value;
        }
    }

    if (stripos($position, 'student') !== false && isset($_FILES['id_card'])) {
        $safeEmail = preg_replace('/[^a-zA-Z0-9]/', '_', $email);
        $ext = strtolower(pathinfo($_FILES['id_card']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedTypes)) {
            echo json_encode(["success" => false, "error" => "Only JPG and PNG images are allowed."]);
            exit;
        }

        if ($_FILES['id_card']['size'] > $maxSize) {
            echo json_encode(["success" => false, "error" => "File exceeds 10MB size limit."]);
            exit;
        }

        if ($_FILES['id_card']['error'] !== 0) {
            echo json_encode(["success" => false, "error" => "Error uploading file."]);
            exit;
        }

        $targetPath = $uploadDir . $safeEmail . '.jpg';
        move_uploaded_file($_FILES['id_card']['tmp_name'], $targetPath);
    }

    $fileHandle = fopen($file, 'a');
    if (filesize($file) == 0) {
        fputcsv($fileHandle, ["Email", "Attendance Type", "Prefix", "First Name", "Middle Name", "Last Name", "Suffix", "Gender", "Organization", "Position", "Sector", "City", "State", "Country", "Continent", "Phone", "Comments", "Certificate", "Previous Event", "Email Opt-Out", "Photo Release", "Timestamp"]);
    }
    fputcsv($fileHandle, $data);
    fclose($fileHandle);

    // === SEND CONFIRMATION EMAIL ===
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'researchsummit@carisca.knust.edu.gh';
        $mail->Password = 'xbkf hxzm dwta llvk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('summit2025@carisca.knust.edu.gh', 'CARISCA Summit');
        $mail->addAddress($email);
        $mail->Subject = 'CARISCA Summit Registration Confirmation';

        $firstName = sanitize_input($_POST['first-name']);
        $mail->Body = "Dear $firstName,\n\nThank you for registering for the CARISCA 2025 Summit.\n\nWe look forward to seeing you at the event.\n\nBest regards,\nCARISCA Team";

        $mail->send();
    } catch (Exception $e) {
        echo json_encode(["success" => false, "error" => "Email sending failed: " . $mail->ErrorInfo]);
        exit;
    }

    echo json_encode(["success" => true, "message" => "Registration entry saved and confirmation email sent."]);
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}
?>
