<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @include('livewire.includes.create-todo')

    {{-- search --}}
    @include('livewire.includes.search-todo')
    {{-- show the  --}}

    <div id="todos-list">
        @foreach ($todo as $to)
            @include('livewire.includes.show-todo')
        @endforeach

        <div class="my-2">
            <!-- Pagination goes here -->
            {{ $todo->links() }}
        </div>
    </div>
</div>
