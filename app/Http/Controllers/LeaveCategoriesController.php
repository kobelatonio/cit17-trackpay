<?php

namespace App\Http\Controllers;

use App\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCategoriesController extends Controller
{
    public function index()
    {
        $leave_categories = LeaveCategory::get();
        return view('leave_categories.index', compact('leave_categories'));
    }

    public function create()
    {
        return view('leave_categories.create');
    }

    public function show(LeaveCategory $leave_category)
    {
        return view('leave_categories.show', compact('leave_category'));
    }

    public function store()
    {
        $leave_category = new LeaveCategory;
        $leave_category->name = request()->name;
        $leave_category->annual_leave_days = request()->annual_leave_days;
        $leave_category->save();
        return redirect('/leave_categories');
    }

    public function edit(LeaveCategory $leave_category)
    {
        return view('leave_categories.edit', compact('leave_category'));
    }

    public function update(LeaveCategory $leave_category)
    {
        $leave_category->name = request()->name;
        $leave_category->annual_leave_days = request()->annual_leave_days;
        $leave_category->save();
        return redirect('/leave_categories');
    }

    public function delete(LeaveCategory $leave_category)
    {
        $leave_category->delete();
        return redirect('/leave_categories');
    }
}