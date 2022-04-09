<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabilidadRequest;
use App\Models\Habilidad;
use App\Models\Habilidade;
use Illuminate\Http\Request;

/**
 * Class HabilidadeController
 * @package App\Http\Controllers
 */
class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Catalogos.habilidad.index', [
            'habilidades' => Habilidad::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Catalogos.habilidad.create', [
            'habilidad' => new Habilidad(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilidadRequest $request)
    {
        Habilidad::create($request->all());
        return redirect()->route('habilidades.index')
            ->with('success', 'agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidad $habilidade)
    {
        return view('Catalogos.habilidad.show', [
            'habilidad' => $habilidade,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Habilidad $habilidade)
    {
        return view('Catalogos.habilidad.edit', [
            'habilidad' => $habilidade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habilidade $habilidade
     * @return \Illuminate\Http\Response
     */
    public function update(HabilidadRequest $request, Habilidad $habilidade)
    {
        $habilidade->update($request->all());
        return redirect()->route('habilidades.index')
            ->with('success', 'El registro fue modificado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Habilidad $habilidade)
    {
        $habilidade->delete();
        return back()->with('success', 'El registro fue eliminado con exito.');
    }
}
