@extends('layouts.app')

@section('content')
<x-alert-success>
    {{ session('success') }}
</x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <header class="d-flex justify-content-between align-items-center px-3">
            <a href="{{ route('user.centers.index') }}" class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Back</a>
            <h2 class="bg-dark text-light">
                {{ __('User View') }}
            </h2>
        </header>
        <div class="row pt-4">
            <div class="col-md-6 d-flex align-items-center">
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
            <div class="col-md-6 d-flex align-items-center">
                @if ($center->center_image)
                    <img class="img card-img-top"src="{{ asset($center->center_image) }}" alt="{{ $center->name }}">
                @else
                    No Image
                @endif
            </div>

            <div>
                <h1>Items in the <span class="text-capitalize">{{ $center->name }} </span> Trade Center</h1>
            </div>

            @forelse ($items as $item)
                <div class="col-md-3 card-col py-3">
                    <div class="card bg-dark text-light border-0 align-items-center">
                        <a href="{{ route('user.items.show', $item) }}" class="card-link rounded text-light bg-dark text-decoration-none">
                            @if ($item->item_image)
                                <img class="card-image rounded-top" src="{{ asset($item->item_image) }}" alt="{{ $item->title }}">
                            @else
                                No Image
                            @endif
                            <div class="card-body text-center text-capitalize">
                                <h3 class="card-title my-2">
                                    {{ $item->title }}
                                </h3>
                                <p class="card-text my-1">
                                    {{ $item->category }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <p>No items in this trade center</p>
            @endforelse
        </div>
    </div>
@endsection
