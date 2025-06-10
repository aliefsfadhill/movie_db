@extends('layouts.template')

@section('title', 'Search Result')

@section('content')
    <h2>Hasil pencarian untuk: <em>{{ $keyword }}</em></h2>

    @if($movies->isEmpty())
        <div class="alert alert-warning">Tidak ada hasil ditemukan.</div>
    @else
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @if($movie->cover_image)
                            <img src="{{ asset('storage/'.$movie->cover_image) }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
