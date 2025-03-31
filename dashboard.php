<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$regularFile = 'registrations.csv';
$presenterFile = 'presenter_registration.csv';

function parse_csv($filePath) {
    if (!file_exists($filePath)) return [];
    $data = array_map('str_getcsv', file($filePath));
    $headers = array_map('trim', array_shift($data));
    return array_map(fn($row) => array_combine($headers, $row), $data);
}

$regularData = parse_csv($regularFile);
$presenterData = parse_csv($presenterFile);
$allData = array_merge(
    array_map(fn($r) => $r + ['Type' => 'Attendee'], $regularData),
    array_map(fn($p) => $p + ['Type' => 'Presenter'], $presenterData)
);

function summarize($data, $key) {
    $summary = [];
    foreach ($data as $row) {
        $value = trim($row[$key] ?? 'Unknown');
        $summary[$value] = ($summary[$value] ?? 0) + 1;
    }
    arsort($summary);
    return $summary;
}

function top_value($summary) {
    return array_key_first($summary);
}

$typeFilter = $_GET['type'] ?? 'All';
$modeFilter = $_GET['mode'] ?? 'All';
$continentFilter = $_GET['continent'] ?? '';
$countryFilter = $_GET['country'] ?? '';

$filteredData = array_filter($allData, function ($row) use ($typeFilter, $modeFilter, $continentFilter, $countryFilter) {
    if ($typeFilter !== 'All' && $row['Type'] !== $typeFilter) return false;
    if ($modeFilter !== 'All' && ($row['Attendance Type'] ?? '') !== $modeFilter) return false;
    if ($continentFilter && ($row['Continent'] ?? '') !== $continentFilter) return false;
    if ($countryFilter && ($row['Country'] ?? '') !== $countryFilter) return false;
    return true;
});

$total = count($filteredData);
$countries = summarize($filteredData, 'Country');
$positions = summarize($filteredData, 'Position');
$continents = summarize($filteredData, 'Continent');
$inPerson = count(array_filter($filteredData, fn($r) => ($r['Attendance Type'] ?? '') === 'In-Person'));
$virtual = count(array_filter($filteredData, fn($r) => ($r['Attendance Type'] ?? '') === 'Virtual'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        .summary-boxes { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 30px; }
        .box {
            background: #f0f8ff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 200px;
        }
        select, button {
            padding: 10px;
            margin: 10px 5px;
        }
        table { width: 100%; margin-top: 30px; }
        .filters { text-align: center; margin-bottom: 20px; }
        .actions { text-align: center; margin-bottom: 20px; }
        .header-bar a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .header-bar a:hover {
            text-decoration: underline;
        }
        .header-bar {
            background-color: #007bff;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="header-bar">
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="view_registrations.php">Attendees</a>
        <a href="view_presenter_registrations.php">Presenters</a>
    </div>
    <div><a href="logout.php">Logout</a></div>
</div>

<h2>Summit Registration Dashboard</h2>
<div class="filters">
    <form method="GET">
        <label>Type:
            <select name="type">
                <option <?= $typeFilter === 'All' ? 'selected' : '' ?>>All</option>
                <option <?= $typeFilter === 'Attendee' ? 'selected' : '' ?>>Attendee</option>
                <option <?= $typeFilter === 'Presenter' ? 'selected' : '' ?>>Presenter</option>
            </select>
        </label>
        <label>Attendance Mode:
            <select name="mode">
                <option <?= $modeFilter === 'All' ? 'selected' : '' ?>>All</option>
                <option <?= $modeFilter === 'In-Person' ? 'selected' : '' ?>>In-Person</option>
                <option <?= $modeFilter === 'Virtual' ? 'selected' : '' ?>>Virtual</option>
            </select>
        </label>
        <label>Continent:
            <select name="continent">
                <option value="">All</option>
                <?php foreach (array_keys($continents) as $cont): ?>
                    <option value="<?= $cont ?>" <?= $continentFilter === $cont ? 'selected' : '' ?>><?= $cont ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Country:
            <select name="country">
                <option value="">All</option>
                <?php foreach (array_keys($countries) as $c): ?>
                    <option value="<?= $c ?>" <?= $countryFilter === $c ? 'selected' : '' ?>><?= $c ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit">Apply Filters</button>
    </form>
</div>

<div class="summary-boxes">
    <div class="box"><strong>Total Registrants:</strong><br><?= $total ?></div>
    <div class="box"><strong>In-Person:</strong><br><?= $inPerson ?></div>
    <div class="box"><strong>Virtual:</strong><br><?= $virtual ?></div>
    <div class="box"><strong>Top Country:</strong><br><?= top_value($countries) ?></div>
    <div class="box"><strong>Top Position:</strong><br><?= top_value($positions) ?></div>
</div>

<div class="actions">
    <a href="view_registrations.php"><button>View Attendee Registrations</button></a>
    <a href="view_presenter_registrations.php"><button>View Presenter Registrations</button></a>
</div>

<table id="summaryTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Name</th>
            <th>Type</th>
            <th>Position</th>
            <th>Country</th>
            <th>Continent</th>
            <th>Mode</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($filteredData as $row): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['Email'] ?? '-') ?></td>
                <td><?= htmlspecialchars(($row['First Name'] ?? '') . ' ' . ($row['Last Name'] ?? '')) ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= htmlspecialchars($row['Position'] ?? '-') ?></td>
                <td><?= htmlspecialchars($row['Country'] ?? '-') ?></td>
                <td><?= htmlspecialchars($row['Continent'] ?? '-') ?></td>
                <td><?= htmlspecialchars($row['Attendance Type'] ?? '-') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#summaryTable').DataTable();
    });
</script>
</body>
</html>
