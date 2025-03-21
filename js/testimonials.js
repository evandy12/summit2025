document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.testimonial-track');
    const cards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot');
    const prevButton = document.querySelector('.prev-testimonial');
    const nextButton = document.querySelector('.next-testimonial');
    
    let currentIndex = 0;
    const totalSlides = cards.length;

    // Set initial position
    function setInitialPosition() {
        const slideWidth = cards[0].offsetWidth;
        track.style.transform = `translateX(-${slideWidth}px)`;
    }

    // Update dots
    function updateDots() {
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Slide to index
    function slideToIndex(index, transition = true) {
        const slideWidth = cards[0].offsetWidth;
        track.style.transition = transition ? 'transform 0.5s ease-in-out' : 'none';
        track.style.transform = `translateX(-${slideWidth * (index + 1)}px)`;
        
        if (transition) {
            currentIndex = index;
            updateDots();
        }
    }

    // Next slide
    function nextSlide() {
        if (currentIndex >= totalSlides - 1) {
            currentIndex = -1;
        }
        slideToIndex(currentIndex + 1);
    }

    // Previous slide
    function prevSlide() {
        if (currentIndex <= 0) {
            currentIndex = totalSlides;
        }
        slideToIndex(currentIndex - 1);
    }

    // Handle transition end
    function handleTransitionEnd() {
        if (currentIndex === -1) {
            track.style.transition = 'none';
            currentIndex = totalSlides - 1;
            slideToIndex(currentIndex, false);
        } else if (currentIndex === totalSlides) {
            track.style.transition = 'none';
            currentIndex = 0;
            slideToIndex(currentIndex, false);
        }
        // Ensure transition is reset for the next slide
        setTimeout(() => {
            track.style.transition = 'transform 0.5s ease-in-out';
        }, 0);
    }

    // Event Listeners
    track.addEventListener('transitionend', handleTransitionEnd);
    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => slideToIndex(index));
    });

    // Auto advance slides
    let slideInterval = setInterval(nextSlide, 5000);

    // Pause on hover
    track.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });

    track.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 12000);
    });

    // Initialize
    updateDots();
    
    // Handle window resize
    window.addEventListener('resize', () => {
        slideToIndex(currentIndex, false);
    });

    // Initial setup with a slight delay to ensure proper positioning
    setTimeout(() => {
        setInitialPosition();
    }, 100);
});
