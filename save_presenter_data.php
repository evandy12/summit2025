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

$file = 'presenter_registrations.csv';
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

    // Mail setup (optional - can be removed if not needed)
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'researchsummit@carisca.knust.edu.gh';
        $mail->Password = 'xbkf hxzm dwta llvk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('researchsummit@carisca.knust.edu.gh', 'CARISCA Summit 2025');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'CARISCA Summit 2025 Registration';
        $mail->Body = '
                    <table style="width:100%; max-width:600px; font-family: Arial, sans-serif; border-collapse: collapse;">
                        <tr>
                            <td style="padding: 20px; background-color: #f5f5f5; text-align: center;">
                                <img src="https://summit2025.carisca.org/images/logo/logo.png" alt="CARISCA Logo" style="max-width: 100%; height: auto;">
                                <h2 style="margin-top: 10px; font-size: 20px; color: #333;">Centre for Applied Research and Innovation in Supply Chain – Africa</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px;">
                                <p>Dear ' . sanitize_input($_POST["first-name"]) . ',</p>

                                <p>Thank you for registering as a presenter for <strong>CARISCA\'s 2025 Supply Chain Research Summit</strong>, 
                                <strong>July 16–18, 2025</strong>.</p>

                                <p>For information on the summit venue and how to book lodging, visit the 
                                <a href="https://summit2025.carisca.org" target="_blank" style="color: #0056b3;">summit website</a>.
                                For any questions not found on the website, please contact:</p>

                                <ul>
                                    <li>Martin Mawutor K. Agbodzi – <a href="mailto:mmagbodzi@carisca.knust.edu.gh">mmagbodzi@carisca.knust.edu.gh</a></li>
                                    <li>Amos Ato Eghan – <a href="mailto:aaeghan@carisca.knust.edu.gh">aaeghan@carisca.knust.edu.gh</a></li>
                                </ul>

                                <p>Thank you for your interest in supply chain research in Africa and for participating as a presenter in this event.
                                We are excited to have you join us.</p>

                                <p>Sincerely,<br><strong>2025 Supply Chain Research Summit Planning Committee</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 15px; background-color: #f9f9f9; font-size: 12px; text-align: center;">
                                Contact Martin Mawutor K. Agbodzi at 
                                <a href="mailto:mmagbodzi@carisca.knust.edu.gh">mmagbodzi@carisca.knust.edu.gh</a>
                            </td>
                        </tr>
                    </table>';
        $mail->send();
    } catch (Exception $e) {
        // You can log or ignore mail error here
    }

    echo json_encode(["success" => true, "message" => "Presenter registration saved successfully."]);
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}
?>
