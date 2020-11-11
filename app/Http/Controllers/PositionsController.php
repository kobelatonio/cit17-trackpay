<?php

namespace App\Http\Controllers;

use App\positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index ()
    {
    	$positions=Positions::all();
    	return  view('positions.index',compact(Positions));
    }

    public function create ()
    {
    	return view('positions.create');
    }

    public function show (Positions $Positions)
    {
    	return view('positions.show',compact('positions'));
    }

    public function store ()
    {
    	$positions = new Positions;
    	$positions->Title = request()->Title;
    	$positions->MonthlySalary = request()->MonthlySalary;
    	$positions->StartShift = request()->StartShift;
    	$positions->EndShift = request()->EndShift;

    	return redirect('/admin/positions');
    }

    public function edit(Positions $positions)
    {
    	return view('positions.edit',compact('positions'));
    }

    public function update ()
    {
    	$positions->Title = request()->Title;
    	$positions->MonthlySalary = request()->MonthlySalary;
    	$positions->StartShift = request()->StartShift;
    	$positions->EndShift = request()->EndShift;

    	return redirect('/admin/positions');
    }

    public function delete (Positions $positions)
    {
    	$positions->delete();
    	return redirect('/admin/positions');
    }
}