<?php
$pageTitle = "FAQ";
$currentPage = "faq";
include 'includes/header.php';
?>

<style>
    .accordion-button:not(.collapsed) {
        background-color: #e7f1eb;
        color: #198754;
    }
    .accordion-button:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
    }
    .faq-section {
        padding: 80px 0;
    }
    .faq-header {
        margin-bottom: 50px;
    }
    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23198754'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
</style>

<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
    </div>
</header>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-header text-center">
                    <p class="lead">Find answers to commonly asked questions about the CARISCA Summit 2025</p>
                </div>

                <div class="accordion" id="faqAccordion">
                   <!-- About the Summit -->
                   <div class="accordion-item">
                       <h2 class="accordion-header">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="true">
                               About the Summit
                           </button>
                       </h2>
                       <div id="about" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                           <div class="accordion-body">
                               <div class="mb-4">
                                   <h5>What is the CARISCA Summit?</h5>
                                   <p>CARISCA's annual Supply Chain Research Summit is central to our goal of strengthening African supply chain capacity and advancing Africa's supply chain research globally. The fifth annual Supply Chain Research Summit will be held on July 16-18, 2025, in Lagos, Nigeria.</p>
                               </div>
                               <div class="mb-4">
                                   <h5>Who attends the summit?</h5>
                                   <p>The summit brings together academic researchers, industry professionals, and public and private sector organizations to create meaningful dialogue addressing complex supply chain challenges. It offers diverse participation, knowledge exchange, and valuable networking opportunities.</p>
                               </div>
                               <div>
                                   <h5>What can I expect at the summit?</h5>
                                   <p>The summit features keynote speeches, panel discussions, workshops, and networking events. You'll have opportunities to connect with experts from academia and industry, share insights and best practices, and build valuable professional connections.</p>
                               </div>
                           </div>
                       </div>
                   </div>
                    <!-- Venue & Accommodation -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#venue" aria-expanded="false">
                                Venue & Accommodation
                            </button>
                        </h2>
                        <div id="venue" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="mb-4">
                                    <h5>Where is the summit being held?</h5>
                                    <p>The summit will be held at the Lagos Marriott Hotel Ikeja, located at 122 Joel Ogunnaike Street, Ikeja GRA, Lagos, Nigeria.</p>
                                </div>
                                <div class="mb-4">
                                    <h5>Are there special hotel rates for attendees?</h5>
                                    <p>Yes, we have negotiated special rates with the Lagos Marriott Hotel Ikeja and several nearby hotels. Booking information and discount codes will be provided upon registration.</p>
                                </div>
                                <div>
                                    <h5>How do I get to the venue?</h5>
                                    <p>The venue is approximately 15 minutes from Murtala Muhammed International Airport. Hotel shuttle service is available, and we will provide detailed transportation information in your registration confirmation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Program & Schedule -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#program" aria-expanded="false">
                                Program & Schedule
                            </button>
                        </h2>
                        <div id="program" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="mb-4">
                                    <h5>What is the conference schedule?</h5>
                                    <p>The summit will run for three days, featuring keynote speeches, panel discussions, workshops, and networking events. A detailed schedule will be published closer to the event date.</p>
                                </div>
                                <div class="mb-4">
                                    <h5>Will there be networking opportunities?</h5>
                                    <p>Yes, the summit includes dedicated networking sessions, a welcome reception, and a conference dinner, providing multiple opportunities to connect with fellow attendees.</p>
                                </div>
                                <div>
                                    <h5>What can I expect from the presentations?</h5>
                                    <p>Each presentation session will include time for live Q&A and discussion, allowing for meaningful interaction between presenters and attendees. We encourage active participation and engagement during these sessions.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Papers & Presentations -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#papers" aria-expanded="false">
                                Papers & Presentations
                            </button>
                        </h2>
                        <div id="papers" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="mb-4">
                                    <h5>How can I submit a paper?</h5>
                                    <p>Paper submissions will be accepted through our online submission system. Guidelines and deadlines will be posted on the website.</p>
                                </div>
                                <div class="mb-4">
                                    <h5>What is the presentation format?</h5>
                                    <p>All accepted papers will be presented as oral presentations. Each presenter will have 20 minutes for their presentation followed by a Q&A session.</p>
                                </div>
                                <div>
                                    <h5>Will I receive feedback on my paper?</h5>
                                    <p>Yes, all submitted papers will receive feedback from our review committee. This feedback is designed to help strengthen your research and presentation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!-- Travel Information -->
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#travel" aria-expanded="false">
                              Travel Information
                          </button>
                      </h2>
                      <div id="travel" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                              <div class="mb-4">
                                  <h5>What's the weather like during the summit?</h5>
                                  <p>In July, Lagos experiences temperatures between 27-32°C (81-90°F). It's during the rainy season, so we recommend bringing appropriate clothing and an umbrella.</p>
                              </div>
                              <div class="mb-4">
                                  <h5>What should I know before arriving?</h5>
                                  <ul class="list-unstyled">
                                      <li><i class="fas fa-clock text-success me-2"></i><strong>Time Zone:</strong> WAT (GMT+1)</li>
                                      <li><i class="fas fa-language text-success me-2"></i><strong>Language:</strong> Summit is in English; local languages are Yoruba and Pidgin</li>
                                      <li><i class="fas fa-money-bill text-success me-2"></i><strong>Currency:</strong> Nigerian Naira (₦) - Exchange available at airport</li>
                                      <li><i class="fas fa-plug text-success me-2"></i><strong>Power:</strong> 230V, 50Hz (Type D & G) - Bring adapters</li>
                                  </ul>
                              </div>
                              <div>
                                  <h5>What areas of Lagos can I explore?</h5>
                                  <p>Key areas near the summit venue include:</p>
                                  <ul>
                                      <li><i class="fas fa-map-marker-alt text-success me-2"></i><strong>Ikeja (Summit Venue)</strong> - The commercial hub and capital of Lagos State</li>
                                      <li><i class="fas fa-map-marker-alt text-success me-2"></i><strong>Victoria Island</strong> - Business district with recommended hotels and restaurants</li>
                                      <li><i class="fas fa-map-marker-alt text-success me-2"></i><strong>Mainland</strong> - Where you'll find local markets and cultural sites</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>

                <!-- Contact Information -->
                <div class="mt-5 text-center">
                    <p class="mb-4">Don't see your question answered here?</p>
                    <a href="contact.php" class="btn btn-success">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
