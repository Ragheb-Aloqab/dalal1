<div id="sync1" class="owl-carousel owl-theme ">
    @foreach ($attachments as $attachment)
        <div class="overflow-hidden rounded-md item">
            <img src="{{ Storage::url($attachment->file_path) }}" alt="Attachment Image"
                class="w-h max-w-full h-[440px] object-cover">
        </div>
    @endforeach
</div>

<div id="sync2" class="px-2 owl-carousel owl-theme">
    @foreach ($attachments as $attachment)
        <div class="overflow-hidden rounded-md item">
            <img src="{{ Storage::url($attachment->file_path) }}" alt="Attachment Image" class="w-full max-w-full">
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function() {
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        });

        sync2.owlCarousel({
            items: 5,
            dots: true,
            nav: false,
            margin: 10,
            loop: true,
            responsiveRefreshRate: 100
        });
    });
</script>
