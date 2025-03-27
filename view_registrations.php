<?php
$file = 'registrations.csv';

if (!file_exists($file)) {
    die("<h2>No registration data found.</h2>");
}

$fileHandle = fopen($file, "r");
$headers = fgetcsv($fileHandle);

if (!$headers || count($headers) < 2) {
    die("<h2>Error: CSV file may be corrupt or only contains one column.</h2>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        table.dataTable td { white-space: nowrap; }
        .action-buttons { display: flex; gap: 10px; }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }
        .modal-content {
            background-color: #fff;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            text-align: left;
            max-height: calc(100vh - 80px);
            overflow-y: auto;
        }
        .modal-content h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .modal-content label {
            display: block;
            margin: 10px 0 5px;
        }
        .modal-content input, .modal-content select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .modal-content button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .modal-content button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h2>Registration List</h2>
<table id="registrationTable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAll"></th>
            <?php foreach ($headers as $header): ?>
                <th><?php echo htmlspecialchars($header); ?></th>
            <?php endforeach; ?>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while (($data = fgetcsv($fileHandle)) !== false) {
            $expectedCols = count($headers);
            $cellCount = count($data);
            if ($cellCount < $expectedCols) {
                $data = array_pad($data, $expectedCols, '');
            } elseif ($cellCount > $expectedCols) {
                $data = array_slice($data, 0, $expectedCols);
            }

            echo "<tr>";
            echo "<td><input type='checkbox' class='row-select'></td>";
            foreach ($data as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "<td class='action-buttons'>
                    <button class='edit-btn'>Edit</button>
                    <button class='delete-btn'>Delete</button>
                  </td>";
            echo "</tr>";
        }
        fclose($fileHandle);
        ?>
    </tbody>
</table>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Confirm Deletion</h3>
        <p>Type <strong>DELETE</strong> below to confirm:</p>
        <input type="text" id="deleteConfirmInput" placeholder="Type DELETE">
        <br><br>
        <button id="confirmDeleteBtn">Confirm Delete</button>
        <button onclick="closeDeleteModal()">Cancel</button>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <h3>Edit Entry</h3>
        <form id="editForm"></form>
        <button id="saveEditBtn">Save</button>
        <button onclick="closeEditModal()">Cancel</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    const headers = <?php echo json_encode($headers); ?>;
    const table = $('#registrationTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        scrollX: true
    });

    let rowToDelete = null;
    let rowToEdit = null;

    $(document).on('click', '.delete-btn', function () {
        rowToDelete = $(this).closest('tr');
        $('#deleteModal').show();
    });

    $('#confirmDeleteBtn').on('click', function () {
        if ($('#deleteConfirmInput').val() === 'DELETE') {
            table.row(rowToDelete).remove().draw();
            saveTableDataToCSV();
            closeDeleteModal();
        } else {
            alert('You must type DELETE to confirm.');
        }
    });

    $('#selectAll').on('click', function () {
        $('input.row-select').prop('checked', this.checked);
    });

    $(document).on('click', '.edit-btn', function () {
        rowToEdit = $(this).closest('tr');
        const rowData = table.row(rowToEdit).data();
        $('#editForm').html('');
        for (let i = 1; i <= headers.length; i++) {
            const header = headers[i-1];
            const value = rowData[i];
            if (header === 'Verification Status') {
                $('#editForm').append(`
                    <label>${header}</label>
                    <select name='${header}'>
                        <option value='Pending' ${value === 'Pending' ? 'selected' : ''}>Pending</option>
                        <option value='Verified (No Payment)' ${value === 'Verified (No Payment)' ? 'selected' : ''}>Verified (No Payment)</option>
                        <option value='Verified (With Payment)' ${value === 'Verified (With Payment)' ? 'selected' : ''}>Verified (With Payment)</option>
                    </select>
                `);
            } else {
                $('#editForm').append(`<label>${header}</label><input type='text' name='${header}' value='${value}'>`);
            }
        }
        $('#editModal').show();
    });

    $('#saveEditBtn').on('click', function (e) {
        e.preventDefault();
        const updatedValues = $('#editForm').serializeArray();
        updatedValues.forEach((item, index) => {
            table.cell(rowToEdit, index + 1).data(item.value);
        });
        table.draw();
        saveTableDataToCSV();
        closeEditModal();
    });

    function closeDeleteModal() {
        $('#deleteModal').hide();
        $('#deleteConfirmInput').val('');
    }

    function closeEditModal() {
        $('#editModal').hide();
    }

    function saveTableDataToCSV() {
        const allData = [];
        const rows = table.rows().data().toArray();
        allData.push(headers);

        rows.forEach(row => {
            allData.push(row.slice(1, -1));
        });

        $.post('write_csv.php', { rows: JSON.stringify(allData) }, function(response) {
            if (!response.success) {
                alert('Error saving CSV: ' + response.error);
            }
        }, 'json');
    }
</script>
</body>
</html>
