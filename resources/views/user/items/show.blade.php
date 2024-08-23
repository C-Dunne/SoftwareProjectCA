@extends('layouts.app')

@section('content')
<x-alert-success>
    {{ session('success') }}
</x-alert-success>
    <div class="container-fluid bg-dark text-light mt-5 px-5">
        <a href="{{ route('user.items.index') }}" class="btn btn-light text-center text-uppercase fw-semibold px-5 py-3">Back</a>
        <div class="row pt-4">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 pb-5">
                            <h1 class="display-5 fw-bolder text-capitalize"> {{ $item->title }}
                            </h1>
                        </div>

                        <div class="col-3">
                            <h5>Category:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $item->category }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Description:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $item->description }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Condition:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $item->condition }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Availability:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $item->availability }}</p>
                        </div>

                        <div class="col-3">
                            <h5>Trade Center:</h5>
                        </div>
                        <div class="col-9">
                            <p class="text-capitalize">{{ $item->center->name }}</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                @if ($item->item_image)
                    <img class="img card-img-top"src="{{ asset($item->item_image) }}" alt="{{ $item->title }}">
                @else
                    No Image
                @endif
            </div>
        </div>
    </div>
@endsection
