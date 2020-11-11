<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeductiblesController extends Controller
{
	public function index()
	{
		$deductibles=Deductible::all();
		return view ('deductibles.index', compact('deductibles'));
	}

	public function show( Deductible $deductible)
	{
		return view('deductibles.show', compact('deductible'));
	}

	public function create()
	{
		$deductibles=['GSIS', 'Pag-ibig', 'SSS'];
		return view('deductibles.create', compact('types'));
	}

	public function store()
	{
		$deductible=new Deductible;
		$deductible->type=request()->type;
		$deductible->percentage=request()->percentage;
		$deductible->save();
		return redirect('/admin/deductibles');
	}

	public function edit(Deductible $deductible)
	{
		$types=['GSIS', 'Pag-ibig', 'SSS'];
		return view('deductibles.edit', compact('deductible', 'types'));
	}

	public function update(Deductible $deductible)
	{
		$deductible->type=request()->type;
		$deductible->percentage=request()->percentage;
		$deductible->save();
		return redirect('/admin/deductibles');
	}

	public function delete(Deductible $deductible)
	{
		$deductible->delete();
	}

}
