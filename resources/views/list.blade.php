@extends('layouts.template')

@section('title', 'Daftar Movie')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Movie</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Aktor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $index => $movie)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->category->category_name ?? '-' }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->actors }}</td>
                <td>
                    <!-- Tombol Detail redirect ke halaman movie_detail -->
                    <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => Str::slug($movie->title)]) }}" class="btn btn-info btn-sm">Detail</a>

                    <!-- Tombol Edit -->
                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
