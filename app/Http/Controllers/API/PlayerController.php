<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller{
    
    public function index(Request $request){
        // all player order by score los 3 mejores
        // return Player::orderBy('score', 'desc')->take(5)->get();
        $difficulty = $request->query('difficulty');
        $quantity = $request->query('quantity', 10); // Valor por defecto de 10

        return Player::when($difficulty, function ($query, $difficulty) {
                            return $query->where('difficulty', $difficulty);
                        })
                        ->limit($quantity)
                        ->get();

        //  response()->json($players);
    }

    
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'score' => 'required|numeric',
            'time' => 'required',
            'difficulty' => 'required',
            'country' => 'nullable',
            'city' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'country_flag' => 'nullable',

        ]);
    
        $player = Player::create($validatedData);
    
        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
