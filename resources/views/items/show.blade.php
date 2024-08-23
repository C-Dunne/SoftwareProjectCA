<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                {{ session('success') }}
            </div>

            <div>
                <a href="{{ route('items.index') }}">
                    < Back </a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <div class="mb-2">
                                <!-- Image centered in the table row -->
                                @if ($item->item_image)
                                    <div>
                                        <img src="{{ asset($item->item_image) }}" alt="{{ $item->title }}"
                                            width="270">
                                    </div>
                                @else
                                    No Image
                                @endif

                                <tr>
                                    <td class="font-bold attribute">Title</td>
                                    <td>{{ $item->title }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold attribute">Description</td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-bold attribute">condition</td>
                                    <td>
                                        {{ $item->condition }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-bold attribute">availability</td>
                                    <td>{{ $item->availability }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold attribute">Category</td>
                                    <td>{{ $item->category }}</td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <x-primary-button class="mr-14">
                        <a href="{{ route('items.edit', $item) }}">Edit</a>
                    </x-primary-button>

                    <form action="{{ route('items.destroy', $item) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button onclick="return confirm ('Are you sure you want to delete this item?')">
                            Delete
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
