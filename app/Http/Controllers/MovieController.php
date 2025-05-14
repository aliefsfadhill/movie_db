<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Tambahkan ini untuk mengimpor model Movie

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies')); // Perbaiki cara penulisan compact
    }

    public function detail_movie($id, $slug)
    {
        $movie = Movie::find($id);
        return view('movie_detail', compact('movie'));
    }
}

