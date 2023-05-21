<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bateria;
use App\Models\Surfista;

class BateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bateria = Bateria::all();

        return response()->json(['baterias' => $bateria], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'surfista' => 'required|exists:surfista,numero',
        ]);

        $surfistaId = $request->input('surfista');

        $surfista = Surfista::where('numero', $surfistaId)->first();
        if (!$surfista) {
            return response()->json(['message' => 'Surfista não encontrado.'], 404);
        }

        $bateria = new Bateria();
        $bateria->surfista = $surfista->numero;
        $bateria->save();

        return response()->json(['message' => 'Bateria criada com sucesso.'], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


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
        $request->validate([
            'surfista' => 'required|exists:surfista,numero',
        ]);

        $surfistaId = $request->input('surfista');

        $surfista = Surfista::where('numero', $surfistaId)->first();
        if (!$surfista) {
            return response()->json(['message' => 'Surfista não encontrado.'], 404);
        }

        $bateria = new Bateria();
        $bateria->surfista = $surfista->numero;
        $bateria->save();

        return response()->json(['message' => 'Bateria criada com sucesso.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bateria = Bateria::findOrFail($id);
        $bateria->delete();

        return response()->json(['message' => 'Bateria excluída com sucesso.'], 200);
    }
}
