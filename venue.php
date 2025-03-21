<?php
$pageTitle = "Venue & Accommodation";
$currentPage = "venue";
include 'includes/header.php';
?>

<style>
.alternative-accommodations .card img {
    height: 200px; /* Fixed height for all hotel images */
    object-fit: cover; /* This ensures images cover the area without distortion */
    width: 100%;
}

.alternative-accommodations .card {
    transition: transform 0.3s ease;
}

.alternative-accommodations .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.venue-details p {
    display: flex;
    align-items: center;
}

.venue-details i {
    margin-right: 10px; /* Adjust as needed for spacing */
}
</style>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1>Lodging</h1>
        </div>
    </header>

    <!-- Main Venue Section -->
    <section class="main-venue py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="images/venue.jpg" alt="Lagos Marriott Hotel Ikeja" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-lg-6">
                    <h2 class="text-success mb-4">Conference Venue</h2>
                    <p class="mb-4">The 2025 Supply Chain Research Summit will be held at the Lagos Marriott Hotel Ikeja.</p>
                    <p class="mb-4">A five-star conference hotel in Nigeria's commercial hub of Ikeja, the capital of Lagos State, the Marriott is a premier venue near Lagos airport. It offers ample parking and amenities including a spa, well-equipped gym, outdoor pool and four restaurants and bars.</p>                   
                    <div class="venue-details">
                        <p>
                            <i class="fas fa-map-marker-alt text-success me-2"></i>
                            122 Joel Ogunnaike Street, Ikeja GRA, Lagos
                        </p>
                        <p>
                            <i class="fas fa-envelope text-success me-2"></i>
                            <a href="mailto:loslg.reservations@marriott.com" class="text-success">loslg.reservations@marriott.com</a>
                        </p>
                        <a href="http://www.lagosmarriotthotelikeja.com/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Hotel Website</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alternative Accommodations -->
    <section class="alternative-accommodations py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-success mb-5">Lodging Options</h2>
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="lead mb-4">While the Lagos Marriott Hotel Ikeja is our primary conference venue, we understand that participants may have different preferences and budgets. We've carefully selected these alternative accommodations based on their proximity to the venue, quality of service, and value.</p>                              
            </div>            

            <!-- Important Notes -->
    <section class="notes py-4">
        <div class="container">
            <div class="alert alert-info">
                <h4 class="alert-heading">Important Notes:</h4>
                <ul class="mb-0">
                    <li>Some hotels offer special discount codes for summit attendees. Mention the Supply Chain Research Summit when booking.</li>
                    <li>All walking and driving times are approximate and may vary based on traffic conditions.</li>
                    <li>We recommend booking your accommodation early as Lagos is a busy business hub.</li>
                </ul>
            </div>
        </div>
    </section>
            <div class="row g-4">
                <!-- Starfire Hotel -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/starfire.jpg" class="card-img-top" alt="Starfire Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">Starfire Hotel</h3>
                            <p class="card-text mb-3">110m from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>128 Joel Ogunnaike St, Ikeja GRA, Ikeja 101233, Lagos, Nigeria</li>
                                <li><i class="fas fa-phone text-success me-2"></i><a href="tel:+2348030952727" class="text-success">+234 803 095 2727</a></li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:info@bwstarfirehotel.com" class="text-success">info@bwstarfirehotel.com</a></li>
                            </ul>
                            <a href="https://bwstarfirehotel.com/contact/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>
                <!-- Safron Hotel -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/safron.jpg" class="card-img-top" alt="The Safron Hotel Ikeja">
                        <div class="card-body">
                            <h3 class="card-title h5">The Safron Hotel Ikeja</h3>
                            <p class="card-text mb-3">115m from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i> 57 Joel Ogunnaike St, Onigbongbo, Ikeja 100271, Lagos, Nigeria</li>
                                <li><i class="fas fa-phone text-success me-2"></i><a href="tel:+2349066498862" class="text-success">+234 906 649 8862</a></li>
                            </ul>
                            <a href="https://www.thesafronhotel.com/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>
                  <!-- Shoregate Hotels -->
                  <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/shoregate.jpg" class="card-img-top" alt="Shoregate Hotels">
                        <div class="card-body">
                            <h3 class="card-title h5">Shoregate Hotels Limited</h3>
                            <p class="card-text mb-3">450m from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>29 Joel Ojunnaike St</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:reservations@shoregatehotels.com" class="text-success">reservations@shoregatehotels.com</a></li>
                            </ul>
                            <a href="http://www.shoregatehotels.com/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>
                
                <!-- The Regent -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/regent.jpg" class="card-img-top" alt="The Regent Lagos">
                        <div class="card-body">
                            <h3 class="card-title h5">The Regent Lagos</h3>
                            <p class="card-text mb-3">500m from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>25 Joel Ojunnaike St</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:reservation@theregentlagos.com" class="text-success">reservation@theregentlagos.com</a></li>
                            </ul>
                            <a href="http://www.theregentlagos.com/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>
                   <!-- Providence Hotel -->
                   <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/providence.jpg" class="card-img-top" alt="The Providence Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">The Providence Hotel</h3>
                            <p class="card-text mb-3">700km from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>12A Oba Akinjobi Way, GRA Ikeja</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:reservations@providencelagos.com" class="text-success">reservations@providencelagos.com</a></li>
                            </ul>
                            <a href="https://www.hotels.com/ho3365991744/?locale=en_GB&pos=HCOM_ME&siteid=310000033" class="btn btn-outline-success">Visit Website</a>
                        </div>
                    </div>
                </div>
                <!-- Classio Hotel -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/classio.jpg" class="card-img-top" alt="Classio Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">Classio Hotel</h3>
                            <p class="card-text mb-3">750m from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>11 Joel Ogunaike Street, Ikeja, Nigeria</li>
                                <li><i class="fas fa-phone text-success me-2"></i><a href="tel:+2348100400869" class="text-success">+234 810 040 0869</a></li>
                            </ul>
                            <a href="http://theclassiohotel.com/" class="btn btn-outline-success">Visit Website</a>
                        </div>
                    </div>
                </div>
              
                 <!-- Radisson Hotel -->
                 <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/raddisson2.jpg" class="card-img-top" alt="Radisson Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">Radisson Hotel Lagos Ikeja</h3>
                            <p class="card-text mb-3">1.3km from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>42/44 Isaac John St, Ikeja GRA, Lagos 102215, Lagos, Nigeria</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:reservations.ikeja@radisson.com" class="text-success">reservations.ikeja@radisson.com</a></li>
                            </ul>
                            <a href="https://www.radissonhotels.com/en-us/hotels/radisson-lagos-ikeja" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>

                
                <!-- Radisson Blu -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/radisson.jpg" class="card-img-top" alt="Radisson Blu Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">Radisson Blu Ikeja</h3>
                            <p class="card-text mb-3">1.4km from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>38/40 Isaac John Street, G.R.A. Ikeja</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:reservations.ikeja@radissonblu.com" class="text-success">reservations.ikeja@radissonblu.com</a></li>
                            </ul>
                            <a href="http://www.radissonblu.com/en/hotel-lagos-ikeja" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>

                
                <!-- Amber Residence -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/amber.jpg" class="card-img-top" alt="Amber Residence">
                        <div class="card-body">
                            <h3 class="card-title h5">Amber Residence Ikeja GRA</h3>
                            <p class="card-text mb-3">1.4km from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>16 Esugbayi St., Off Oba Akinjobi Way</li>
                                <li><i class="fas fa-envelope text-success me-2"></i><a href="mailto:amberresidence.reservations@gmail.com" class="text-success">amberresidence.reservations@gmail.com</a></li>
                            </ul>
                            <a href="http://www.amberresidenceng.com/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>

                 <!-- Sheraton Lagos Hotel -->
                 <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/sheraton.jpg" class="card-img-top" alt="Sheraton Lagos Hotel">
                        <div class="card-body">
                            <h3 class="card-title h5">Sheraton Lagos Hotel</h3>
                            <p class="card-text mb-3">2.7km from conference hotel</p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>30 Mobolaji Bank Anthony Way Ikeja, Lagos 021189, Lagos, Nigeria</li>
                                <li><i class="fas fa-phone text-success me-2"></i><a href="tel:+2348139844430" class="text-success">+234 813 984 4430</a></li>
                            </ul>
                            <a href="https://sheraton.lagoshotelsnigeria.com/en/" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Visit Website</a>
                        </div>
                    </div>
                </div>
             
               
               
                <!-- Airbnb Options -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <img src="images/hotels/airbnb.jpg" class="card-img-top" alt="Airbnb Options">
                        <div class="card-body">
                            <h3 class="card-title h5">Airbnb Options around Conference Hotel</h3>
                            <ul class="list-unstyled mb-4">
                                <li><i class="fas fa-info-circle text-success me-2"></i>Multiple options available in the area</li>
                                <li><i class="fas fa-home text-success me-2"></i>Apartments, houses, and rooms</li>
                                <li><i class="fas fa-map-marker-alt text-success me-2"></i>Filter by distance to venue</li>
                            </ul>
                            <a href="https://www.airbnb.com/s/Lagos-Marriott-Hotel-Ikeja--Joel-Ogunnaike-Street--Lagos-Ikeja--Nigeria/homes?refinement_paths%5B%5D=%2Fhomes&flexible_trip_lengths%5B%5D=one_week&monthly_start_date=2025-02-01&monthly_length=3&monthly_end_date=2025-05-01&price_filter_input_type=0&channel=EXPLORE&query=Lagos%20Marriott%20Hotel%20Ikeja%2C%20Lagos%20Ikeja%2C%20Nigeria&place_id=ChIJP83UdheSOxAR330Xo6imv4I&location_bb=QNK%2FD0BWc79A0qj1QFZHiw%3D%3D&date_picker_type=calendar&checkin=2025-05-04&checkout=2025-05-07&source=structured_search_input_header&search_type=autocomplete_click" class="btn btn-outline-success" target="_blank" rel="noopener noreferrer">Browse Airbnb</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    

    <!-- Area Information 
    <section class="area-info py-5">
        <div class="container">
            <h2 class="text-center text-success mb-5">About the Recommended Accommodation Area</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="fas fa-car fa-3x text-success"></i>
                            </div>
                            <h3 class="card-title h5 text-center">Transportation</h3>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>15 mins from Murtala Muhammed Airport</li>
                                <li><i class="fas fa-check text-success me-2"></i>Hotel shuttle service available</li>
                                <li><i class="fas fa-check text-success me-2"></i>Reliable taxi services in the area</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="fas fa-utensils fa-3x text-success"></i>
                            </div>
                            <h3 class="card-title h5 text-center">Dining & Entertainment</h3>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Multiple restaurants within walking distance</li>
                                <li><i class="fas fa-check text-success me-2"></i>Shopping malls nearby</li>
                                <li><i class="fas fa-check text-success me-2"></i>Local and international cuisine</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="fas fa-shield-alt fa-3x text-success"></i>
                            </div>
                            <h3 class="card-title h5 text-center">Safety & Security</h3>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>24/7 security personnel</li>
                                <li><i class="fas fa-check text-success me-2"></i>Safe neighborhood</li>
                                <li><i class="fas fa-check text-success me-2"></i>Emergency services nearby</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

<?php include 'includes/footer.php'; ?>