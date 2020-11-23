<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deductible;

class DeductiblesController extends Controller
{
	public function index()
	{
		$deductibles = Deductible::get();
		return view ('deductibles.index', compact('deductibles'));
	}

	public function show(Deductible $deductible)
	{
		return view('deductibles.show', compact('deductible'));
	}

	public function create()
	{
		return view('deductibles.create');
	}

	public function store()
	{
		$deductible = new Deductible;
		$deductible->type = request()->type;
		$deductible->percentage = request()->percentage;
		$deductible->save();
		return redirect('/admin/deductibles');
	}

	public function edit(Deductible $deductible)
	{
		return view('deductibles.edit', compact('deductible'));
	}

	public function update(Deductible $deductible)
	{
		$deductible->type = request()->type;
		$deductible->percentage = request()->percentage;
		$deductible->save();
		return redirect('/admin/deductibles');
	}

	public function delete(Deductible $deductible)
	{
		$deductible->delete();
		return redirect('/admin/deductibles');
	}
}
