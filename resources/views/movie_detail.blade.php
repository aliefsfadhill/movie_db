@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
    <div class="card" style="max-width: 800px; display: flex;">
        <div class="row g-0 w-100">
            <div class="col-md-4">
                <div style="height: 100%; width: 100%;">
                    <img src="{{ asset($movie->cover_image) }}"
                         style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                         alt="Poster">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body h-100 d-flex flex-column justify-content-center">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ $movie->synopsis }}</p>
                    <p class="card-text">Actors: {{ $movie->actors }}</p>
                    <p class="card-text">Category: {{ $movie->category->category_name }}</p>
                    <p class="card-text text-body-secondary">Year: {{ $movie->year }}</p>
                    <a href="/" class="btn btn-success mt-3 align-self-start">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
