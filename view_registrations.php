<?php
$file = 'registrations.csv';

// Check if the file exists
if (!file_exists($file)) {
    die("<h2>No registration data found.</h2>");
}

// Open the CSV file
$fileHandle = fopen($file, "r");
$headers = fgetcsv($fileHandle); // Read column headers

// Display as an HTML table with improved styling
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Registration List</h2>
    <table>
        <tr>
            <?php foreach ($headers as $header) { echo "<th>" . htmlspecialchars($header) . "</th>"; } ?>
        </tr>
        <?php while (($data = fgetcsv($fileHandle)) !== FALSE) { ?>
            <tr>
                <?php foreach ($data as $cell) { echo "<td>" . htmlspecialchars($cell) . "</td>"; } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php fclose($fileHandle); ?>