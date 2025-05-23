<!-- resources/views/components/avatar.blade.php -->
@props([
    'avatar' => null,
    'name' => 'User',
    'width' => 10,  // Default width class
    'height' => 10  // Default height class
])

<img src="{{ $avatar ? Storage::url($avatar) : asset('assets/images/profile/user-1.jpg') }}"
     class="rounded-full w-{{ $width }} h-{{ $height }}"
     alt="{{ $name }}" />
