<x-app-layout>
    <x-hero-section :backgroundImage="'assets/images/backgrounds/cityrealestatebg.jpg'"
        :breadcrumbLinks="[
            ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
            ['url' => route('cities.index'), 'name' => 'العقارات حسب المدن'],
        ]"
        :headerTitle="'اكتشاف العقارات حسب المدينة'"
        :headerDescription="'استعرض عقاراتنا المتنوعة في مختلف المدن واختر المنزل المثالي أو الفرصة الاستثمارية التي تناسب احتياجاتك.'"
    />

    <x-content class="p-4">
        <h6 class="mb-6 text-3xl font-extrabold">اكتشف العقارات في مختلف المدن</h6>
        <p class="text-xl text-right">
            استكشف الفرص العقارية في مختلف المدن واكتشف كيف يمكن لموقعنا أن يساعدك في العثور على المكان المثالي لك.
        </p>

        <x-grid md="3" lg="4" gap="0" class="md:gap-1 sm:grid-cols-2 xs:grid-cols-1">
            @forelse ($cities as $city)
                <a href="{{ route('cities.show', $city->id) }}">
                    <article
                        class="relative flex flex-col justify-end max-w-sm px-8 pt-40 pb-8 mx-auto mt-4 overflow-hidden transition-transform duration-300 ease-in-out rounded-lg cursor-pointer isolate">
                        <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a"
                            alt="{{ $city->name }}" class="absolute inset-0 object-cover w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 hover:blur"></div>
                        <h3 class="z-10 mt-3 text-3xl font-bold text-white hover:text-gray-200">{{ $city->name }}</h3>
                        <div class="z-10 px-2 overflow-hidden text-sm leading-6 text-gray-300 gap-y-1 hover:text-gray-100">
                            {{ $city->realEstates->count() }} عقارات متوفرة</div>
                    </article>
                </a>
            @empty
            @endforelse
        </x-grid>
    </x-content>
</x-app-layout>
