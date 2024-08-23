@extends('layouts.app')

@section('content')

<div class="container-fluid bg-dark mt-5 px-5">
    <header class="d-flex justify-content-between px-3">
        <h2 class="bg-dark text-light">
            {{ __('All Trade Centers') }}
        </h2>
        <h2 class="bg-dark text-light">
            {{ __('Admin View') }}
        </h2>
    </header>
    <div class="row pt-4">
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
        <a href="{{ route('admin.centers.create') }}" class="btn btn-light mb-3"> Add a Trade Center </a>
        @forelse ($centers as $center)
            <div class="col-md-3 card-col py-3">
                <div class="card bg-dark text-light border-0 align-items-center">
                    <a href="{{ route('admin.centers.show', $center) }}" class="card-link rounded text-light bg-dark text-decoration-none">
                        @if ($center->center_image)
                            <img class="card-image rounded-top" src="{{ asset($center->center_image) }}" alt="{{ $center->name }}">
                        @else
                            No Image
                        @endif
                        <div class="card-body text-center text-capitalize">
                            <h3 class="card-title my-2">
                                {{ $center->name }}
                            </h3>
                            <p class="card-text my-1">
                                {{ $center->address }}
                            </p>
                            <p class="card-text my-1">
                                {{ $center->email }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <p>No trade centers</p>
        @endforelse
    </div>
    <div class="pagination">
        {{ $centers->links() }}
    </div>
</div>
@endsection
