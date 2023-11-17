<?php

namespace App\Http\Controllers;

use App\Models\User;
use function Laravel\Prompts\search;

class SearchInputController extends Controller
{
	public function index()
	{

		return view('searchInput.index');
	}
}
