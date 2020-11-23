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

    public function store()
    {
        $position = new Position;
        $position->title = request()->title;
        $position->monthly_salary = request()->monthly_salary;
        $position->shift_start = request()->shift_start;
        $position->shift_end = request()->shift_end;
        $position->save();
        return redirect('/admin/positions');
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Position $position)
    {
        $position->title = request()->title;
        $position->monthly_salary = request()->monthly_salary;
        $position->shift_start = request()->shift_start;
        $position->shift_end = request()->shift_end;
        $position->save();
        return redirect('/admin/positions');
    }

    public function delete(Position $position)
    {
        $position->delete();
        return redirect('/admin/positions');
    }
}