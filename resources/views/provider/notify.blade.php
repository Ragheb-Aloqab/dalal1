<x-app-layout-provider>

    <div class="container mx-auto mt-10">
        <h2 class="mb-6 text-2xl font-semibold">شعار جديد</h2>

        @if (session('success'))
            <div class="relative px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('provider.notify') }}" method="POST"
            class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">العنوان </label>
                <input type="text" name="title" id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="mt-2 text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="desc" class="block mb-2 text-sm font-bold text-gray-700">محتوى  الاشعار</label>
                <textarea name="desc" id="desc"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror"
                    rows="5" required>{{ old('desc') }}</textarea>
                @error('desc')
                    <p class="mt-2 text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    ارسال الاشعار
                </button>
            </div>
        </form>
    </div>
</x-app-layout-provider>
