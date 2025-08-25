<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::where('is_shown', 1)->orderBy('order_number', 'asc')->get();
        return view('guest.pages.team.index', compact('teams'));
    }
}
