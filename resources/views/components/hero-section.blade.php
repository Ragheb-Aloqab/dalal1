<div class="">
    <div class="relative h-[50vh] bg-cover" style="background-image: url('{{ asset('assets/images/heros/hero (2).jpg') }}')">
        <div class="relative h-full overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center text-white">
                <div id="slider" class="relative w-full h-full">
                    <div id="slideContainer"
                        class="absolute inset-0 transition-all duration-700 ease-in-out bg-center bg-cover opacity-70">
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-0">
            <div class="h-full">
                <div class="max-w-screen-xl p-4 mx-auto ">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            @foreach($breadcrumbLinks as $link)
                                <li class="inline-flex items-center">
                                    {{-- @if($loop->last)
                                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">{{ $link['name'] }}</span>
                                    @if --}}
                                        <a href="{{ $link['url'] }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                            @if($loop->first)
                                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                                </svg>
                                                الصفحة الرئيسية
                                            @else
                                                <svg class="w-3 h-3 mx-1 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg>
                                                {{ $link['name'] }}
                                            @endif
                                        </a>
                                    {{-- @endif --}}
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
                <div class="flex items-center justify-center h-full max-w-screen-xl p-4 mx-auto">
                    <div class="flex items-center justify-center">
                        <!-- Header Section -->
                        <div class="container px-6 mx-auto text-center">
                            <h1 class="mb-6 text-5xl font-extrabold text-white">{{ $headerTitle }}</h1>
                            <p class="max-w-2xl mx-auto mb-8 text-xl text-gray-200">
                                {{ $headerDescription }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Array of image URLs
    const imageUrls = [
        // '{{ asset('assets/images/heros/hero (1).jpg') }}',
        // '{{ asset('assets/images/backgrounds/profilebg.jpg') }}',
        // '{{ asset('assets/images/backgrounds/back-silder (2).jpg') }}',
        // '{{ asset('assets/images/backgrounds/back-silder (3).jpg') }}',
        // '{{ asset('assets/images/backgrounds/back-silder (4).jpg') }}',
        // '{{ asset('assets/images/backgrounds/back-silder (5).jpg') }}',
        // '{{ asset('assets/images/backgrounds/back-silder (1).jpg') }}',

    ];

    let currentSlide = 0;

    function showSlide(index) {
        const slideContainer = document.getElementById('slideContainer');
        currentSlide = (index + imageUrls.length) % imageUrls.length;

        // Update the background image
        slideContainer.style.backgroundImage = `url(${imageUrls[currentSlide]})`;
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Auto-slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Initialize first slide as visible
    document.addEventListener('DOMContentLoaded', function() {
        showSlide(0);
    });
</script>
