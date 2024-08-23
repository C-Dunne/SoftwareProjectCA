@extends('layouts.app')

@section('content')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="container-fluid pt-5 bg-dark">
    <div class="row bg-dark text-light pt-5 px-5">
        <div class=" col-4 shadow rounded">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class=" col-4 shadow rounded">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class=" col-4 shadow rounded">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

