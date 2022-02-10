<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\FoodConverter;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        
         
        $food = Food::latest()->get();
        return response()->json(FoodConverter::collection($food));

       
       
       
        
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
       $validator = Validator ::make( $request->all(),[
        'name' => 'required|string|min:1',
        'price' => 'required|string|min:1',
        'category' => 'required|string|min:1',
        'rating' => 'required|string|min:1',
      
       ]);
    
        if($validator->fails()){
            
            return back()
            ->withInput($request->all())
            ->withErrors($validator);

            // return response()->json($validator->errors());   
        }


        Food::create($request->all());
        // echo "yess";
        return redirect()->route('home')
                        ->with('success','Product created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
        $validator = Validator ::make( $request->all(),[
            'name' => 'required|string|min:1',
            'price' => 'required|string|min:1',
            'category' => 'required|string|min:1',
            'rating' => 'required|string|min:1',
          
           ]);

 
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $food->name = $request->name;
        $food->price = $request->price;
        $food->category = $request->category;
        $food->rating = $request->rating;
        $food->save();
        
        // return response()->json(['Food updated successfully.', new FoodConverter($food)]);
        return redirect()->route('admin.foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('admin.foods');
    }
}
