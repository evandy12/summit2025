<?php
$pageTitle = 'Program';
$currentPage = 'program';
include 'includes/header.php';
?>

<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <h1>Summit Program</h1>
    </div>
</header>

    <!-- Program Schedule -->
    <section class="program-schedule">
        <div class="container">
            <div class="schedule-wrapper">
                <!-- Day Tabs -->
                <ul class="nav nav-pills nav-fill day-tabs" id="dayTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="day1-tab" data-bs-toggle="tab" data-bs-target="#day1" type="button" role="tab">
                            Day 1
                            <span class="d-block small">May 5, 2025</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="day2-tab" data-bs-toggle="tab" data-bs-target="#day2" type="button" role="tab">
                            Day 2
                            <span class="d-block small">May 6, 2025</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="day3-tab" data-bs-toggle="tab" data-bs-target="#day3" type="button" role="tab">
                            Day 3
                            <span class="d-block small">May 7, 2025</span>
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="dayTabsContent">
                    <!-- Day 1 Content -->
                    <div class="tab-pane fade show active" id="day1" role="tabpanel">
                        <!-- Venue Tabs -->
                        <ul class="nav nav-tabs venue-tabs" id="day1VenueTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="day1-all-tab" data-bs-toggle="tab" data-bs-target="#day1-all" type="button" role="tab">All Schedule</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="day1-venue1-tab" data-bs-toggle="tab" data-bs-target="#day1-venue1" type="button" role="tab">Venue 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="day1-venue2-tab" data-bs-toggle="tab" data-bs-target="#day1-venue2" type="button" role="tab">Venue 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="day1-venue3-tab" data-bs-toggle="tab" data-bs-target="#day1-venue3" type="button" role="tab">Venue 3</button>
                            </li>
                        </ul>

                        <!-- Venue Content -->
                        <div class="tab-content" id="day1VenueContent">
                            <!-- All Schedule -->
                            <div class="tab-pane fade show active" id="day1-all" role="tabpanel">
                                <div class="schedule-timeline">
                                    <div class="schedule-item">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="time">8:00 AM - 9:00 AM</div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="event-details">
                                                    <h4>Registration and Breakfast</h4>
                                                    <p>Welcome reception and networking</p>
                                                    <div class="venue-badge">
                                                        <span class="badge">Main Hall</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="schedule-item">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="time">9:00 AM - 10:30 AM</div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="event-details">
                                                    <h4>Opening Ceremony</h4>
                                                    <p>Welcome address and keynote speech</p>
                                                    <div class="venue-badge">
                                                        <span class="badge">Main Auditorium</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="schedule-item">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="time">10:45 AM - 12:15 PM</div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="event-details">
                                                    <h4>Panel Discussion: Future of Supply Chain in Africa</h4>
                                                    <p>Expert panel discussing emerging trends and challenges</p>
                                                    <div class="venue-badge">
                                                        <span class="badge">Conference Room A</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day 2 Content -->
                    <div class="tab-pane fade" id="day2" role="tabpanel">
                        <!-- Similar structure as Day 1 -->
                        <div class="schedule-timeline">
                            <div class="schedule-item">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="time">9:00 AM - 10:30 AM</div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="event-details">
                                            <h4>Day 2 Sessions</h4>
                                            <p>Coming soon...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day 3 Content -->
                    <div class="tab-pane fade" id="day3" role="tabpanel">
                        <!-- Similar structure as Day 1 -->
                        <div class="schedule-timeline">
                            <div class="schedule-item">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="time">9:00 AM - 10:30 AM</div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="event-details">
                                            <h4>Day 3 Sessions</h4>
                                            <p>Coming soon...</p>
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


<?php include 'includes/footer.php'; ?>
