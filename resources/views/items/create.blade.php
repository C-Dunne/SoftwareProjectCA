<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')">
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="condition"
                        field="condition"
                        placeholder="condition..."
                        class="w-full mt-6"
                        :value="@old('condition')">
                    </x-text-input>

                    <x-text-area-input
                        name="description"
                        rows="5"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')">
                    </x-text-area-input>

                    <x-text-input
                        type="text"
                        name="availability"
                        field="availability"
                        placeholder="availability..."
                        class="w-full mt-6"
                        :value="@old('availability')">
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="category"
                        field="category"
                        placeholder="category..."
                        class="w-full mt-6"
                        :value="@old('category')">
                    </x-text-input>
                  
                    <x-file-upload 
                    type="file" 
                    label="Item Image" 
                    name="item_image" 
                    field="item_image"
                    value="@old('item_image')">
                    </x-file-upload>

                    <x-primary-button class="mt-6">Save Item</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>