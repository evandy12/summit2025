<?php
$pageTitle = 'Home';
$currentPage = 'home';
include 'includes/header.php';
?>
<script>
     smartquotes();
    </script>
    <script>
    smartquotes().listen();
    </script>


    <!-- Homescreen Banner -->
    <div class="homescreen-banner">
        <!-- Banner content will be added here -->
    </div>

   <!-- Hero Section -->
   <section class="hero">
       <div class="banner-image">
           <img src="images/banner.jpg" alt="CARISCA Summit 2025 Banner" class="img-fluid w-100">
       </div>
       <div class="countdown-container">
           <div class="countdown-box">
               <span id="days" class="countdown-value"></span>
               <span class="countdown-label">Days</span>
           </div>
           <div class="countdown-box">
               <span id="hours" class="countdown-value"></span>
               <span class="countdown-label">Hours</span>
           </div>
           <!-- <div class="countdown-box">
               <span id="minutes" class="countdown-value"></span>
               <span class="countdown-label">Minutes</span>
           </div>
           <div class="countdown-box">
               <span id="seconds" class="countdown-value"></span>
               <span class="countdown-label">Seconds</span>
           </div> -->
       </div>
   </section>

    <!-- About Section -->
    <section class="about-section py-5" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="text-success mb-4">About the Summit</h2>
                            <p class="mb-4">CARISCA's annual Supply Chain Research Summit is central to our goal of strengthening African supply chain capacity and advancing Africa's supply chain research globally.</p>
                            <p class="mb-4">The fifth annual Supply Chain Research Summit will be held  July 16-18, 2025, in Lagos, Nigeria. This premier event brings together academic researchers, industry professionals, and public and private sector organizations to create meaningful dialogue addressing complex supply chain challenges.</p>
                            <div class="features mt-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-column"><i class="fas fa-users fa-2x text-success"></i></div>
                                    <div class="text-column">
                                        <h5 class="mb-0">Diverse Participation</h5>
                                        <p class="mb-0">Connect with experts from academia and industry</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-column"><i class="fas fa-lightbulb fa-3x text-success"></i></div>
                                    <div class="text-column">
                                        <h5 class="mb-0">Knowledge Exchange</h5>
                                        <p class="mb-0">Share insights and best practices</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon-column"><i class="fas fa-handshake fa-2x text-success"></i></div>
                                    <div class="text-column">
                                        <h5 class="mb-0">Networking</h5>
                                        <p class="mb-0">Build valuable professional connections</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card venue-card h-100">
                        <div class="card-body">
                            <h3 class="text-success mb-4">Venue Information</h3>
                            <div class="venue-image mb-4">
                                <img src="images/venue.jpg" class="img-fluid rounded" alt="Lagos Marriott Hotel">
                            </div>
                            <h4 class="mb-3">Lagos Marriott Hotel Ikeja</h4>
                            <div class="venue-details">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-success me-3"></i>
                                    <div>
                                        <p class="mb-0">122 Joel Ogunnaike St, Ikeja GRA</p>
                                        <p class="mb-0">Lagos, Nigeria</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-phone fa-2x text-success me-3"></i>
                                    <div>
                                        <p class="mb-0">(+234) 813 984 4850</p>
                                    </div>
                                </div>
                                <div class="hybrid-info mt-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-video fa-2x text-success me-3"></i>
                                        <div>
                                            <h5 class="mb-0">Hybrid Event</h5>
                                            <p class="mb-0">Join us in person or virtually</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Theme Section -->
    <section class="theme-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="text-success h1 mb-5">Conference Theme</h2>
                    <div class="theme-quote">
                        <p><span style="font-family: Georgia;">"Reimagining Africa's Supply Chains for a Sustainable Future"</span></p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                 <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">Track One: General Supply Chains</h5>
                            <ul class="list-unstyled text-start" style="list-style-type: disc; padding-left: 20px;">
                                <li class="mb-2">Logistics and transportation management</li>
                                <li class="mb-2">Procurement, sourcing and supply chain management</li>
                                <li class="mb-2">Manufacturing and production management</li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">Track Two: Sectoral Supply Chains</h5>
                            <ul class="list-unstyled text-start" style="list-style-type: disc; padding-left: 20px;">
                                <li class="mb-2">Health/pharmaceutical supply chain</li>
                                <li class="mb-2">Humanitarian operations and disaster management</li>
                                <li class="mb-2">Agriculture and commodities supply chain</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">Track Three: Emerging Issues in Global Supply Chains</h5>
                            <ul class="list-unstyled text-start" style="list-style-type: disc; padding-left: 20px;">
                                <li class="mb-2">Globalization and supply chains</li>
                                <li class="mb-2">Emerging technologies in supply chains including blockchain technology, big data analytics, predictive analytics and artificial intelligence</li>
                                <li class="mb-2">Global supply chains and grand challenges</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Track Four: Practitioner and Policy Discourse on African Supply Chains</h5>
                            <p class="card-text mb-3">Fostering partnerships and collaboration across Africa through:</p>
                            <ul class="list-unstyled text-start" style="list-style-type: disc; padding-left: 20px;">
                                <li class="mb-2">Supply chain financing</li>
                                <li class="mb-2">Health supply chain policy</li>
                                <li class="mb-2">Supply chain technology trends in Africa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Call for Papers -->
    <section class="call-for-papers py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-5">News and Updates</h2>
                </div>
            </div>
            <div class="row g-4">
                <!-- Call for Papers Card 
                <div class="col-lg-4">
                    <div class="card h-100 info-card">
                        <div class="card-banner">
                            <img src="images/infocard/banner.jpg" class="card-img-top" alt="Call for Papers">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4">Call for Papers</h3>
                            <p class="card-text">Supply chain scholars, students, professionals and decision makers are invited to submit papers for CARISCA's  2025 Supply Chain Research Summit.    , to be held  July 16-18, 2025, in Lagos, Nigeria.</p>
                            <p class="card-text">As in previous years, the 2025 Summit will be a hybrid event. The in-person venue is the Lagos Marriott Hotel Ikeja. Virtual attendees will participate via Zoom.</p>
                            <div class="mt-auto text-center">
                                <a href="https://carisca.knust.edu.gh/2025-summit-call-for-papers/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Paper Development Workshop Card -->
                <div class="col-lg-6">
                    <div class="card h-100 info-card">
                        <div class="card-banner">
                            <img src="images/infocard/paperdev.jpg" class="card-img-top" alt="Paper Development Workshop">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4">Paper Development Workshop</h3>
                            <p class="card-text">Faculty and senior doctoral candidates from higher education institutions (HEIs) in Africa are invited to apply for an invitation to the Paper Development Workshop, which will be held during the Supply Chain Research Summit.</p>
                            <p class="card-text">Participants will meet with and receive professional advice from senior supply chain scholars on a specific academic research paper.</p>
                            <div class="mt-auto text-center">
                                <a href="https://carisca.knust.edu.gh/2025-paper-development-workshop/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PhD Dissertation Awards Card -->
                <div class="col-lg-6">
                    <div class="card h-100 info-card">
                        <div class="card-banner">
                            <img src="images/infocard/phd.jpg" class="card-img-top" alt="PhD Dissertation Awards">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h4">PhD Dissertation Awards</h3>
                            <p class="card-text">Doctoral students at HEIs in Africa who have defended their doctoral proposals are encouraged to enter the PhD Dissertation Awards competition.</p>
                            <p class="card-text">Three finalists will be selected to present their research at the summit and earn a stipend and certificate. All submissions will receive feedback upon request.
                            </p>
                            <div class="mt-auto text-center">
                                <a href="https://carisca.knust.edu.gh/2025-phd-dissertation-awards-competition/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="sponsors py-5 bg-light">
    <?php
        // Number of sponsor/partner images
        $sponsorCount = 3; // ← Update this number as needed
        ?>

        <div class="carousel-container">
            <h2 class="carousel-title">Our Partners & Sponsors</h2>
            <div class="carousel-wrapper" id="sponsorCarousel">
                <?php for ($i = 1; $i <= $sponsorCount; $i++): ?>
                    <div class="carousel-slide">
                        <img src="images/sponsorsandpartners/<?php echo $i; ?>.jpg" alt="Sponsor <?php echo $i; ?>">
                    </div>
                <?php endfor; ?>
            </div>
        </div>

    </section>




    <!-- Previous Summit Video Section -->
    <style>
        .carousel-container {
            text-align: center;
            margin: 60px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            max-width: 1200px;
        }

        .carousel-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .carousel-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .carousel-slide img {
            height: 200px;
            width: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .carousel-slide img:hover {
            transform: scale(1.1);
        }
        .video-section {
            padding: 4rem 0;
            background: #f8f9fa;
        }
        .video-placeholder {
            position: relative;
            cursor: pointer;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            transition: transform 0.3s ease;
        }
        .video-placeholder:hover {
            transform: scale(1.02);
        }
        .video-placeholder img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .play-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgba(33, 37, 41, 0.9);
            z-index: 2;
            transition: color 0.3s ease;
        }
        .video-placeholder:hover .play-overlay {
            color: white;
        }
        .play-overlay i {
            font-size: 4rem;
            margin-bottom: 10px;
            filter: drop-shadow(0 2px 4px rgba(255,255,255,0.3));
            transition: transform 0.3s ease, filter 0.3s ease;
        }
        .video-placeholder:hover .play-overlay i {
            transform: scale(1.1);
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }
        .play-overlay span {
            display: block;
            font-size: 1.2rem;
            font-weight: 500;
            text-shadow: 0 2px 4px rgba(255,255,255,0.5);
            transition: text-shadow 0.3s ease;
        }
        .video-placeholder:hover .play-overlay span {
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
        .video-placeholder::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            transition: background 0.3s ease;
        }
        .video-placeholder:hover::after {
            background: rgba(0,0,0,0.3);
        }
        .icon-column {
            width: 40px;
            display: flex;
            justify-content: center;
            padding-right: 15px;
        }
        .text-column {
            flex-grow: 1;
        }
    </style>
    <section class="video-section" style="background-color: #32A879;">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-10 text-center">
                     <h2 class="text-success mb-4" style="color:#f0f8ff !important ;">Previous Summit Highlights</h2>
                     <div class="video-placeholder" onclick="openFullscreen()">
                         <img src="images/prevsummit/bmic1.jpg" alt="Video Thumbnail" class="img-fluid">
                         <div class="play-overlay">
                             <i class="fas fa-play-circle"></i>
                             <span>Watch Video</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title mb-5">What Past Attendees Say</h2>
                </div>
            </div>
            <div class="testimonial-carousel">
                <button class="nav-button prev-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-button next-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div class="testimonial-items">
                    <div class="testimonial-item active">
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="images/testimonials/ibraheem.jpg" alt="Ibraheem Abdul-Azeez" class="rounded-circle">
                            </div>
                            <p class="testimonial-text"><span style="font-family: Georgia;">"CARISCA Summits has been an invaluable resource for expanding my knowledge of supply chain and logistics. The insights gained have been both practical and thought-provoking, enhancing my understanding of the field.</span></p>
                            <div class="testimonial-author">
                                <h5>Ibraheem Abdul-Azeez</h5>
                                <!-- <p>Lagos State University, School of Transport and Logistics</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="images/testimonials/dantwi.jpg" alt="David Antwi" class="rounded-circle">
                            </div>
                            <p class="testimonial-text">"Participating in the CARISCA Summits and being a recipient of the PhD Dissertation Award has opened new doors of opportunity for me. It has provided access to influential platforms and allowed me to connect with industry leaders and experts.</span></p>
                            <div class="testimonial-author">
                                <h5>David Antwi</h5>
                                <!-- <p>School of Business, KNUST</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="images/testimonials/nadara.jpg" alt="Esther Nandara" class="rounded-circle">
                            </div>
                            <p class="testimonial-text"><span style="font-family: Georgia;">"The feedback I received on my paper at the summit was exceptional. It has significantly shaped my research, guiding me toward making meaningful contributions to the field of healthcare supply chain management.</span></p>
                            <div class="testimonial-author">
                                <h5>Esther Nandara</h5>
                                <!-- <p>Research Scholar</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="images/testimonials/anthony.jpg" alt="Anthony Anammah" class="rounded-circle">
                            </div>
                            <p class="testimonial-text"><span style="font-family: Georgia;">"This summit was an excellent opportunity for cross-pollination of ideas. It's my first time attending, but I've already decided I will be back for every future event. The experience has been both enriching and inspiring.</span></p>
                            <div class="testimonial-author">
                                <h5>Anthony Anammah</h5>
                                <!-- <p>First-time Attendee</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-controls">
                    <div class="testimonial-dots"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About CARISCA Section -->
    <section class="about-carisca py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="section-title">About CARISCA</h2>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="about-carisca-content">
                        <p class="mb-4">The Centre for Applied Research and Innovation in Supply Chain – Africa (CARISCA) was established as a partnership between Kwame Nkrumah University of Science and Technology (KNUST) and Arizona State University (ASU).</p>
                        <p class="mb-4">The Centre's key objective is to support higher education institutions in building the capacity necessary to provide best-in-class research, degree programs and training; facilitate research translation and utilization; and engage stakeholders in best practices and policy changes that strengthen supply chains.</p>
                        <div class="mt-4">
                            <a href="https://research.wpcarey.asu.edu/carisca/mailing-list/" class="btn btn-primary">Join Our Mailing List</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card quick-facts-card">
                        <div class="card-header" style="background-color: #32A879; border: none;">
                            <h4 class="mb-0 text-white">Quick Facts</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-building text-success"></i> Established</span>
                                    <span class="badge" style="background-color: #32A879;">2020</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-graduation-cap text-success"></i> Host Institution</span>
                                    <span class="badge" style="background-color: #32A879;">KNUST</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-globe-africa text-success"></i> Location</span>
                                    <span class="badge" style="background-color: #32A879;">Kumasi, Ghana</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-handshake text-success"></i> Partners</span>
                                    <span class="badge" style="background-color: #32A879;">ASU</span>
                                </li>
                            </ul>
                            <div class="mt-4">
                                <h5 class="mb-3" style="color: #1a2b49;">Quick Links</h5>
                                <div class="d-grid gap-2">
                                    <a href="https://carisca.knust.edu.gh/about-us/about-us/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-info-circle"></i> About Us
                                    </a>
                                    <a href="https://carisca.knust.edu.gh/research/our-resources/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-microscope"></i> Our Publications and Resources
                                    </a>
                                    <a href="https://carisca.knust.edu.gh/news-events/news-press-releases/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-newspaper"></i> News & Events
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- <div class="register-now-section">
        <h2>Register Now</h2>
        <p>Join us today by filling out the registration form.</p>
        <a href="register.php" class="register-now-btn">Register Now</a>
    </div> -->

    <style>
        .register-now-section {
            background-color: #f0f8ff;
            padding: 30px;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-now-section h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .register-now-section p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .register-now-btn {
            display: inline-block;
            background-color: #ff5733;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .register-now-btn:hover {
            background-color: #e74c3c;
            transform: scale(1.05);
        }
    </style>

<?php include 'includes/footer.php'; ?>
