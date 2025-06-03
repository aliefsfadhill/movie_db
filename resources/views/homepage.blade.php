@extends('layouts.template')

@section('title', 'Homepage')

@section('content')
    <h1>Latest Movie</h1>

    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-lg-6 mb-3">
                <div class="card" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($movie->cover_image) }}" class="card-img-left-fluid" style="max-width: 150px;" alt="Poster">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ Str::limit($movie->synopsis, 150) }}</p>
                                <p class="card-text text-body-secondary"> Year : {{ $movie->year }}</p>
                                <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
@endsection
