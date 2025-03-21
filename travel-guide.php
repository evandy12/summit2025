<?php
$pageTitle = 'Lagos Travel Guide';
include 'includes/header.php';
?>

<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <h1>Lagos Travel Guide</h1>
        <p class="lead mt-3 mb-0">Essential information for summit participants traveling to Lagos</p>
    </div>
</header>

<style>
    .list-unstyled li, .list-group-item {
        display: flex;
        align-items: center;
    }
    .icon-column {
        width: 30px; /* Set a fixed width for the icon column */
        display: flex;
        justify-content: center; /* Center the icon within the column */
    }
    .text-column {
        flex-grow: 1; /* Allow the text column to take up remaining space */
    }
</style>

<!-- Introduction -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card h-100">
                    <img src="images/lagos/lagos-city.jpg" class="card-img-top" alt="Lagos City Skyline">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="text-success mb-4">Welcome Summit Participants</h2>
                <p class="mb-4">This comprehensive guide is designed specifically for 2025 Summit attendees to ensure a smooth and enjoyable stay in Lagos. Whether you're a first-time or returning visitor to Nigeria, you'll find essential information to help you prepare for the summit.</p>
                <p>As a summit participant, you'll be primarily based in the Ikeja area, where our conference venue is located. Here's what you need to know about the key areas you might visit:</p>
                <ul class="list-unstyled">
                    <li>
                        <div class="icon-column"><i class="fas fa-map-marker-alt text-success"></i></div>
                        <div class="text-column"><strong>Ikeja (Summit Venue)</strong> - The commercial hub and capital of Lagos State</div>
                    </li>
                    <li>
                        <div class="icon-column"><i class="fas fa-map-marker-alt text-success"></i></div>
                        <div class="text-column"><strong>Victoria Island</strong> - Business district with recommended hotels and restaurants</div>
                    </li>
                    <li>
                        <div class="icon-column"><i class="fas fa-map-marker-alt text-success"></i></div>
                        <div class="text-column"><strong>Mainland</strong> - Where you'll find local markets and cultural sites</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- What to Expect -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h2 class="text-success mb-4">Local Essentials</h2>
        <div class="row">    
            <div class="col-lg-6">
                <div class="card">                   
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="icon-column"><i class="fas fa-clock text-success"></i></div>
                                <div class="text-column"><strong>Time Zone:</strong> WAT (GMT+1) - Plan your arrival accordingly</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-language text-success"></i></div>
                                <div class="text-column"><strong>Language:</strong> Summit is in English; local languages: Yoruba, Pidgin</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-money-bill text-success"></i></div>
                                <div class="text-column"><strong>Currency:</strong> Nigerian Naira (₦) - Exchange available at airport</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-plug text-success"></i></div>
                                <div class="text-column"><strong>Power:</strong> 230V, 50Hz (Type D & G) - Bring adapters for your devices</div>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</section>

<!-- Weather and Best Time -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-success mb-4">Weather Info</h2>
        <div class="row">
            <div class="col-lg-6">
                <h5>Weather in July</h5>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">What to Expect</h6>
                        <ul class="list-unstyled">
                            <li>
                                <div class="icon-column"><i class="fas fa-temperature-high text-success"></i></div>
                                <div class="text-column">Average Temperature: 27-32°C (81-90°F)</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-cloud-rain text-success"></i></div>
                                <div class="text-column">Rainy Season: Occasional showers</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-tint text-success"></i></div>
                                <div class="text-column">Humidity: High (75-85%)</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5>Preparation Tips</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="icon-column"><i class="fas fa-umbrella text-success"></i></div>
                        <div class="text-column">Pack a light raincoat or umbrella</div>
                    </li>
                    <li class="list-group-item">
                        <div class="icon-column"><i class="fas fa-tshirt text-success"></i></div>
                        <div class="text-column">Wear light, breathable clothing</div>
                    </li>
                    <li class="list-group-item">
                        <div class="icon-column"><i class="fas fa-tint text-success"></i></div>
                        <div class="text-column">Stay hydrated</div>
                    </li>
                    <li class="list-group-item">
                        <div class="icon-column"><i class="fas fa-sun text-success"></i></div>
                        <div class="text-column">Bring sunscreen (UV index is high)</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Travel Requirements -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h2 class="text-success mb-4">Travel Requirements</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Visa</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="icon-column"><i class="fas fa-passport text-success"></i></div>
                                <div class="text-column">Valid passport (6+ months)</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-file-invoice text-success"></i></div>
                                <div class="text-column">Nigerian visa required. Apply well in advance</div>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <p class="mb-2"><strong>Official Resources:</strong></p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="https://portal.immigration.gov.ng/VisaArrivalProgram/freshVisaOnArrivalProgram" target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-external-link-alt me-2"></i>Visa On Arrival
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://immigration.gov.ng/visa_class/business-visa-single-entry/" target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-external-link-alt me-2"></i>Business, single entry visa (F4A)
                                    </a>
                                </li>
                            </ul>
                        </div>                    
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Health</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="icon-column"><i class="fas fa-syringe text-success"></i></div>
                                <div class="text-column">Yellow Fever vaccination required</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-pills text-success"></i></div>
                                <div class="text-column">Malaria prevention recommended</div>
                            </li>
                            <li>
                                <div class="icon-column"><i class="fas fa-file-medical text-success"></i></div>
                                <div class="text-column">Travel insurance advised</div>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i>
                                Check your country's embassy website for specific travel advisories and requirements for Nigeria.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Getting Around -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-success mb-4">Transportation During Your Stay</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-taxi text-success me-2"></i>Recommended Services</h5>
                        <p class="card-text">Uber and Bolt are preferred for summit participants. Available throughout Lagos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-plane text-success me-2"></i>Airport Transfer</h5>
                        <p class="card-text">Use shuttles provided by your hotel or labeled airport taxis for safe and reliable transport.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-map text-success me-2"></i>Local Navigation</h5>
                        <p class="card-text">You can easily navigate Lagos using your phone's map application, such as Google Maps, Apple Maps, or any Open Maps app. The Summit app will also provide directions to the conference hotel for added convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
