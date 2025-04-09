<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\aniversariante;
use App\Http\Requests\DayAndMonthRequest;
use App\Http\Requests\AniversarianteRequest;
use App\Models\Empresa;

class AniversarianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return aniversariante::all();
        return Aniversariante::with('empresa')->get();
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
    public function store(AniversarianteRequest $request)
    {
        $input = $request->validated();

        return Aniversariante::create($input);
    }
  /**
     * Display the specified resource.
     */
    public function show(Aniversariante $aniversariante)
    {
        return $aniversariante;

        // $aniversariante = Aniversariante::find($aniversariante);

        // if (!$aniversariante) {
        //     return response()->json(['message' => 'Aniversariante not found'], 404);
        // }

        // return response($aniversariante);
    }
    /**




     * Show the form for editing the specified resource.
     */
    public function edit(Aniversariante $aniversariante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AniversarianteRequest $request, string $id)
    {
        $input = $request->validated();
        $aniversariante = Aniversariante::find($id);
        if (!$aniversariante) {
            return response()->json(['error' => 'Aniversariante não encontrado'], 404);
        }
        $aniversariante->update($input);

        return response()->json(['message' => 'Aniversariante atualizado com sucesso', 'aniversariante' => $aniversariante]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aniversariante $aniversariante, string $id)
    {
        $niver = Aniversariante::find($id);
        if (!$niver) {
            return response()->json(['error' => 'Usuario não encontrado'], 404);
        }
        $niver->delete();

        return response(['message' => 'Usuario deletado com sucesso']);
    }
    public function dayAndMonth(DayAndMonthRequest $request)
    {
        // Obtém os valores validados ou define valores padrão
        $mes = $request->input('mes', Carbon::today()->format('m'));
        $dia = $request->input('dia');

        $query = Aniversariante::with('empresa');

        // Aplica os filtros dinamicamente
        if ($dia) {
            $query->whereRaw("TO_CHAR(data_nascimento, 'MM-DD') = ?", [sprintf('%02d-%02d', $mes, $dia)]);
        } else {
            $query->whereRaw("TO_CHAR(data_nascimento, 'MM') = ?", [$mes]);
        }

        return response()->json($query->get());

}
    public function test()
    {
        // $a = aniversariante::where('id_empresa', 1)
        // ->with('empresa')
        // ->orderBy('nome')
        // ->take(3)
        // ->get(['nome', 'data_nascimento', 'email', 'id_empresa']);
        // return response($a);
        $a = Aniversariante::find(4);


        return response()->json($a->nome);
    }
    public function niverMes()
    {
        $users = aniversariante::paginate();
        return view('aniversariantes', compact('users'));
    }
}
