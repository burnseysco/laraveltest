<?php

namespace App\Http\Controllers;
use App\Models\Chirp;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with("user")->latest()->take(50)->get();  

        return view("home", ['chirps'=> $chirps]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message'=> 'required',
            ],[
                'message.required' =>'Please write something to chirp!',
                'message.max' => 'Chirps must be 225 chars or less.',
            ]);
        Chirp::create([
        'message' => $validated['message'],
        'user_id' => null, // We'll add authentication in lesson 11
        ]);

        return redirect()->route('home')->with('success','New chirp added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
