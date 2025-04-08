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