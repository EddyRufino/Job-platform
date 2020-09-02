<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Candidate;
use Illuminate\Http\Request;
use App\Notifications\NewCandidate;
use App\Http\Requests\CandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el id de la vacante
        $vacancyID = $request->route('candidate');

        // Obtener los candidatos y vacantes
        $vacancy = Vacancy::findOrFail($vacancyID);

        $this->authoriza('view', $vacancy);

        // No sé si es pndjo o inteligente, pero el pata está obteniendo el ID de la vacante para poder acceder a la relación y poder listar todos los candidatos de acuerdo al ID de la vacante.
        // dd($vacancy->candidates);

        return view('candidates.index', compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {

        $candidate = new Candidate( $request->validated() );

        $candidate->cv = $request->file('cv')->store('cv', 'public');

        $candidate->save();

        $vacancy = Vacancy::find($request->get('vacancy_id'));
        $reclutador = $vacancy->user;
        $reclutador->notify( new NewCandidate($vacancy->name, $vacancy->id) );

        return back()->with('state', 'Hemos recibido tu CV.');
        
        // if ($request->file('cv')) {
        //     $file = $request->file('cv');
        //     $nameFile = time() . "." . $request->file('cv')->extension();
        //     $path = public_path('/storage/cv');
        //     $file->move($path, $nameFile);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
