<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\FoodConverter;
use App\Models\Food;

class AdminController extends Controller
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
        return view('admin-home');
    }


    public function adminFoods()
    {
        $foods = Food::latest()->paginate(5);
        return view('content-admin',compact('foods'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
 
        // return view('content-admin');
    }
}
