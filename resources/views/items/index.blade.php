<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Items') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <x-primary-button>
                <a href="{{ route('items.create') }}" class="btn btn-primary"> Add a Release </a>
            </x-primary-button>
            @forelse ($items as $item)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('items.show', $item) }}">{{ $item->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $item->category }}
                        {{ $item->description }}
                        @if ($item->item_image)
                            <img src="{{ $item->item_image }}" alt="{{ $item->title }}" width="100">
                        @else
                            No Image
                        @endif
                    </p>
                </div>
            @empty
                <p>No items</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
