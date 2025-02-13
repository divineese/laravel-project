<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::query();

        if ($request->has('location')) {
            $properties->where('location', 'like', '%' . $request->location . '%');
        }
        if ($request->has('min_price') && $request->has('max_price')) {
            $properties->whereBetween('price', [$request->min_price, $request->max_price]);
        }
        if ($request->has('type')) {
            $properties->where('type', $request->type);
        }

        return response()->json($properties->get());
    }

    public function store(Request $request)
    {
        $property = Property::create($request->all());
        return response()->json($property, 201);
    }

    public function show(Property $property)
    {
        return response()->json($property);
    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        return response()->json($property);
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }
}

