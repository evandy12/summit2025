<?php
$file = 'registrations.csv';

if (!file_exists($file)) {
    die("<h2>No registration data found.</h2>");
}

$fileHandle = fopen($file, "r");
$headers = fgetcsv($fileHandle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 50%;
            max-width: 700px;
            border-radius: 10px;
        }
        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
        }
        .close:hover, .close:focus {
            color: black;
            cursor: pointer;
        }
        input.edit-input, input#deleteConfirmInput {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button#saveEdit { background-color: #007bff; color: #fff; }
        button#confirmDelete { background-color: #dc3545; color: #fff; }
    </style>
</head>
<body>
<h2>Registration List</h2>
<button id="deleteSelected">Delete Selected</button>
<table id="registrationTable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Select</th>
            <?php foreach ($headers as $header) echo "<th>" . htmlspecialchars($header) . "</th>"; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        $isFirstRow = true;
        while (($data = fgetcsv($fileHandle)) !== FALSE) {
            if ($isFirstRow) {
                $isFirstRow = false;
                continue; // skip duplicate header row
            }
            echo "<tr>";
            echo "<td>" . $index++ . "</td>";
            echo "<td><input type='checkbox' class='row-select'></td>";
            foreach ($data as $cell) echo "<td>" . htmlspecialchars($cell) . "</td>";
            echo "<td><button class='edit-btn'>Edit</button></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Registration Entry</h3>
        <form id="editForm"></form>
        <button id="saveEdit">Save Changes</button>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirm Deletion</h3>
        <p>Type <strong>DELETE</strong> below to confirm:</p>
        <input type="text" id="deleteConfirmInput" placeholder="Type DELETE">
        <button id="confirmDelete">Delete</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    const headers = <?php echo json_encode($headers); ?>;
    const table = $('#registrationTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
        scrollX: true
    });

    let currentRow = null;

    $(document).on('click', '.edit-btn', function () {
        currentRow = $(this).closest('tr');
        const rowData = table.row(currentRow).data();
        $("#editForm").html('');
        rowData.slice(2, rowData.length - 1).forEach((val, i) => {
            $("#editForm").append(`<label>${headers[i]}</label><input type='text' class='edit-input' value='${val}'>`);
        });
        $("#editModal").show();
    });

    $(".close").on('click', function () {
        $(".modal").hide();
    });

    $(window).on('click', function (event) {
        if ($(event.target).hasClass("modal")) $(".modal").hide();
    });

    $('#saveEdit').on('click', function () {
        const inputs = $(".edit-input");
        inputs.each(function(i) {
            table.cell(currentRow, i + 2).data($(this).val()).draw();
        });
        $("#editModal").hide();
    });

    $('#deleteSelected').on('click', function () {
        const selectedRows = [];
        table.rows().every(function(rowIdx) {
            if ($(this.node()).find('input.row-select').is(':checked')) {
                selectedRows.push(rowIdx);
            }
        });

        if (selectedRows.length === 0) {
            alert("No rows selected.");
            return;
        }

        $("#deleteModal").show();

        $('#confirmDelete').off('click').on('click', function () {
            if ($('#deleteConfirmInput').val() !== 'DELETE') {
                alert("You must type DELETE to confirm.");
                return;
            }

            selectedRows.sort((a, b) => b - a); // delete from bottom up
            selectedRows.forEach(idx => table.row(idx).remove().draw());
            $("#deleteModal").hide();

            // Send updated data (including headers)
            const updatedData = [headers];
            table.rows().every(function () {
                const row = this.data().slice(2, -1);
                updatedData.push(row);
            });

            $.post('write_csv.php', { rows: JSON.stringify(updatedData) }, function(response) {
                if (response.success) {
                    alert("Deletion successful.");
                } else {
                    alert("Failed to save: " + response.error);
                }
            }, 'json');
        });
    });
});
</script>
</body>
</html>
<?php fclose($fileHandle); ?>
 