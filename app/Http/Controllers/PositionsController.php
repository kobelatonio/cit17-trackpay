<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = Position::get();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    public function store(Position $position)
    {
        $validated_fields=request()->validate([
            'title'=>'required',
            'monthly_salary'=>'required',
            'shift_start'=>'required',
            'shift_end'=> 'required']);
        $position->create($validated_fields);
            return redirect('/admin/positions');
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Position $position)
    {
        $validated_fields=request()->validate([
            'title'=>'required',
            'monthly_salary'=>'required',
            'shift_start'=>'required',
            'shift_end'=> 'required']);
        $position->update($validated_fields);
            return redirect('/admin/positions');
    }

    public function delete(Position $position)
    {
        $position->delete();
        return redirect('/admin/positions');
    }
}