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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input.edit-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button#saveEdit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button#saveEdit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Registration List</h2>
    <table id="registrationTable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Select</th>
                <?php foreach ($headers as $header) { echo "<th>" . htmlspecialchars($header) . "</th>"; } ?>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; while (($data = fgetcsv($fileHandle)) !== FALSE) { ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><input type="checkbox" class="row-select"></td>
                    <?php foreach ($data as $cell) { echo "<td>" . htmlspecialchars($cell) . "</td>"; } ?>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Modal for Editing -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Edit Registration Entry</h3>
            <form id="editForm"></form>
            <button id="saveEdit">Save Changes</button>
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
            const table = $('#registrationTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: { columns: ':visible' }
                    },
                    {
                        extend: 'print',
                        exportOptions: { columns: ':visible' }
                    },
                    'colvis'
                ],
                scrollX: true
            });

            const modal = document.getElementById("editModal");
            const span = document.getElementsByClassName("close")[0];
            const form = document.getElementById("editForm");
            let currentRow = null;

            $('#registrationTable tbody').on('click', '.edit-btn', function () {
                currentRow = $(this).closest('tr');
                const rowData = table.row(currentRow).data();
                form.innerHTML = '';
                const headers = <?php echo json_encode($headers); ?>;
                rowData.slice(2, rowData.length - 1).forEach((value, index) => {
                    const label = headers[index];
                    form.innerHTML += `<label>${label}</label><input type='text' class='edit-input' value='${value}'>`;
                });
                modal.style.display = "block";
            });

            span.onclick = function() { modal.style.display = "none"; }
            window.onclick = function(event) { if (event.target == modal) modal.style.display = "none"; }

            document.getElementById("saveEdit").onclick = function () {
                const inputs = document.querySelectorAll(".edit-input");
                inputs.forEach((input, i) => {
                    table.cell(currentRow, i + 2).data(input.value).draw();
                });
                modal.style.display = "none";
            };
        });
    </script>
</body>
</html>
<?php fclose($fileHandle); ?>
