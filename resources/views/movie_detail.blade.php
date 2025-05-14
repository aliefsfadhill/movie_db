@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $movie->cover_image }}" class="card-img-left-fluid" style="max-width: 150px;" alt="Poster">
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
    </div>