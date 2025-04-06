<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoriesController extends Controller
{
    
    public function createType(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);

        $movie = Category::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.penal')->with('success', 'Type created successfully!');
    }
    public function update(Request $request, $id)
    {
    // Validate incoming data
        $validated = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);

        $categories = Category::findOrFail($id);
        $categories->update($validated);

        
        return redirect()->back()->with('success', 'Categories updated successfully.');
    }
    public function destroy($id)
{
    $type = Category::findOrFail($id);
    $type->delete();

    return redirect()->route('admin.penal')->with('success', 'Type deleted successfully!');
}
}

