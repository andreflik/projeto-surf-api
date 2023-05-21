<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surfista;

class SurfistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surfista = Surfista::all();

        return response()->json(['surfistas' => $surfista], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $surfista = new Surfista;

        $surfista->numero = $request->input('numero');
        $surfista->nome = $request->input('nome');
        $surfista->pais = $request->input('pais');


        $surfista->save();

        return response()->json(['message' => 'Cadastro criado com sucesso']);
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
    public function update(Request $request, $numero)
{
    $surfista = Surfista::where('numero', $numero)->first();


    if (!$surfista) {
        return response()->json(['message' => 'Surfista não encontrado'], 404);
    }

    $surfista->nome = $request->input('nome');
    $surfista->pais = $request->input('pais');

    $surfista->save();

    return response()->json(['message' => 'Informações do surfista atualizadas com sucesso']);
}

    /**
     * Remove the specified resource from storage.
     */
    public function delete($numero)
    {
        $surfista = Surfista::where('numero', $numero)->first();

        if (!$surfista) {
            return response()->json(['message' => 'Surfista não encontrado'], 404);
        }

        $surfista->delete();

        return response()->json(['message' => 'Surfista excluído com sucesso']);
    }
}
