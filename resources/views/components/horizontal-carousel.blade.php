<!-- resources/views/components/horizontal-carousel.blade.php -->
<div class="max-w-6xl p-6 mx-auto horizontal-carousel-container">
    <div id="{{ $carouselId }}" class="p-6 horizontal-carousel">
        <!-- Add your carousel items dynamically -->
        {{ $slot }}
    </div>
    <!-- Next and Previous Buttons -->
    <button id="{{ $carouselId }}-prev" class="w-12 h-12 rounded-full horizontal-nav-button left"> <!-- Initially hidden -->
        &#8592; <!-- Left Arrow -->
    </button>
    <button id="{{ $carouselId }}-next" class="hidden w-12 h-12 rounded-full horizontal-nav-button right"> <!-- Always visible initially -->
        &#8594; <!-- Right Arrow -->
    </button>
</div>

<style>
    .horizontal-carousel {
        display: flex;
        overflow-x: auto; /* Enable scrolling but hide scrollbar */
        scrollbar-width: none; /* For Firefox */
        -ms-overflow-style: none; /* For Internet Explorer and Edge */
        direction: rtl; /* Set direction for RTL support */
    }
    .horizontal-carousel::-webkit-scrollbar {
        display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
    }
    .horizontal-slide {
        flex: 0 0 25%; /* Default to 4 items on larger screens */
        scroll-snap-align: start;
    }
    .horizontal-carousel-container {
        position: relative;
    }
    .horizontal-nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: #4BCA97;
        color: white;
        padding: 0.5rem;

        cursor: pointer;

    }
    .horizontal-nav-button.left {
        left: 0.5rem; /* Positioning for RTL */
    }
    .horizontal-nav-button.right {
        right: 0.5rem; /* Positioning for RTL */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('{{ $carouselId }}');
        const slides = carousel.children; // Get the slides
        const nextButton = document.getElementById('{{ $carouselId }}-next');
        const prevButton = document.getElementById('{{ $carouselId }}-prev');

        let currentIndex = 0;

        function updateButtons() {
            const visibleItems = Math.floor(window.innerWidth / 768) === 0 ? 1 : Math.floor(window.innerWidth / 768);
            const maxIndex = slides.length - visibleItems;

            // Hide prev button if at the beginning
            if (currentIndex === 0) {
                prevButton.classList.add('hidden');
            } else {
                prevButton.classList.remove('hidden');
            }

            // Hide next button if at the end
            if (currentIndex >= maxIndex) {
                nextButton.classList.add('hidden');
            } else {
                nextButton.classList.remove('hidden');
            }
        }

        function showNextItems() {
            const visibleItems = Math.floor(window.innerWidth / 768) === 0 ? 1 : Math.floor(window.innerWidth / 768);
            if (currentIndex < slides.length - visibleItems) {
                currentIndex += visibleItems;
                carousel.scrollBy({
                    left: carousel.clientWidth,
                    behavior: 'smooth'
                });
                updateButtons();
            }
        }

        function showPrevItems() {
            const visibleItems = Math.floor(window.innerWidth / 768) === 0 ? 1 : Math.floor(window.innerWidth / 768);
            if (currentIndex > 0) {
                currentIndex -= visibleItems;
                carousel.scrollBy({
                    left: -carousel.clientWidth,
                    behavior: 'smooth'
                });
                updateButtons();
            }
        }

        // Check if at the beginning or end of the carousel
        function checkIfAtEnd() {
            const scrollLeft = carousel.scrollLeft;
            const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;

            // Show or hide buttons based on scroll position
            if (scrollLeft === 0) {
                prevButton.classList.add('hidden');
                nextButton.classList.remove('hidden');
            } else if (scrollLeft >= maxScrollLeft) {
                nextButton.classList.add('hidden');
                prevButton.classList.remove('hidden');
            } else {
                prevButton.classList.remove('hidden');
                nextButton.classList.remove('hidden');
            }
        }

        nextButton.addEventListener('click', showNextItems);
        prevButton.addEventListener('click', showPrevItems);

        // Listen for scroll events
        carousel.addEventListener('scroll', checkIfAtEnd);

        // Initial button state update
        updateButtons();

        // Update button visibility on window resize
        window.addEventListener('resize', updateButtons);
    });
</script>
