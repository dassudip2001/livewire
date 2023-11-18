<div>
    <form>
        <input wire:model="name" type="text" placeholder="name">
        @error('name')
            {{ $message }}
        @enderror
        <input wire:model="email" type="email" placeholder="email">
        @error('email')
            {{ $message }}
        @enderror
        <input wire:model="password" type="password" placeholder="password">
        @error('password')
            {{ $message }}
        @enderror

        <button wire:click.prevent="clickMe">submit</button>

    </form>
    @foreach ($user as $us)
        <h1>{{ $us->name }}</h1>
    @endforeach
</div>
