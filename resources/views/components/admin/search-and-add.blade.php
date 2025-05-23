<div class="mb-6 card">
    <div class="card-body">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-4 md:col-span-12 sm:col-span-12">
                <form action="{{ $searchUrl }}" method="GET" class="relative max-w-64">
                    <i
                        class="absolute text-xl translate-y-1/2 ti ti-search end-3 text-bodytext dark:text-darklink -top-2"></i>
                    <input type="text" name="search" class="py-2 form-control product-search pr-11 rtl:text-right"
                        id="input-search" placeholder="بحث في المحتوى..." />
                </form>
            </div>
            <div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ $createUrl }}" class="flex items-center gap-2 btn">
                        <i class="text-lg leading-none text-white ti ti-plus"></i> إضافة جديد
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
