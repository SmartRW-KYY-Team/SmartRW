<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle =  'Dashboard';
        $subPageTitle = '';
        $activePosition = "home";
        return view('dashboard.home', compact('pageTitle', 'subPageTitle', 'activePosition'));
    }
}
