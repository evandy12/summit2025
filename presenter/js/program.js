document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tab"]'));
    triggerTabList.forEach(function(triggerEl) {
        new bootstrap.Tab(triggerEl);
    });

    // Add click event listeners to day tabs
    var dayTabs = document.querySelectorAll('#dayTabs .nav-link');
    dayTabs.forEach(function(dayTab) {
        dayTab.addEventListener('click', function(e) {
            e.preventDefault();
            // Get the target day content
            var targetDay = this.getAttribute('data-bs-target').replace('#', '');
            
            // Show the day content
            var tabContent = document.querySelector(this.getAttribute('data-bs-target'));
            var tab = new bootstrap.Tab(this);
            tab.show();

            // Automatically select "All Schedule" for the active day
            var allScheduleTab = document.querySelector('#' + targetDay + '-all-tab');
            if (allScheduleTab) {
                var venueTab = new bootstrap.Tab(allScheduleTab);
                venueTab.show();
            }
        });
    });

    // Add click event listeners to venue tabs
    var venueTabs = document.querySelectorAll('.venue-tabs .nav-link');
    venueTabs.forEach(function(venueTab) {
        venueTab.addEventListener('click', function(e) {
            e.preventDefault();
            var tab = new bootstrap.Tab(this);
            tab.show();
        });
    });
});
