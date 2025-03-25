<?php
$idFolder = 'id_verifications';
$csvFile = 'registrations.csv';
$verificationFile = 'student_verifications.json';

if (!file_exists($csvFile)) {
    die("<h2>No registration data found.</h2>");
}

$rows = array_map('str_getcsv', file($csvFile));
$headers = array_shift($rows);
$emailIndex = array_search('Email', $headers);
$nameIndex = array_search('First Name', $headers);
$institutionIndex = array_search('Organization', $headers);

$verifications = file_exists($verificationFile) ? json_decode(file_get_contents($verificationFile), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Student IDs</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .modal {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 90%;
            text-align: center;
        }
        .modal img { max-width: 100%; max-height: 300px; margin-top: 15px; }
        .modal h3 { margin-top: 10px; }
        .modal button {
            padding: 10px 20px;
            margin: 10px 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Student ID Verification</h2>
<p>Total Students Registered: <strong><?php echo count(array_filter($rows, function($r) use ($headers) {
    return stripos($r[array_search('Position', $headers)], 'Student') !== false;
})); ?></strong></p>

<label for="statusFilter">Filter by Status:</label>
<select id="statusFilter">
    <option value="">All</option>
    <option value="Verified">Verified</option>
    <option value="Rejected">Rejected</option>
    <option value="Pending">Pending</option>
</select>

<table id="studentTable" class="display" style="width:100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Institution</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($rows as $row) {
            $position = $row[array_search('Position', $headers)];
            if (stripos($position, 'Student') !== false) {
                $email = $row[$emailIndex];
                $name = $row[$nameIndex];
                $institution = $row[$institutionIndex];
                $status = $verifications[$email] ?? 'Pending';
                echo "<tr class='student-row' data-email='$email' data-name='$name' data-institution='$institution' data-status='$status'>
                        <td>$count</td>
                        <td>" . htmlspecialchars($name) . "</td>
                        <td>" . htmlspecialchars($email) . "</td>
                        <td>" . htmlspecialchars($institution) . "</td>
                        <td class='status-cell'>$status</td>
                      </tr>";
                $count++;
            }
        }
        ?>
    </tbody>
</table>

<div id="modalOverlay" class="modal-overlay">
    <div class="modal">
        <h3 id="studentName"></h3>
        <p id="studentInstitution"></p>
        <div id="studentImage"></div>
        <button onclick="updateStatus('Verified')">Verify</button>
        <button onclick="updateStatus('Rejected')">Reject</button>
        <button onclick="closeModal()">Close</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    const table = $('#studentTable').DataTable();
    let currentEmail = '';

    function closeModal() {
        document.getElementById("modalOverlay").style.display = "none";
    }

    function updateStatus(status) {
        fetch('update_verification.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'email=' + encodeURIComponent(currentEmail) + '&status=' + status
        })
        .then(res => res.text())
        .then(() => {
            document.querySelector(`[data-email='${currentEmail}'] .status-cell`).textContent = status;
            closeModal();
        });
    }

    document.querySelectorAll('.student-row').forEach(row => {
        row.addEventListener('click', () => {
            const email = row.dataset.email;
            const name = row.dataset.name;
            const institution = row.dataset.institution;
            const image = `id_verifications/${email.replace(/[^a-zA-Z0-9]/g, '_')}.jpg`;
            currentEmail = email;

            document.getElementById('studentName').textContent = name;
            document.getElementById('studentInstitution').textContent = institution;
            document.getElementById('studentImage').innerHTML = `<img src='${image}' onerror="this.onerror=null; this.alt='No ID found';">`;
            document.getElementById('modalOverlay').style.display = 'flex';
        });
    });

    document.getElementById('statusFilter').addEventListener('change', function () {
        const selected = this.value.toLowerCase();
        table.column(4).search(selected).draw();
    });
</script>
</body>
</html>
