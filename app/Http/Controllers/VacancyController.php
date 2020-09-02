<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Vacancy;
use App\Category;
use App\Location;
use App\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\VacancyRequest;

class VacancyController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
    }

    public function index()
    {
        $vacancies = Vacancy::where('user_id', auth()->id())->simplePaginate();
        return view('vacancies.index', compact('vacancies'));
    }

    // public function create()
    // {
    //     return view('vacancies.create', [
    //         'categories' => Category::all(),
    //         'experiences' => Experience::all(),
    //         'locations' => Location::all(),
    //         'salaries' => Salary::all(),
    //     ]);
    // }

    public function store(Request $request)
    {
        $this->validate($request, [ 'name' => 'required|min:8' ]);

        // $vacancy = Vacancy::create($request->all());
        $vacancy = auth()->user()->vacancies()->create([
            'name'    => $request->name,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('vacancies.edit', compact('vacancy'));
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', [
            'vacancy'     => $vacancy,
            'categories'  => Category::all(),
            'experiences' => Experience::all(),
            'locations'   => Location::all(),
            'salaries'    => Salary::all(),
        ]);
    }

    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        // dd($request->all());
        $vacancy->update($request->all());
        return redirect()->route('vacancies.index');
    }

    public function destroy(Request $request, Vacancy $vacancy)
    {
        // $this->authorize('delete', $recipe);

        $vacancy->delete();

        // return redirect()->route('vacancies.index');
        return response()->json(['message' => 'Se eliminó la vacante ' . $vacancy->name]);
    }

    // public function image(Request $request)
    // {
    //     $image = $request->file('file');
    //     return $image;
    //     // $nameImage = time() . '.' . $image->extension();
    //     // $image->move(public_path('storage/vacantes'), $nameImage);
    //     // return response()->json(['correcto' => $nameImage]);
    // }

    public function state(Request $request, Vacancy $vacancy)
    {
        $vacancy->active = $request->active; 
        // $request->active viene desde VUEJS y $vacancy->active de Laravel(DB)
        $vacancy->save();

        return response()->json(['Respuesta' => 'Correcto']);
        // return response()->json($request); // Usalo para saber que datos estas pasando
    }
}
