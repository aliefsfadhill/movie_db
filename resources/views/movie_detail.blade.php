@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
    <div class="card" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset($movie->cover_image) }}" 
                     class="img-fluid h-100" 
                     style="width: 150px; object-fit: cover;" 
                     alt="Poster">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ $movie->synopsis }}</p>
                    <p class="card-text">Actors: {{ $movie->actors }}</p>
                    <p class="card-text">Category: {{ $movie->category->category_name }}</p>
                    <p class="card-text text-body-secondary">Year: {{ $movie->year }}</p>
                    <a href="/" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
