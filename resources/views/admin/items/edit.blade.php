{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg"> --}}
                {{-- call the update function --}}
{{-- <form action="{{ route('admin.items.update', $item) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <x-text-input type="text" name="title" field="title" placeholder="Title" class="w-full py-2" autocomplete="off"
        :value="@old('title', $item->title)">
    </x-text-input>

    <div class="form-group pt-2">
        <x-text-area-input name="description" field="description" placeholder="Description" class="w-full py-2"
            :value="@old('description', $item->description)" />
    </div>

    <div class="form-group pt-2">
        <label for="center"> <strong class="mr-10"> Trade Center </strong></label>
        <x-select-center field="center" name="center_id" :centers="$centers" :selected="old('center_id', $item->center_id)" />
    </div>

    <div class="form-group pt-2">
        <label for="condition"> <strong> Condition </strong> </label>
        <x-radio-button name="condition" value="mint" label="Mint" :checked="$item->condition === 'mint'" />
        <x-radio-button name="condition" value="near mint" label="Near Mint" :checked="$item->condition === 'near mint'" />
        <x-radio-button name="condition" value="very good" label="Very Good" :checked="$item->condition === 'very good'" />
        <x-radio-button name="condition" value="good" label="Good" :checked="$item->condition === 'good'" />
        <x-radio-button name="condition" value="fair" label="Fair" :checked="$item->category === 'fair'" />
        <x-radio-button name="condition" value="poor" label="Poor" :checked="$item->category === 'poor'" />
        @error('condition')
            <div class="text-red-600 text-sm invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group pt-2">
        <label for="category"> <strong> Category </strong> </label>
        <x-radio-button name="category" value="clothing" label="Clothing" :checked="$item->category === 'clothing'" />
        <x-radio-button name="category" value="electronics" label="Electronics" :checked="$item->category === 'electronics'" />
        <x-radio-button name="category" value="furniture" label="Furniture" :checked="$item->category === 'furniture'" />
        <x-radio-button name="category" value="entertainment" label="Entertainment" :checked="$item->category === 'entertainment'" />
        <x-radio-button name="category" value="other" label="Other" :checked="$item->category === 'other'" />
        @error('category')
            <div class="text-red-600 text-sm invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group pt-2">
        <label for="availability"> <strong> Availability </strong> </label>
        <x-radio-button name="availability" value="ready to collect" label="Ready To Collect" :checked="$item->availability === 'ready to collect'" />
        <x-radio-button name="availability" value="en route to trade center" label="En Route To Trade Center"
            :checked="$item->availability === 'en route to trade center'" />
        @error('availability')
            <div class="text-red-600 text-sm invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group pt-2">
        <x-file-upload type="file" label="item Image" name="item_image" field="item_image" :value="@old('item_image', $item->item_image)">
        </x-file-upload>
    </div>

    <x-primary-button class="mt-6">Save Updated Item</x-primary-button>
</form>
<x-primary-button class="mt-6">
    <a href="{{ route('admin.items.show', $item) }}">Cancel Edit</a></x-primary-button>
</div>
</div>
</div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <div class="row pt-4">
            <div class="col-12">
                <header class="d-flex justify-content-between px-3">
                    <a href="{{ route('admin.items.show', $item) }}"
                        class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Cancel</a>
                    <h2 class="bg-dark text-light">
                        {{ __('Edit Item') }}
                    </h2>
                    <h2 class="bg-dark text-light">
                        {{ __('Admin View') }}
                    </h2>
                </header>
            </div>

            <div class="col-3">
            </div>

            <div class="col-6 container-fluid">
                <form class="row" action="{{ route('admin.items.update', $item) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group pt-2">
                        <x-text-input name="title" field="title" placeholder="Title" class="w-full"
                            :value="@old('name', $item->title)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-area-input name="description" field="description" placeholder="Description" class="w-full py-2"
                            :value="@old('description', $item->description)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-select-center field="trade Center" name="center_id" :centers="$centers" :selected="old('center_id', $item->center_id)" />
                    </div>

                    <div class="form-group pt-2">
                        <label for="condition" class="fw-bold fs-5 pt-2 pb-1">Condition</label>
                        <x-radio-button name="condition" value="mint" label="Mint" :checked="$item->condition === 'mint'" />
                        <x-radio-button name="condition" value="near mint" label="Near Mint" :checked="$item->condition === 'near mint'" />
                        <x-radio-button name="condition" value="very good" label="Very Good" :checked="$item->condition === 'very good'" />
                        <x-radio-button name="condition" value="good" label="Good" :checked="$item->condition === 'good'" />
                        <x-radio-button name="condition" value="fair" label="Fair" :checked="$item->condition === 'fair'" />
                        <x-radio-button name="condition" value="poor" label="Poor" :checked="$item->condition === 'poor'" />
                        @error('condition')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <label for="category" class="fw-bold fs-5 pt-2 pb-1">Category</label>
                        <x-radio-button name="category" value="clothing" label="Clothing" :checked="$item->category === 'clothing'" />
                        <x-radio-button name="category" value="electronics" label="Electronics" :checked="$item->category === 'electronics'" />
                        <x-radio-button name="category" value="furniture" label="Furniture" :checked="$item->category === 'furniture'" />
                        <x-radio-button name="category" value="entertainment" label="Entertainment" :checked="$item->category === 'entertainment'" />
                        <x-radio-button name="category" value="other" label="Other" :checked="$item->category === 'other'" />
                        @error('category')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <label for="availability" class="fw-bold fs-5 pt-2 pb-1">Availability</label>
                        <x-radio-button name="availability" value="ready to collect" label="Ready To Collect" :checked="$item->availability === 'ready to collect'" />
                        <x-radio-button name="availability" value="en route to trade center" label="En Route To Trade Center"
                            :checked="$item->availability === 'en route to trade center'" />
                        @error('availability')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2 pb-2">
                        <x-file-upload type="file" label="Item Image" name="item_image" field="item_image"
                            :value="@old('item_image', $item->item_image)">
                        </x-file-upload>
                    </div>

                    <x-primary-button
                        class="btn btn-light border-0 text-dark text-center text-uppercase fw-semibold px-5 py-3">Save
                        Updated Item
                    </x-primary-button>

                </form>
            </div>

            <div class="col-3">
            </div>

        </div>
    </div>
@endsection
