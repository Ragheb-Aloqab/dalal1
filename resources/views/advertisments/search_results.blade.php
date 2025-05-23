<x-app-layout>

    <x-hero-section :backgroundImage="'assets/images/backgrounds/realestatebg.jpg'" :breadcrumbLinks="[
        ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
        ['url' => route('search'), 'name' => 'البحث الذكي للعقارات'],
    ]" :headerTitle="'البحث الذكي للعقارات'" :headerDescription="'استفد من قوة الذكاء الاصطناعي لاكتشاف العقارات المثالية بسرعة ودقة. نظامنا المتطور يفهم احتياجاتك ويقترح الخيارات الأنسب لك. تجربة بحث لا مثيل لها تجمع بين التكنولوجيا المتقدمة والراحة.'" />
    <div class="sticky top-0 z-10 border-b border-gray-200 bg-background-50">
        <x-content class="px-4 py-2">

            <div class="">
                <h2 class="text-2xl font-semibold ">نتائج البحث عن {{ $query }}</h2>
            </div>
            <form action="{{ route('search') }}" method="GET">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">بحث</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="query"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ابحث عن عقار..." required value="{{ request('query') }}" />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">بحث</button>
                </div>
            </form>
        </x-content>
    </div>
    <x-container>
        <x-content class="p-4">
            <x-grid md="4" lg="4" gap="4">
                <div class="col-span-1">
                    <!-- Sidebar content if necessary, otherwise remove this col-span-1 -->
                </div>
                <div class="col-span-3 space-y-4">
                    @forelse ($advertisements as $ad)
                        <x-card class="p-4">
                            <div class="property">
                                <h3 class="text-lg font-semibold">{{ $ad->title }}</h3>
                                <p class="text-sm">{{ $ad->realEstate->description }}</p>
                                <p class="text-sm">السعر: {{ $ad->realEstate->price }}</p>
                                <p class="text-sm">المدينة: {{ $ad->realEstate->city->name ?? 'غير محددة' }}</p>
                                <p class="text-sm">النوع: {{ class_basename($ad->realEstate->realEstateable) }}</p>
                                <a href="{{ route('advertisements.show', $ad->id) }}"
                                    class="text-blue-600 hover:underline">عرض التفاصيل</a>
                            </div>
                        </x-card>
                    @empty
                        <p class="text-sm">لم يتم العثور على نتائج.</p>
                    @endif
                    {{-- {{ $advertisements->links() }} --}}

                </div>
            </x-grid>
        </x-content>
    </x-container>
</x-app-layout>
