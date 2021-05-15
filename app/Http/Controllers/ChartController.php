<?php

namespace App\Http\Controllers;

use App\Charts\AntecedenteChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $usersChart = new AntecedenteChart;
        //$usersChart->labels(['Jan', 'Feb', 'Mar']);
        //$usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('users', ['usersChart' => $usersChart]);
    }
}
