<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Http\Resources\FoodConverter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $foods = Food::all();
        
        return view("web", compact("foods"));
    }
     
    
}
