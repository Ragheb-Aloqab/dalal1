@props([
    'submitText' => 'Save',
    'resetText' => 'Reset',
    'submitClasses' => 'btn btn-md',
    'resetClasses' => 'btn btn-light-error',
])

<div class="flex justify-end gap-3 mt-6">
    <button type="submit" class="{{ $submitClasses }}">
        {{ $submitText }}
    </button>
    <button type="reset" class="{{ $resetClasses }}">
        {{ $resetText }}
    </button>
</div>
