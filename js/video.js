// Function to open video in fullscreen
function openFullscreen() {
    const videoContainer = document.createElement('div');
    videoContainer.className = 'fullscreen-video';
    
    const iframe = document.createElement('iframe');
    iframe.src = 'https://www.youtube.com/embed/PU2l7kQuzFQ?list=PLpXe7hodHVx2zK0QmujDLuJ88YGsvO_Oo&autoplay=1';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    
    const exitButton = document.createElement('button');
    exitButton.className = 'exit-fullscreen';
    exitButton.innerHTML = '<i class="fas fa-times me-2"></i>Exit Fullscreen';
    exitButton.onclick = closeFullscreen;
    
    videoContainer.appendChild(iframe);
    videoContainer.appendChild(exitButton);
    document.body.appendChild(videoContainer);
    document.body.style.overflow = 'hidden';
}

// Function to close fullscreen video
function closeFullscreen() {
    const videoContainer = document.querySelector('.fullscreen-video');
    if (videoContainer) {
        videoContainer.remove();
        document.body.style.overflow = '';
    }
}

// Close fullscreen when pressing Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeFullscreen();
    }
});
