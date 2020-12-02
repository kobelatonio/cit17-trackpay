<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = Position::orderBy('title', 'ASC')->paginate(10);
        return view('jobpositions.index', compact('positions'));
    }

    public function create()
    {
        return view('jobpositions.create');
    }

    public function show(Position $position)
    {
        return view('jobpositions.show', compact('position'));
    }

    public function store()
    {
        $validated_fields = request()->validate([
            'title' => 'required',
            'monthly_salary' => 'required',
            'shift_start' => 'required',
            'shift_end' => 'required'
        ]);
        DB::table('positions')->insert($validated_fields);
        return redirect('/positions');
    }

    public function edit(Position $position)
    {
        return view('jobpositions.edit', compact('position'));
    }

    public function update(Position $position)
    {
        $validated_fields = request()->validate([
            'title' => 'required',
            'monthly_salary' => 'required',
            'shift_start' => 'required',
            'shift_end' => 'required']);
        $position->update($validated_fields);
        return redirect('/positions');
    }

    public function delete(Position $position)
    {
        $position->delete();
        return redirect('/positions');
    }
}