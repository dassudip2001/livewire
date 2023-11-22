@php
    $user = Auth::user();
@endphp

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- show the login user  --}}
    <h1>Name: {{ $user->name }}</h1>
    <h2>Email: {{ $user->email }}</h2>
    <h3>Login As: {{ $user->role }}</h3>
</div>
