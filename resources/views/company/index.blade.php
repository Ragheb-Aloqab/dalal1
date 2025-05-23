<x-app-layout>
    <x-hero-section :backgroundImage="'assets/images/backgrounds/realestatebg.jpg'" :breadcrumbLinks="[
        ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
        ['url' => route('companies.index'), 'name' => 'الشركات والمكاتب العقارية'],
    ]" :headerTitle="'الشركات والمكاتب العقارية'" :headerDescription="'اكتشف الشركات والمكاتب التي تقدم أفضل العقارات للبيع على منصتنا. تعرف على كيفية إدراج العقارات وفوائد التعامل مع أبرز الفاعلين في السوق العقاري.'"/>

    <livewire:company-cards />
</x-app-layout>
