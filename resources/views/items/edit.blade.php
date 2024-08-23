<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- call the update function --}}
                <form action="{{ route('items.update', $item) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group pt-2">
                        <x-text-input name="title" field="title" placeholder="Title" class="w-full"
                            :value="@old('title', $item->title)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-area-input name="description" field="description" placeholder="Description"
                        :value="@old('description', $item->description)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="condition" field="condition" placeholder="Condition" class="w-full"
                            :value="@old('condition', $item->condition)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="category" field="category" placeholder="Category"
                            :value="@old('category', $item->category)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="availability" field="availability" placeholder="Availability"
                            :value="@old('availability', $item->availability)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-file-upload type="file" label="Item Image" name="item_image" field="item_image"
                            :value="@old('item_image', $item->item_image)">
                        </x-file-upload>
                    </div>

                    <x-primary-button class="mt-6">Save Updated Item</x-primary-button>
                </form>

                <x-primary-button class="mt-6">
                    <a href="{{ route('items.show', $item) }}">Cancel Edit</a></x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
