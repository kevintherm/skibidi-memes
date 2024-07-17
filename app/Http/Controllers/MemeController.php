<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemeController extends Controller
{
    public function create()
    {
        return view('memes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|image',
            'desc' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['img'] = $request->file('img')->store('public/memes');
        $validated['slug'] = str()->random(10) . time();

        $meme = Meme::create($validated);

        return redirect()->route('home')->with('success', 'Meme anda telah dibuat!');
    }
}
