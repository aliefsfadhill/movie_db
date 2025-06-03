<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        return view('homepage', compact('movies'));
    }

    public function detail_movie($id, $slug)
{
$movie = Movie::with('category')->findOrFail($id);
return view('movie_detail', compact('movie'));
}

    public function create()
{
    $categories = Category::all();
    $movies = Movie::with('category')->latest()->get();

    return view('movie_form', compact('categories', 'movies'));
}

public function list()
{
    $movies = Movie::with('category')->get();
    return view('list', compact('movies'));
}

// Edit form
public function edit($id)
{
    $movie = Movie::findOrFail($id);
    $categories = Category::all();
    return view('movie_edit', compact('movie', 'categories'));
}

// Update movie
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'synopsis' => 'required',
        'year' => 'required|numeric',
        'actors' => 'required',
        'category_id' => 'required'
    ]);

    $movie = Movie::findOrFail($id);
    $movie->update($request->all());

    return redirect('/')->with('success', 'Data movie berhasil diperbarui.');
}



// Delete movie
public function destroy($id)
{
    $movie = Movie::findOrFail($id);
    $movie->delete();

    return redirect('/')->with('success', 'Data movie berhasil dihapus.');
}





    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id',
            'actors' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/covers'), $filename);
            $validated['cover_image'] = 'uploads/covers/' . $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        Movie::create($validated);

        return redirect('/')->with('success', 'Movie berhasil ditambahkan!');
    }
}
