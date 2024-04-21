<div class="p-6 flex space-x-2">

    <div class="flex-1">
        <div class="flex items-center">
            <div>
                <span class="text-xl"> <strong>{{ $pet->name }}</strong>, {{ $pet->type }}</span>
                <span>
                    <x-pet-picture :pet="$pet"/>
                </span>
            </div>

        </div>
        <div class="mt-4">
            @if($pet->user->is(auth()->user()))
                <p><strong> You own this pet </strong></p>
            @endif
            @if($pet->breed)
                <p><strong>breed:</strong> {{ $pet->breed }}</p>
            @endif
            @if($pet->age)
                <p><strong>age:</strong> {{ $pet->age }}</p>
            @endif
        </div>
        @if($pet->user->is(auth()->user()))
            <div class="grid md:grid-cols-2 gap-2 py-6">
                <a href=" {{route('pets.edit', $pet)}}">
                    <x-primary-button>
                        {{ __('edit') }}
                    </x-primary-button>
                </a>
                <form method="post" action="{{ route('pets.destroy', $pet) }}">
                    @csrf
                    @method('delete')
                    <x-danger-button :href="route('pets.destroy', $pet)"
                                     onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('delete') }}
                    </x-danger-button>
                </form>

            </div>
        @endif
    </div>
</div>
