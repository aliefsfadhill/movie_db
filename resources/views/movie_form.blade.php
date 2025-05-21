@extends('layouts.template')

@section('title', 'Tambah Movie')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Movie Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Movie</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul film" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="4" placeholder="Masukkan sinopsis film" required>{{ old('synopsis') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option selected disabled>Pilih kategori...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun Rilis</label>
            <input type="number" class="form-control" id="year" name="year" min="1900" max="{{ date('Y') }}" placeholder="Masukkan tahun rilis" value="{{ old('year') }}" required>
        </div>

        <div class="mb-3">
            <label for="actors" class="form-label">Aktor</label>
            <input type="text" class="form-control" id="actors" name="actors" placeholder="Masukkan nama aktor" value="{{ old('actors') }}" required>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Masukkan Poster</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
