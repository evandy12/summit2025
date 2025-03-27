<?php
header('Content-Type: application/json');

$file = 'registrations.csv';
$idFolder = 'id_verifications';

try {
    if (!isset($_POST['rows'])) {
        throw new Exception("No data provided.");
    }

    $input = json_decode($_POST['rows'], true);

    if (!is_array($input) || count($input) < 2) {
        throw new Exception("Invalid or empty data provided.");
    }

    // Extract headers
    $headers = $input[0];
    $expectedCols = count($headers);

    // Separate data rows
    $dataRows = array_slice($input, 1);

    // Read original emails to detect deletions
    $original = [];
    if (file_exists($file) && ($handle = fopen($file, 'r')) !== false) {
        $originalHeaders = fgetcsv($handle);
        $emailIndex = array_search('Email', $originalHeaders);
        while (($row = fgetcsv($handle)) !== false) {
            $original[] = $row;
        }
        fclose($handle);
    }

    $originalEmails = array_map(function ($r) use ($originalHeaders) {
        return strtolower(trim($r[array_search('Email', $originalHeaders)] ?? ''));
    }, $original);

    $newEmails = array_map(function ($r) use ($headers) {
        return strtolower(trim($r[array_search('Email', $headers)] ?? ''));
    }, $dataRows);

    $deletedEmails = array_diff($originalEmails, $newEmails);

    // Delete ID photo files for deleted emails
    foreach ($deletedEmails as $email) {
        $safeName = str_replace(['@', '.'], '_', $email) . '.jpg';
        $path = "$idFolder/$safeName";
        if (file_exists($path)) {
            unlink($path);
        }
    }

    // Write cleaned data to CSV
    $fp = fopen($file, 'w');
    fputcsv($fp, $headers);

    foreach ($dataRows as $row) {
        if (count($row) < $expectedCols) {
            $row = array_pad($row, $expectedCols, '');
        } elseif (count($row) > $expectedCols) {
            $row = array_slice($row, 0, $expectedCols);
        }
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
