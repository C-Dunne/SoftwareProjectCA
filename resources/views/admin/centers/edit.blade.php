@extends('layouts.app')

@section('content')
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <div class="row pt-4">
            <div class="col-12">
                <header class="d-flex justify-content-between px-3">
                    <a href="{{ route('admin.centers.show', $center) }}"
                        class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Cancel</a>
                    <h2 class="bg-dark text-light">
                        {{ __('Edit Trade Center') }}
                    </h2>
                    <h2 class="bg-dark text-light">
                        {{ __('Admin View') }}
                    </h2>
                </header>
            </div>

            <div class="col-3">
            </div>

            <div class="col-6 container-fluid">
                <form class="row" action="{{ route('admin.centers.update', $center) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group pt-2">
                        <x-text-input name="name" field="name" placeholder="Name" class="w-100" :value="@old('name', $center->name)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="email" field="email" placeholder="Email" :value="@old('email', $center->email)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="address" field="address" placeholder="Address" class="w-full"
                            :value="@old('address', $center->address)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="phone_number" field="phone_number" placeholder="Phone Number"
                            :value="@old('phone_number', $center->phone_number)" />
                    </div>

                    <div class="form-group pt-2">
                        <x-text-input name="open_hours" field="open_hours" placeholder="Open Hours" :value="@old('open_hours', $center->open_hours)" />
                    </div>

                    <div class="form-group pt-2 pb-2">
                        <x-file-upload type="file" label="Trade Center Image" name="center_image" field="center_image"
                            :value="@old('center_image', $center->center_image)">
                        </x-file-upload>
                    </div>

                    <x-primary-button
                        class="btn btn-light border-0 text-dark text-center text-uppercase fw-semibold px-5 py-3">Save
                        Updated Trade Center</x-primary-button>

                </form>
            </div>

            <div class="col-3">
            </div>

        </div>
    </div>
@endsection
