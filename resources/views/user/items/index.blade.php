@extends('layouts.app')

@section('content')

<div class="container-fluid bg-dark mt-5 px-5">
    <div class="row pt-4">
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
                            <p class="card-text my-1">
                                {{ $item->condition }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <p>No items</p>
        @endforelse
    </div>
</div>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
@endsection
