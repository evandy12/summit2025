// Set the date we're counting down to (July 16, 2025, 8:00 AM WAT)
const countDownDate = new Date(Date.UTC(2025, 6, 16, 8, 0, 0)).getTime(); // UTC time for 8:00 AM WAT

// Function to update the countdown display
function updateCountdownDisplay(id, value) {
    const element = document.getElementById(id);
    if (element.innerHTML !== value) {
        element.innerHTML = value;
    }
}

// Update the countdown every 1 second
const countdownTimer = setInterval(function() {
    // Get today's date and time
    const now = new Date().getTime();
    
    // Debugging: Log current time and countdown date
    console.log("Current Time:", new Date(now).toUTCString());
    console.log("Countdown Date:", new Date(countDownDate).toUTCString());

    // Find the distance between now and the countdown date
    const distance = countDownDate - now;

    // Debugging: Log the distance
    console.log("Distance:", distance);

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Update the HTML elements only if the value has changed
    updateCountdownDisplay("days", days.toString());
    updateCountdownDisplay("hours", hours.toString().padStart(2, '0'));
    updateCountdownDisplay("minutes", minutes.toString().padStart(2, '0'));
    updateCountdownDisplay("seconds", seconds.toString().padStart(2, '0'));

    // If the countdown is finished, display expired message
    if (distance < 0) {
        clearInterval(countdownTimer);
        document.getElementById("countdown").innerHTML = "The Summit Has Started!";
    }
}, 1000);
