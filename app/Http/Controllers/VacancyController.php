<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Category;
use App\Experience;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('vacancies.create', [
            'categories' => Category::all(),
            'experiences' => Experience::all(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Vacancy $vacancy)
    {
        //
    }

    public function edit(Vacancy $vacancy)
    {
        //
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
