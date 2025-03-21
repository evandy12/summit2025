<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - CARISCA Summit 2025' : 'CARISCA Summit 2025'; ?></title>
    <link rel="icon" type="image/png" href="images/logo/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom dropdown arrow styling */
        .nav-item.dropdown .nav-link::after {
            display: block;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            content: "\f107";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            transition: transform 0.2s ease;
            margin-top: 2px;
        }
        
        .nav-item.dropdown .nav-link {
            position: relative;
        }
        .nav-item.dropdown .nav-link[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        .register-btn {
            background-color: #68be96;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            animation: flash 1.5s infinite;
        }

        .register-btn:hover {
            background: color #e74c3c;
            color:white;
            transform: scale(1.05);
        }

        @keyframes flash {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
    </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo/logo.png" alt="CARISCA Summit 2025">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="program.php">Schedule</a></li>
                            <li><a class="dropdown-item" href="speakers.php">Speakers</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lodging & Travel
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="venue.php">Lodging</a></li>
                            <li><a class="dropdown-item" href="travel-guide.php">Travel Guide</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <!-- <li class="nav-item">
                       <a class="nav-link" href="faq.php">FAQ</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link register-btn" href="register.php">Register Now</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>