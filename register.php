<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a random CSRF token
}
?>


<?php
$pageTitle = 'Register';
$currentPage = 'register';
include 'includes/header.php';
?>

<!-- Add a header area for Summit Registrations -->

<header class="page-header">
    <div class="container">
        <h1>Summit Registrations</h1>
    </div>
</header>

<!-- Include Select2 CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="registration-container">
    <form id="registrationForm" enctype="multipart/form-data" method="POST">

    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label>Please select from the following options: </label><br>
        <input type="radio" name="attendance" value="In-Person" required> In-Person Attendee<br>
        <input type="radio" name="attendance" value="Virtual" required> Virtual Attendee<br>

        <label for="prefix">Prefix:</label>
        <select id="prefix" name="prefix">
            <option value="">Select</option>
            <option value="Dr">Dr.</option>
            <option value="Prof">Prof.</option>
            <option value="Mr">Mr.</option>
            <option value="Mrs">Mrs.</option>
            <option value="Ms">Ms.</option>
        </select><br>

        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first-name" required><br>

        <label for="middle-name">Middle Name:</label>
        <input type="text" id="middle-name" name="middle-name"><br>

        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="last-name" required><br>

        <label for="suffix">Suffix:</label>
        <select id="suffix" name="suffix">
            <option value="">Select</option>
            <option value="Jr">Jr.</option>
            <option value="Sr">Sr.</option>
            <option value="II">II</option>
            <option value="III">III</option>
        </select><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="organization">Company/Organization:</label>
        <input type="text" id="organization" name="organization" required><br>

        <label for="position">Position:</label>
        <select id="position" name="position" required>
            <option value="">Select</option>
            <option value="Professor/Faculty">Professor/Faculty</option>
            <option value="Higher Education Administration">Higher Education Administration</option>
            <option value="Student/Graduate Student/Postdoc">Student/Graduate Student/Postdoc</option>
            <option value="Other Researcher">Other Researcher</option>
            <option value="Executive/C-Suite">Executive/C-Suite</option>
            <option value="Senior Vice President/Vice President">Senior Vice President/Vice President</option>
            <option value="Owner">Owner</option>
            <option value="Senior Director/Director">Senior Director/Director</option>
            <option value="Senior Manager/Manager">Senior Manager/Manager</option>
            <option value="Specialist/Coordinator">Specialist/Coordinator</option>
            <option value="Other Supply Chain Professional">Other Supply Chain Professional</option>
            <option value="Other Nonprofit or NGO Professional">Other Nonprofit or NGO Professional</option>
            <option value="Doctor">Doctor</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Other Healthcare Professional">Other Healthcare Professional</option>
            <option value="Event Staff">Event Staff</option>
            <option value="Other">Other</option>
        </select><br>
        <div id="idCardUploadWrapper" style="display:none;">
    <label for="id_card">Upload a Photo of Student ID Card:</label>
    <input type="file" id="id_card" name="id_card" accept="image/*">
</div>

        <label for="sector">Sector:</label>
        <select id="sector" name="sector" required>
            <option value="">Select</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Business">Business</option>
            <option value="Government">Government</option>
            <option value="Health care">Health care</option>
            <option value="Higher Education">Higher Education</option>
            <option value="Nonprofit or NGO">Nonprofit or NGO</option>
        </select><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="state">State/Province:</label>
        <input type="text" id="state" name="state" required><br>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">Select a country</option>
            <!-- List of countries -->
            <option value="AF">Afghanistan</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="CV">Cabo Verde</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CD">Congo, Democratic Republic of the</option>
            <option value="CG">Congo, Republic of the</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CW">Curaçao</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="SZ">Eswatini</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and McDonald Islands</option>
            <option value="VA">Holy See</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People's Republic of</option>
            <option value="KR">Korea, Republic of</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People's Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldova</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestine, State of</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Réunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthélemy</option>
            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin (French part)</option>
            <option value="SX">Saint Martin (Dutch part)</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SX">Sint Maarten (Dutch part)</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="SS">South Sudan</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan, Province of China</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Viet Nam</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
        </select><br>

        <label for="continent">Continent:</label>
        <select id="continent" name="continent" required>
            <option value="">Select a continent</option>
            <option value="Africa">Africa</option>
            <option value="Asia">Asia</option>
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="South America">South America</option>
            <option value="Australia">Australia</option>
            <option value="Antarctica">Antarctica</option>
        </select><br>

        <label for="phone">Mobile Phone Number:</label>
        <input type="tel" id="phone" name="phone"><br>

        <label for="comments">Comments or Questions:</label><br>
        <textarea id="comments" name="comments" rows="4"></textarea><br>

        <label>Do you need a certificate of participation?</label><br>
        <input type="radio" name="certificate" value="Yes"> Yes<br>
        <input type="radio" name="certificate" value="No"> No<br>

        <label>Have you attended other CARISCA events?</label><br>
        <input type="radio" name="previous-event" value="Yes"> Yes<br>
        <input type="radio" name="previous-event" value="No"> No<br>

        <label>Email Opt-Out:</label><br>
        <input type="checkbox" name="email-opt-out" value="yes"> DO NOT add me to the CARISCA mailing list<br>

        <label>Photo and Video Release:</label><br>
        <input type="checkbox" name="photo-release" value="yes" required> I understand that sessions at this event will be recorded and shared.<br>

        <button type="submit">Submit</button>
    </form>
</div>

<style>
    .registration-container {
        max-width: 800px; /* Adjusted for better fit */
        margin: 40px auto;
        padding: 30px;
        text-align: left;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif; /* Modern font */
    }

    label {
        font-weight: bold;
        color: #444;
        margin-top: 15px; /* Added margin for spacing */
        display: block; /* Ensures labels are on their own line */
    }

    input[type="text"], input[type="tel"], input[type="email"], select, textarea {
        width: calc(100% - 22px);
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #007bff;
        border-radius: 5px;
        font-size: 1em;
        transition: border-color 0.3s, box-shadow 0.3s; /* Added box-shadow transition */
    }

    input[type="text"]:focus, input[type="tel"]:focus, input[type="email"]:focus, select:focus, textarea:focus {
        border-color: #0056b3;
        box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Added shadow on focus */
        outline: none;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s, transform 0.2s; /* Added transform transition */
    }

    button:hover {
        background-color: #218838;
        transform: scale(1.05); /* Slightly enlarge button on hover */
    }

    /* Additional styles for radio buttons and checkboxes */
    input[type="radio"], input[type="checkbox"] {
        margin-right: 10px; /* Spacing for radio and checkbox */
    }

    /* Additional styles for Select2 */
    .select2-container {
        width: 100% !important; /* Ensure full width */
    }

    .select2-selection {
        border: 1px solid #007bff; /* Match border color */
        border-radius: 5px; /* Match border radius */
        padding: 12px; /* Match padding */
        font-size: 1em; /* Match font size */
        transition: border-color 0.3s, box-shadow 0.3s; /* Match transition */
    }

    .select2-selection--single .select2-selection__rendered {
        line-height: 1.5; /* Match line height */
    }

    .select2-selection--single .select2-selection__arrow {
        height: 100%; /* Match height */
    }
    .select2-container .select2-selection--single {
        height: 50px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #0055b0 !important;
    }

    .select2-selection--single .select2-selection__placeholder {
        color: #999; /* Placeholder color */
    }

    .select2-selection--single:focus {
        border-color: #0056b3; /* Focus border color */
        box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Focus shadow */
        outline: none; /* Remove outline */
    }

    .header-area {
        text-align: center; /* Center the header text */
        margin-bottom: 20px; /* Space below the header */
    }

    .header-area h1 {
        font-size: 2em; /* Adjust font size */
        color: #333; /* Change color if needed */
        font-weight: bold; /* Make the header bold */
    }
</style>


<!-- Modal for Submission Confirmation -->
<div id="confirmationModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); 
    background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; width: 300px;">
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

    // Prevent form default submission and use AJAX
    document.getElementById("registrationForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Always prevent first

    if (emailExists) {
        showModal("Duplicate Email", "This email is already registered. Please use a different one.");
        return;
    }

    let formData = new FormData(this);

    fetch("save_data.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showModal("Submission Successful", "Your registration has been saved successfully!", "index.php");
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
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let firstName = document.getElementById("first-name").value;
        let lastName = document.getElementById("last-name").value;

        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let phoneRegex = /^[0-9+()-\s]{8,15}$/;
        let nameRegex = /^[a-zA-Z\s'-]+$/; // Allows letters, spaces, apostrophes, and hyphens

        if (!emailRegex.test(email)) {
            alert("Invalid email format.");
            event.preventDefault();
            return;
        }

        if (phone && !phoneRegex.test(phone)) {
            alert("Invalid phone number format.");
            event.preventDefault();
            return;
        }

        if (!nameRegex.test(firstName) || !nameRegex.test(lastName)) {
            alert("Names can only contain letters, spaces, hyphens, and apostrophes.");
            event.preventDefault();
            return;
        }

        if (document.querySelector(".g-recaptcha") && !grecaptcha.getResponse()) {
            alert("Please complete the reCAPTCHA.");
            event.preventDefault();
            return;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#country').select2({
            placeholder: "Select a country",
            allowClear: true
        }).on("select2:open", function() {
            // Focus on the search input when the dropdown is opened
            setTimeout(function() {
                $('.select2-search__field').focus();
            }, 1);
        });

        // Initialize Select2 for the continent dropdown
        $('#continent').select2({
            placeholder: "Select a continent",
            allowClear: true
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

<script>
let emailExists = false; // flag to track if email exists

document.getElementById('email').addEventListener('blur', function () {
    const email = this.value.trim();
    if (email === '') return;

    fetch('check_email.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email)
    })
    .then(response => response.json())
    .then(data => {
        emailExists = data.exists; // update the flag
        if (emailExists) {
    showModal("Duplicate Email", "This email has already been used to register. Please use a different one.");
}

    })
    .catch(err => {
        console.error("Email check error:", err);
    });
});
</script>


<?php include 'includes/footer.php'; ?>