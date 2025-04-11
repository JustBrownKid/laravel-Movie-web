<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CastApiController extends Controller
{
    //
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
        return response()->json([
            'status' => true,
            'message' => 'Cast created successfully!'
        ]);
    }
}
