<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onda;
use App\Models\Bateria;
use App\Models\Surfista;

class OndaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ondas = Onda::all();

        return response()->json(['ondas' => $ondas], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'surfista' => 'required|exists:surfista,numero',
            'bateria' => 'required|exists:bateria,id',
        ]);

        $surfistaId = $request->input('surfista');
        $bateriaId = $request->input('bateria');

        $surfista = Surfista::find($surfistaId);
        if (!$surfista) {
            return response()->json(['message' => 'Surfista não encontrado.'], 404);
        }

        $bateria = Bateria::find($bateriaId);
        if (!$bateria) {
            return response()->json(['message' => 'Bateria não encontrada.'], 404);
        }


        $ondaExistente = Onda::where('surfista', $surfistaId)
                            ->where('bateria', $bateriaId)
                            ->first();
        if ($ondaExistente) {
            return response()->json(['message' => 'Essa combinação de surfista e bateria já existe.'], 400);
        }

        $onda = new Onda();
        $onda->surfista = $surfistaId;
        $onda->bateria = $bateriaId;
        $onda->save();

        return response()->json(['message' => 'Onda criada com sucesso.'], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $onda = Onda::findOrFail($id);

        return response()->json(['onda' => $onda], 200);
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
            'bateria' => 'required|exists:bateria,id',
        ]);

        $onda = Onda::findOrFail($id);
        $onda->surfista = $request->input('surfista');
        $onda->bateria = $request->input('bateria');
        $onda->save();

        return response()->json(['message' => 'Onda atualizada com sucesso.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $onda = Onda::findOrFail($id);
        $onda->delete();

        return response()->json(['message' => 'Onda excluída com sucesso.'], 200);
    }
}
