@extends('layouts.app')

@section('content')
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <div class="row pt-4">
            <div class="col-12">
                <header class="d-flex justify-content-between px-3">
                    <a href="{{ route('admin.items.index') }}"
                        class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Cancel</a>
                    <h2 class="bg-dark text-light">
                        {{ __('Create Item') }}
                    </h2>
                    <h2 class="bg-dark text-light">
                        {{ __('Admin View') }}
                    </h2>
                </header>
            </div>

            <div class="col-3">
            </div>

            <div class="col-6 container-fluid">
                <form class="row" action="{{ route('admin.items.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group pt-2">
                        <x-text-input name="title" field="title" placeholder="Title" class="w-full"
                        :value="@old('title')"  />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-area-input name="description" field="description" placeholder="Description" class="w-full py-2"
                            :value="@old('description')" />
                    </div>

                    <div class="form-group pt-2">
                        <x-select-center field="trade Center" name="center_id" :centers="$centers" :selected="old('center_id')" />
                    </div>

                    <div class="form-group pt-2">
                        <label for="condition" class="fw-bold fs-5 pt-2 pb-1">Condition</label>
                        <x-radio-button name="condition" value="mint" label="Mint" />
                        <x-radio-button name="condition" value="near mint" label="Near Mint" />
                        <x-radio-button name="condition" value="very good" label="Very Good" />
                        <x-radio-button name="condition" value="good" label="Good" />
                        <x-radio-button name="condition" value="fair" label="Fair" />
                        <x-radio-button name="condition" value="poor" label="Poor" />
                        @error('condition')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <label for="category" class="fw-bold fs-5 pt-2 pb-1">Category</label>
                        <x-radio-button name="category" value="clothing" label="Clothing" />
                        <x-radio-button name="category" value="electronics" label="Electronics" />
                        <x-radio-button name="category" value="furniture" label="Furniture" />
                        <x-radio-button name="category" value="entertainment" label="Entertainment" />
                        <x-radio-button name="category" value="other" label="Other" />
                        @error('category')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <label for="availability" class="fw-bold fs-5 pt-2 pb-1">Availability</label>
                        <x-radio-button name="availability" value="ready to collect" label="Ready To Collect" />
                        <x-radio-button name="availability" value="en route to trade center" label="En Route To Trade Center" />
                        @error('availability')
                            <div class="text-red-600 text-sm invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group pt-2 pb-2">
                        <x-file-upload type="file" label="Item Image" name="item_image" field="item_image"
                            :value="@old('item_image')">
                        </x-file-upload>
                    </div>

                    <x-primary-button class="btn btn-light border-0 text-dark text-center text-uppercase fw-semibold px-5 py-3">
                        Save Item
                    </x-primary-button>

                </form>
            </div>

            <div class="col-3">
            </div>

        </div>
    </div>
@endsection
