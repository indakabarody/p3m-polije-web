<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brandCount = Brand::count();
        $clientCount = Client::count();
        $serviceCount = Service::count();

        return view('admin.pages.home.index', compact('brandCount', 'clientCount','serviceCount'));
    }
}
