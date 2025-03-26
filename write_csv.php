<?php
header('Content-Type: application/json');

$file = 'registrations.csv';
$idFolder = 'id_verifications';

try {
    if (!isset($_POST['rows'])) {
        throw new Exception("No data provided.");
    }

    $input = json_decode($_POST['rows'], true);

    if (!is_array($input) || count($input) < 1) {
        throw new Exception("Invalid or empty data provided.");
    }

    // Load the original file for comparison
    $original = [];
    if (($handle = fopen($file, 'r')) !== false) {
        $headers = isset($original[0]) ? $original[0] : [];
        while (($row = fgetcsv($handle)) !== false) {
            $original[] = $row;
        }
        fclose($handle);
    } else {
        throw new Exception("Failed to read the existing file.");
    }

    // Collect emails from updated data
    $newEmails = array_map(function($r) use ($headers) {
        return strtolower(trim($r[array_search('Email', $headers)]));
    }, $input);

    // Determine which emails were removed
    $originalEmails = array_map(function($r) use ($headers) {
        return strtolower(trim($r[array_search('Email', $headers)]));
    }, $original);

    $deletedEmails = array_diff($originalEmails, $newEmails);

    // Delete matching ID photo files
    foreach ($deletedEmails as $email) {
        $safeName = str_replace(['@', '.'], '_', $email) . '.jpg';
        $path = "$idFolder/$safeName";
        if (file_exists($path)) {
            unlink($path); // delete the file
        }
    }

    // Save new CSV
    $fp = fopen($file, 'w');
    fputcsv($fp, $headers);
    foreach ($input as $row) {
        fputcsv($fp, $row);
    }
    fclose($fp);

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
