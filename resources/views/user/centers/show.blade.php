@extends('layouts.app')

@section('content')
<x-alert-success>
    {{ session('success') }}
</x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <a href="{{ route('user.centers.index') }}" class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Back</a>
        <div class="row pt-4">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 pb-5">
                            <h1 class="display-5 fw-bolder text-capitalize"> {{ $center->name }}
                            </h1>
                        </div>

                        <div class="col-3">
                            <h5>Email:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $center->email }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Phone Number:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $center->phone_number }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Address:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $center->address }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Opening Hours:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $center->open_hours }}</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                @if ($center->center_image)
                    <img class="img card-img-top"src="{{ asset($center->center_image) }}" alt="{{ $center->name }}">
                @else
                    No Image
                @endif
            </div>
        </div>
    </div>
@endsection
