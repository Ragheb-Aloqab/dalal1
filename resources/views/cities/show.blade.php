<x-app-layout>
    <x-hero-section :backgroundImage="'assets/images/backgrounds/cityrealestatebg.jpg'" :breadcrumbLinks="[
        ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
        ['url' => route('cities.index'), 'name' => 'العقارات حسب المدن'],
         ['url' => route('cities.show',$city->id), 'name' => $city->name],
    ]" :headerTitle="'اكتشاف العقارات في ' . $city->name" :headerDescription="'استكشف أفضل العقارات المتوفرة في ' . $city->name . ' واكتشف فرص الاستثمار والسكن الرائعة التي تقدمها المدينة. تصفح مجموعتنا الواسعة من الشقق، الفلل، والمكاتب التجارية لتجد الخيار الأمثل الذي يلبي كل احتياجاتك.'"/>

    <div class="">
        @livewire('cities-filter', ['cityId' => $city->id])
    </div>



</x-app-layout>
