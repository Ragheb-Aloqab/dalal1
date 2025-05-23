<div class="flex items-center gap-2 @if ($isAuthenticated) cursor-pointer @endif"
    @if ($isAuthenticated) wire:click="share" @endif>
    <i class="text-lg ti ti-share text-success dark:text-green-300"></i>
    {{ $sharesCount ?? 0 }}
</div>
