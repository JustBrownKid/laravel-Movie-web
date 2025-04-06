<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CastController extends Controller
{
    public function createActor(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('actors', 'name')],
            'image' => 'nullable|string',
        ]);
    
        Actor::create([
            'name' => $validated['name'],
            'image' => $validated['image'] ?? null,
        ]);
    

        return redirect()->route('admin.penal')->with('success', 'Cast created successfully!');
    }
    public function update(Request $request, $id)
    {
    // Validate incoming data
        $validated = $request->validate([
            'name' => ['required', Rule::unique('actors', 'name')],
            'image' => 'nullable|url|max:500',
        ]);

        $cast = Actor::findOrFail($id);
        $cast->update($validated);

        
        return redirect()->back()->with('success', 'Cast updated successfully.');
    }
    public function destroy($id)
{
    $cast = Actor::findOrFail($id);
    $cast->delete();

    return redirect()->back()->with('success', 'Cast deleted successfully.');
}


}
