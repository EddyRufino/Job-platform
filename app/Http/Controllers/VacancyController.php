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
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('vacancies.index');
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

        $vacancy = Vacancy::create($request->all());

        return redirect()->route('vacancies.edit', compact('vacancy'));
    }

    public function show(Vacancy $vacancy)
    {
        //
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

    public function destroy(Vacancy $vacancy)
    {
        //
    }

    public function image(Request $request)
    {
        $image = $request->file('file');
        return $image;
        // $nameImage = time() . '.' . $image->extension();
        // $image->move(public_path('storage/vacantes'), $nameImage);
        // return response()->json(['correcto' => $nameImage]);
    }
}
