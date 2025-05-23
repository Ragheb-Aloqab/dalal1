    <!-- Toast -->
    @if (session('success'))
        <div id="dismiss-toast"
            class="max-w-xs transition duration-300 rounded-md opacity-0 toast-onload hs-removing:translate-x-5 hs-removing:opacity-0 bg-success"
            role="alert">
            <div class="flex gap-2 p-3">
                <i class="text-lg text-white ti ti-alert-circle"></i>
                <div>
                    <h5 class="font-semibold text-white">{{ session('success') }}</h5>
                    {{-- <p class="text-white text-fs_12">{{ session('success') }}</p> --}}
                </div>
                <div class="ms-auto">
                    <button type="button" data-hs-remove-element="#dismiss-toast">
                        <i class="text-lg leading-none text-white ti ti-x opacity-70"></i>
                    </button>
                </div>
            </div>
        </div>

    @endif
    @if (session('error'))
    <div id="dismiss-toast"
        class="max-w-xs transition duration-300 rounded-md opacity-0 toast-onload hs-removing:translate-x-5 hs-removing:opacity-0 bg-success"
        role="alert">
        <div class="flex gap-2 p-3">
            <i class="text-lg text-white ti ti-alert-circle"></i>
            <div>
                <h5 class="font-semibold text-white">{{ session('error') }}</h5>
                {{-- <p class="text-white text-fs_12">{{ session('success') }}</p> --}}
            </div>
            <div class="ms-auto">
                <button type="button" data-hs-remove-element="#dismiss-toast">
                    <i class="text-lg leading-none text-white ti ti-x opacity-70"></i>
                </button>
            </div>
        </div>
    </div>

@endif

    <!-- End Toast -->
