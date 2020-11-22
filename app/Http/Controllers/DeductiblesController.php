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

	public function store(Deductible $deductible)
	{
		$validated_fields=request()->validate([
			'type'=>'required',
			'percentage'=>'required']);
		$deductible->create($validated_fields);
		return redirect('/admin/deductibles');
	}

	public function edit(Deductible $deductible)
	{
		return view('deductibles.edit', compact('deductible'));
	}

	public function update(Deductible $deductible)
	{	
		$validated_fields=request()->validate([
			'type'=>'required',
			'percentage'=>'required']);
		$deductible->update($validated_fields);
		return redirect('/admin/deductibles');
	}

	public function delete(Deductible $deductible)
	{
		$deductible->delete();
		return redirect('/admin/deductibles');
	}
}
