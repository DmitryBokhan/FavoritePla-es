<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Photo;

class HomeController extends Controller
{
    public function index()
    {
        $palce_count = Place::all()->count();
        return view('admin.home.index', compact('palce_count'));
    }
}
