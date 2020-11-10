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
}
