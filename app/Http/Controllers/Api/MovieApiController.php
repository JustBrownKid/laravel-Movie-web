<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\helper;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return response()->json([
            'success' => true,
            'data' => $movies,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'runtime' => 'nullable|string',
            'release_year' => 'nullable|string',
            'watch' => 'nullable|string',
        ]);
        

        $movie = Movie::create([
            'title' => $validated['title'],
            'image' => $validated['image'],
            'runtime' => $validated['runtime'],
            'description' => $validated['description'],
            'release_year' => $validated['release_year'],
            'watch' => $validated['watch'],
        ]);
        $movie->actors()->attach($request->actors);
        $movie->categories()->attach($request->categories);
        return response()->json([
            'status' => true,
            'data' => $movie
        ]);
    }
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'status' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'runtime' => 'nullable|string',
            'release_year' => 'nullable|string',
            'watch' => 'nullable|string',
        ]);

        $movie->update($validated);
        $movie->actors()->attach($request->actors);
        $movie->categories()->attach($request->categories);
        return response()->json([
            'status' => true,
            'data' => $movie
        ]);
    }
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'status' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        $movie->delete();

        return response()->json([
            'status' => true,
            'message' => 'Movie deleted successfully'
        ]);
    }
    public function show($id)
    {
        $movie = Movie::with(['actors', 'categories'])->find($id);

        if (!$movie) {
            return response()->json([
                'status' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $movie
        ]);
    }
}