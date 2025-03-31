<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$pageTitle = 'Presenter Registration';
$currentPage = 'presenter_register';
include 'includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <h1>Presenter Registration</h1>
    </div>
</header> 

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="registration-container">
    <p>Welcome to the CARISCA 2025 Summit Presenter Registration. Please complete the form below.</p>
    <form id="registrationForm" enctype="multipart/form-data" method="POST">

    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="hidden" name="registration_type" value="presenter">

    <!-- Reuse same form structure as normal registration -->
    <!-- Use PHP include to pull the common fields if needed or copy same structure -->
    <?php include 'includes/form_fields.php'; ?>

</div>

<div id="confirmationModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; width: 300px;">
    <h2 id="modalTitle">Processing...</h2>
    <p id="modalMessage">Please wait.</p>
    <button onclick="closeModal()">OK</button>
</div>

<script>
    function showModal(title, message, redirect = null) {
        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalMessage").innerText = message;
        document.getElementById("confirmationModal").style.display = "block";

        if (redirect) {
            setTimeout(() => {
                window.location.href = redirect;
            }, 3000);
        }
    }

    function closeModal() {
        document.getElementById("confirmationModal").style.display = "none";
    }

    document.getElementById("registrationForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("save_presenter_data.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showModal("Submission Successful", "Your presenter registration has been saved. A confirmation email will be sent soon!", "index.php");
            } else {
                showModal("Submission Failed", "Error: " + data.error);
            }
        })
        .catch(error => {
            showModal("Submission Failed", "A network error occurred.");
        });
    });
</script>

<script>
$(document).ready(function () {
    $('#position').on('change', function () {
        const selected = $(this).val();
        if (selected === 'Student/Graduate Student/Postdoc') {
            $('#idCardUploadWrapper').show();
        } else {
            $('#idCardUploadWrapper').hide();
            $('#id_card').val("");
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
