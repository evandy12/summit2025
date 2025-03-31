<?php
// Do not call session_start() again here
if (!isset($_SESSION)) {
    session_start();
}

// Define country and continent lists
$countries = [
    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan",
    "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana",
    "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
    "Chile", "China", "Colombia", "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
    "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
    "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
    "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan",
    "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
    "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius",
    "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal",
    "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau",
    "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda",
    "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia",
    "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea",
    "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand",
    "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
    "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
];

$continents = [
    "Africa", "Asia", "Europe", "North America", "South America", "Australia", "Antarctica"
];
?>

<div class="registration-container">
    <form id="registrationForm" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label>Please select from the following options:</label><br>
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
            <option value="Owner">Owner</option>
            <option value="Manager">Manager</option>
            <option value="Coordinator">Coordinator</option>
            <option value="Healthcare Professional">Healthcare Professional</option>
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
            <option value="NGO">NGO</option>
        </select><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="state">State/Province:</label>
        <input type="text" id="state" name="state" required><br>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">Select a country</option>
            <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="continent">Continent:</label>
        <select id="continent" name="continent" required>
            <option value="">Select a continent</option>
            <?php foreach ($continents as $continent): ?>
                <option value="<?php echo $continent; ?>"><?php echo $continent; ?></option>
            <?php endforeach; ?>
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