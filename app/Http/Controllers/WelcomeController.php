<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Location;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $vacancies = Vacancy::where('active', '1')->latest()->paginate();
        $locations = Location::all();
        return view('welcome', compact('vacancies', 'locations'));
    }
}
