@extends('layouts.template')

@section('title', 'Edit Movie')

@section('content')
<div class="container mt-4">
    <h1>Edit Movie</h1>

    <form action="{{ route('movie.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $movie->title }}" required>
        </div>

        <div class="mb-3">
            <label for="synopsis">Sinopsis</label>
            <textarea class="form-control" name="synopsis" rows="4">{{ $movie->synopsis }}</textarea>
        </div>

        <div class="mb-3">
            <label for="year">Tahun</label>
            <input type="number" class="form-control" name="year" value="{{ $movie->year }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id">Kategori</label>
            <select class="form-select" name="category_id" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $movie->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="actors">Aktor</label>
            <input type="text" class="form-control" name="actors" value="{{ $movie->actors }}">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Masukkan Poster</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
