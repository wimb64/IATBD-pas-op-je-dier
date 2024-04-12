<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($pets as $pet)
                @include('pets.show', ['pet' => $pet, 'showRespondButton' => true])
            @endforeach
        </div>
    </div>
</x-app-layout>
