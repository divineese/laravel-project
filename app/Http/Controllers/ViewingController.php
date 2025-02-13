<?php

namespace App\Http\Controllers;

use App\Models\Viewing;
use Illuminate\Http\Request;

class ViewingController extends Controller
{
    public function schedule(Request $request)
    {
        $viewing = Viewing::create([
            'property_id' => $request->property_id,
            'user_id' => $request->user_id,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return response()->json($viewing, 201);
    }

    public function show(Viewing $viewing)
    {
        return response()->json($viewing);
    }

    public function cancel(Viewing $viewing)
    {
        $viewing->delete();
        return response()->json(['message' => 'Viewing canceled successfully']);
    }
}

