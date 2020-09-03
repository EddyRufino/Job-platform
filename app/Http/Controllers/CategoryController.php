<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function show(Category $category)
	{
		$vacancies = Vacancy::where('category_id', $category->id)->where('active', '1')->paginate();

		return view('categories.show', compact('vacancies', 'category'));
	}
}
