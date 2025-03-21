<?php
$pageTitle = 'Gallery';
$currentPage = 'gallery';
include 'includes/header.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARISCA Summit 2025 - Gallery</title>
    <link rel="icon" type="image/png" href="images/logo/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <style>
        .gallery-intro {
            background: white;
            padding: 3rem 0;
            text-align: center;
        }

        .gallery-intro .lead {
            color: var(--medium-gray);
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .gallery-intro .highlight {
            color: var(--nigerian-green);
            font-weight: 500;
        }

        .year-filter {
            background: white;
            padding: 1.5rem 0;
            position: sticky;
            top: 76px;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-top: 1px solid rgba(0,0,0,0.05);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .year-tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .year-btn {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            border: 2px solid var(--nigerian-green);
            background: transparent;
            color: var(--nigerian-green);
            font-weight: 600;
            transition: all 0.3s ease;
            min-width: 140px;
            position: relative;
            overflow: hidden;
        }

        .year-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--nigerian-green);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: -1;
        }

        .year-btn:hover::before {
            transform: translateX(0);
        }

        .year-btn:hover {
            color: white;
        }

        .year-btn.active {
            background: var(--nigerian-green);
            color: white;
            box-shadow: 0 4px 15px rgba(50, 168, 121, 0.2);
            transform: translateY(-2px);
        }

        .gallery-year {
            padding: 4rem 0;
            background-color: #f8f9fa;
            display: none;
        }

        .gallery-year.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .gallery-year h2 {
            margin-bottom: 2rem;
            color: var(--dark-blue);
            font-weight: 700;
            text-align: center;
            position: relative;
            display: inline-block;
            padding-bottom: 1rem;
        }

        .gallery-year h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--nigerian-green);
            border-radius: 2px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 15px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            background: #eee;
            aspect-ratio: 3/2;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item img.loaded {
            opacity: 1;
        }

        .section-header {
            text-align: center;
            padding: 50px 0;
            background: linear-gradient(135deg, #32A879, #68BE96);
            color: white;
            margin-bottom: 0;
        }

        .section-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .section-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .loading-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #f0f0f0 0%, #f8f8f8 50%, #f0f0f0 100%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>

 <!-- Gallery Header -->
 <section class="page-header">
        <div class="container">
            <h1 class="text-center">Summit Photo Gallery</h1>
            <p class="text-center">Relive the memories of our previous summits through these captured moments</p>
        </div>
    </section>

    <!-- Gallery Introduction -->
    <!-- <section class="gallery-intro">
        <div class="container">
            <p class="lead">
                Step into a visual journey through the <span class="highlight">CARISCA Summit's remarkable history</span>. Our gallery showcases the vibrant moments, meaningful connections, and groundbreaking discussions that have shaped supply chain innovation in Africa. From keynote presentations to collaborative workshops and networking events, each image tells a story of progress and partnership.
            </p>
        </div>
    </section> -->

    <div class="year-filter">
        <div class="container">
            <div class="year-tabs">
                <button class="year-btn active" data-year="2024">Summit 2024</button>
                <button class="year-btn" data-year="2023">Summit 2023</button>
                <button class="year-btn" data-year="2022">Summit 2022</button>
                <button class="year-btn" data-year="2021">Summit 2021</button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- 2024 Gallery -->
        <section class="gallery-year active" data-year="2024">
            <div class="container">
                <h2>Summit 2024</h2>
                <div class="gallery-grid" id="gallery-2024"></div>
            </div>
        </section>

        <!-- 2023 Gallery -->
        <section class="gallery-year" data-year="2023">
            <div class="container">
                <h2>Summit 2023</h2>
                <div class="gallery-grid" id="gallery-2023"></div>
            </div>
        </section>

        <!-- 2022 Gallery -->
        <section class="gallery-year" data-year="2022">
            <div class="container">
                <h2>Summit 2022</h2>
                <div class="gallery-grid" id="gallery-2022"></div>
            </div>
        </section>

        <!-- 2021 Gallery -->
        <section class="gallery-year" data-year="2021">
            <div class="container">
                <h2>Summit 2021</h2>
                <div class="gallery-grid" id="gallery-2021"></div>
            </div>
        </section>
    </div>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
        // Configuration for number of images per year
        const yearConfig = {
            '2024': 13,
            '2023': 22,
            '2022': 21,
            '2021': 9
        };

        let lightbox;

        // Function to initialize lightbox for a specific year
        function initializeLightbox(year) {
            // Destroy existing lightbox if it exists
            if (lightbox) {
                lightbox.destroy();
            }

            // Initialize new lightbox for the current year
            lightbox = GLightbox({
                selector: `[data-gallery="gallery-${year}"]`,
                touchNavigation: true,
                loop: true,
                autoplayVideos: true,
                preload: true,
                moreLength: 3,
                slideEffect: 'slide',
                closeButton: true,
                closeOnOutsideClick: true,
                draggable: true,
                keyboardNavigation: true,
                descPosition: 'bottom'
            });
        }

        // Lazy loading observer
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.onload = () => img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.1
        });

        // Function to create gallery items for a year
        function createGalleryItems(year, count) {
            const gallery = document.getElementById(`gallery-${year}`);
            for(let i = 1; i <= count; i++) {
                const imagePath = `images/prevsummit/${year}/${i}.jpg`;
                const item = document.createElement('a');
                item.href = imagePath;
                item.className = 'gallery-item glightbox';
                item.setAttribute('data-gallery', `gallery-${year}`);
                
                // Add title and description for better navigation
                item.setAttribute('data-title', `Summit ${year} - Image ${i}`);
                item.setAttribute('data-description', `View from CARISCA Summit ${year}`);
                
                const img = document.createElement('img');
                img.setAttribute('data-src', imagePath);
                img.alt = `Summit ${year} - Image ${i}`;
                
                item.appendChild(img);
                gallery.appendChild(item);
                
                // Observe the image for lazy loading
                observer.observe(img);
            }
        }

        // Initialize galleries
        Object.entries(yearConfig).forEach(([year, count]) => {
            createGalleryItems(year, count);
        });

        // Initialize lightbox for the default year (2024)
        initializeLightbox('2024');

        // Year filter functionality
        document.querySelectorAll('.year-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // Update button states
                document.querySelectorAll('.year-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Show selected year's gallery
                const selectedYear = btn.dataset.year;
                document.querySelectorAll('.gallery-year').forEach(gallery => {
                    if (gallery.dataset.year === selectedYear) {
                        gallery.classList.add('active');
                    } else {
                        gallery.classList.remove('active');
                    }
                });

                // Initialize lightbox for the selected year
                initializeLightbox(selectedYear);
            });
        });
    </script>

<?php include 'includes/footer.php'; ?>
