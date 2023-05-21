<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onda;
use App\Models\Nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::all();

        return response()->json(['notas' => $notas], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'onda' => 'required|exists:onda,id',
            'nota1' => 'required|numeric',
            'nota2' => 'required|numeric',
            'nota3' => 'required|numeric',
        ]);

        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');

        $total = ($nota1 + $nota2 + $nota3) / 3;

        $nota = new Nota();
        $nota->onda = $request->input('onda');
        $nota->nota1 = $nota1;
        $nota->nota2 = $nota2;
        $nota->nota3 = $nota3;
        $nota->total = $total;
        $nota->save();

        return response()->json(['message' => 'Nota criada com sucesso.'], 200);
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
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota não encontrada.'], 404);
        }

        return response()->json(['nota' => $nota], 200);
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
            'nota1' => 'numeric',
            'nota2' => 'numeric',
            'nota3' => 'numeric',
        ]);

        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota não encontrada.'], 404);
        }

        if ($request->has('nota1')) {
            $nota->nota1 = $request->input('nota1');
        }

        if ($request->has('nota2')) {
            $nota->nota2 = $request->input('nota2');
        }

        if ($request->has('nota3')) {
            $nota->nota3 = $request->input('nota3');
        }

        $nota->total = ($nota->nota1 + $nota->nota2 + $nota->nota3) / 3;
        $nota->save();

        return response()->json(['message' => 'Nota atualizada com sucesso.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota não encontrada.'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota removida com sucesso.'], 200);
    }
}
