<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    public function dashboard(): View
    {
        return view('dashboard');
    }
}
