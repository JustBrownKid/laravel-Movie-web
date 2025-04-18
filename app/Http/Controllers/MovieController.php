<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function create()
    {
        return view('movies.create');
    }

    public function index()
    {
        $data = Movie::all();
        return view('Dashboard', compact('data'));
    }

    public function admin()
    {
        $data = Movie::count();
        $movie = Movie::all();
        $user = User::count();
        $userList = User::all();
        $admin = User::where('role', '=', 'admin')->count();
        $superAdmin = User::where('role', '=', 'superAdmin')->count();
        $castData = Actor::all();
        $actor = Actor::count();
        $category = Category::count();
        $categoryData = Category::all();

        return view('adminDashboard', compact(
            'data',
            'user',
            'movie',
            'actor',
            'category',
            'castData',
            'categoryData',
            'admin',
            'superAdmin',
            'userList'
        ));
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
            'actors' => 'array|required',
            'categories' => 'array|required',
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

        return redirect()->route('admin.penal')->with('success', 'Movie created successfully!');
    }

    public function show($id)
    {
        $data = Movie::with(['actors', 'categories'])->findOrFail($id);
        return view('movieDetail', compact('data'));
    }

    public function adminDetail($id)
    {
        $data = Movie::findOrFail($id);
        return view('adminDetail', compact('data'));
    }

    public function play($id)
    {
        $data = Movie::findOrFail($id);
        return view('player', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'description' => 'nullable|string',
            'watch' => 'nullable|string',
            'runtime' => 'nullable|string',
            'release_year' => 'nullable|string',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->update([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
            'watch' => $request->watch,
            'runtime' => $request->runtime,
            'release_year' => $request->release_year,
        ]);
        $movie->actors()->attach($request->actors);
        $movie->categories()->attach($request->categories);
        return redirect()->back()->with('success', 'Movie updated successfully!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->back()->with('success', 'Movie deleted successfully!');
    }


}
