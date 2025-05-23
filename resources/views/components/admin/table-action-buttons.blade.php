<div class="flex gap-3 action-btn">
    <a href="{{ $viewUrl }}" class="text-info edit">
        <i class="text-lg ti ti-eye"></i>
    </a>
    <a href="{{ $editUrl }}" class="text-dark edit">
        <i class="text-lg ti ti-pencil text-bodytext dark:text-darklink"></i>
    </a>
    <form action="{{ $deleteUrl }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-dark delete">
            <i class="text-lg ti ti-trash text-bodytext dark:text-darklink"></i>
        </button>
    </form>
</div>
